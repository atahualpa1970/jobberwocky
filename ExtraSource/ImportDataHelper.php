<?php

namespace ExtraSource;

class ImportDataHelper {

	public static function getFromJabberWockyExtraSource(): array {
		$url = 'http://localhost:8081/jobs';
		$response = file_get_contents($url);
		return json_decode($response, true);
	}

	public static function transformJabberWockyExtraSource(array $data): array {
		foreach ($data as $value) {
			$transform[] = [
				"id" => rand(100, 999),
				"company" => "",
				"title" => $value[0],
				"country" => $value[2],
				"location" => "",
				"description" => "",
				"skills" => $value[3],
				"salary" => (int)$value[1],
			];
		}
		return $transform;
	}
}
?>