<?php

namespace Tests\Api;

require_once 'ExtraSource/ImportDataHelper.php';

use PHPUnit\Framework\TestCase;
use ExtraSource\ImportDataHelper;

class ImportDataHelperTest extends TestCase {

	public function testSouldGetDataFromExtraSource() {
		$data = ImportDataHelper::getFromJabberWockyExtraSource();
		$transform = ImportDataHelper::transformJabberWockyExtraSource($data);
    $this->assertNotEmpty($data);
	}

}
