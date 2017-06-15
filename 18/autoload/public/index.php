<?php

namespace Project;

use Application\Application;
use Application\Service\Application as MyService;

require_once "../autoload.php";

$app = new Application();
$app->run();

$service = new MyService();
var_dump($service);
