<?php
namespace Tests\Api;

require_once 'Api/DataHandler.php';
require_once 'Api/RestHandler.php';
require_once 'ExtraSource/ImportDataHelper.php';

use PHPUnit\Framework\TestCase;
use Api\RestHandler;
use PHPUnit\Framework\MockObject\Generator\MockClass;

class RestHandlerTest extends TestCase
{
	public function testHandleRequestWithGetMethod()
	{
		$_SERVER['REQUEST_METHOD'] = 'GET';
		$_GET['title'] = 'PHP';
		$_GET['country'] = 'Spain';
		$restHandler = new RestHandler('Data/jobs.json');
		$result = $restHandler->handleRequest();
		$this->assertCount(3, $result);
	}
}