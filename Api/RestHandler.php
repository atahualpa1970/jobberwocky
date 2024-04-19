<?php

namespace Api;

use Api\DataHandler;
use ExtraSource\ImportDataHelper;

class RestHandler
{
	private $jsonHandler;

	public function __construct($filename)
	{
		$this->jsonHandler = new DataHandler($filename);
	}

	public function handleRequest()
	{
		$method = $_SERVER['REQUEST_METHOD'];

		switch ($method) {
			case 'GET':
				$localData = $this->jsonHandler->loadData();
				$extraData = $this->importExtraSource();
				$data = array_merge($localData, $extraData);
				return $this->handleGetRequest($data);
				break;
			case 'POST':
				$this->handlePostRequest();
				return "Data saved successfully";
				break;
			default:
				http_response_code(405);
				return "Not allowed method.";
				break;
		}
	}

	private function handleGetRequest($data): array
	{
		$filters = $this->getValidFilters();
		$result = $this->filterDataByKey($data, $filters);
		header('Content-Type: application/json');
		return $result;
	}

	private function handlePostRequest()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$datos = $this->jsonHandler->loadData();
		$datos[] = $data;
		$this->jsonHandler->saveData($datos);
		echo "Data successfully saved.";
	}

	private function importExtraSource(): array {
		$extraData = ImportDataHelper::getFromJabberWockyExtraSource();
		return ImportDataHelper::transformJabberWockyExtraSource($extraData);
	}

	private function filterDataByKey($data, $filters): array {
		return array_map(function($element) {
			return array_values($element);
		}, array_filter($data, function($element) use ($filters) {
			$match = true;
			foreach ($filters as $key => $value) {
				switch ($key) {
					case 'title':
						$match = $match && (empty($element['title']) || (strpos(strtolower($element['title']), strtolower($value)) !== false));
						break;
					case 'location':
						$match = $match && (empty($element['location']) || (strtolower($element['location']) === strtolower($value)));
						break;
					case 'salary_min':
						$match = $match && (empty($element['salary']) || ($element['salary'] >= $value));
						break;
					case 'salary_max':
						$match = $match && (empty($element['salary']) || ($element['salary'] <= $value));
						break;
					case 'country':
						$match = $match && (empty($element['country']) || (strtolower($element['country']) === strtolower($value)));
						break;
				}
			}
			return $match;
		}
		));
	}

	private function getValidFilters(): array {
		$validKeys = ['title', 'country', 'location', 'description', 'salary_min', 'salary_max', 'skills'];
		$filters = [];
		foreach ($validKeys as $key) {
			if (isset($_GET[$key]) && !empty($_GET[$key])) {
				$filters[$key] = $_GET[$key];
			}
		}
		return $filters;
	}

}
