<?php

define("APPLICATION_PATH", realpath(__DIR__. '/../'));

require_once APPLICATION_PATH . "/autoload.php";

$app = new \Library\Application\Application();
$app->run();
