<?php

require_once "../service/ParseInterface.php";
require_once "../service/OlxService.php";
require_once "../service/Factory/CatalogProviderFactoryAbstract.php";

$code = $_GET['provider'] ?? '';

try {
    $service = CatalogProviderFactoryAbstract::createService($code);
} catch (Exception $e) {
    $msg = $e->getMessage();
    // log a message
    exit($msg);
}

$data = $service->parse();
print_r($data);
