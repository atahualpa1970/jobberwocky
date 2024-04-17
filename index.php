<?php

use Api\RestHandler;

require_once 'Api/DataHandler.php';
require_once 'Api/RestHandler.php';

// Ruta al archivo JSON
$filename = 'Data/jobs.json';

// Creamos una instancia de RESTfulHandler y manejamos la solicitud
$handler = new RestHandler($filename);
$handler->handleRequest();

?>
