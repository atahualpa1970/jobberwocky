<?php

namespace Tests\Api;

require_once 'Api/DataHandler.php';
require_once 'Api/RestHandler.php';

use PHPUnit\Framework\TestCase;
use Api\DataHandler;

class DataHandlerTest extends TestCase {
	private $filename = 'test_data.json';

	public function setUp(): void {
			parent::setUp();
			file_put_contents($this->filename, '');
	}

	public function tearDown(): void {
		parent::tearDown();
		unlink($this->filename);
	}

	public function testSaveAndLoadData() {
		$dataHandler = new DataHandler($this->filename);

		$data = array(
			'key1' => 'value1',
			'key2' => 'value2'
		);

		$dataHandler->saveData($data);
		$loadedData = $dataHandler->loadData();
		$this->assertEquals($data, $loadedData);
	}

	public function testLoadNonExistentFile() {
		$dataHandler = new DataHandler('non_existent_file.json');
		$loadedData = $dataHandler->loadData();
		$this->assertEquals(array(), $loadedData);
	}
}
