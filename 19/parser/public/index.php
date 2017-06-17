<?php

define("APPLICATION_PATH", realpath(__DIR__. '/../'));

require_once APPLICATION_PATH . "/errors.php";
require_once APPLICATION_PATH . "/autoload.php";

// process routing
$namespace = 'Application\Controller\\';
$controller =  $_GET['controller'] ?? 'index';
$action =  $_GET['action'] ?? 'index';

$controllerClass = $namespace . $controller . 'Controller';
$actionMethod = $action . 'Action';

try {
    $controllerInstance = new $controllerClass();
} catch (Throwable $e) {
    throw new Exception("Controller not found", 404);
}

if (!method_exists($controllerInstance, $actionMethod)) {
    throw new Exception("Action not found", 404);
}

// run action
$controllerInstance->$actionMethod();
