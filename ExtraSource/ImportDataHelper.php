<?php

namespace ExtraSource;

class ImportDataHelper {

	public static function getFromJabberWockyExtraSource(): array {
		$url = 'http://localhost:8081/jobs';
		$response = file_get_contents($url);
		return json_decode($response, true);
	}

	public static function transformJabberWockyExtraSource(array $data): array {
		foreach ($data as $key => $value) {
			print_r('0 ');
			//$obj = new stdClass();
			/*
			$obj->$key = $value;
			$transform[] = $obj;
			$transform[] = {
				"id": "456",
				"company": "Google",
				"title": "PHP Developer",
				"country": "Argentina",
				"modality": "hybrid",
				"description": "We look forward to having you as part of our team in the role of PHP Developer profile",
				"skills": [
						"PHP",
						"Laravel"
				],
				"salary": "3000"
			}
			*/
		}

		//return json_decode($transform, true);
		return $data;
	}
}
?>