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
				print_r($this->importExtraSource());
				//$this->handleGetRequest();
				break;
			case 'POST':
				$this->handlePostRequest();
				break;
			default:
				http_response_code(405);
				echo "Not allowed method.";
				break;
		}
	}

	private function handleGetRequest()
	{
		$key = isset($_GET) ? key($_GET) : null;
		$value = isset($_GET) ? current($_GET) : null;

		if ($key === null || $value === null) {
			echo "Missing key or value";
			return;
		}

		$data = $this->jsonHandler->loadData();
		$result = array_filter($data, function ($element) use ($key, $value) {
			if (isset($element[$key]) && is_array($element[$key])) {
				return in_array($value, $element[$key]);
			}
			return isset($element[$key]) && $element[$key] == $value;
		});

		header('Content-Type: application/json');
		print_r($result);
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
}
