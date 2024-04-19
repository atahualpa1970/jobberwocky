<?php

namespace Api;

class DataHandler {
	private $file;

	public function __construct($filename) {
		$this->file = $filename;
	}

	public function saveData($data) {
		$jsonData = json_encode($data, JSON_PRETTY_PRINT);
		file_put_contents($this->file, $jsonData);
	}

	public function loadData(): array {
		if (file_exists($this->file)) {
			$jsonData = file_get_contents($this->file);
			return json_decode($jsonData, true);
		} else {
			return array();
		}
	}
}

?>