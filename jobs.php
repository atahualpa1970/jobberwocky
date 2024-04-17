<?php

use Api\RestHandler;

// Including DataHandler and RestHandler classes
require_once 'Api/DataHandler.php';
require_once 'Api/RestHandler.php';

// Path to JSON data file
$filename = 'Data/jobs.json';

// REST handler start
$handler = new RestHandler($filename);
$handler->handleRequest();

?>
