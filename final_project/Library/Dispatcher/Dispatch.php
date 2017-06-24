<?php

namespace Library\Dispatcher;

use Library\Route\Route;

class Dispatch
{
    public function dispatch(Route $route)
    {
        $namespace = $route->getNamespace() . '\Controller\\';
        $controller = $route->getController();
        $action =  $route->getAction();
        $args = $route->getArgs();

        $controllerClass = '\\' . ucfirst($namespace) . ucfirst($controller) . 'Controller';
        $actionMethod = $action . 'Action';

        try {
            $controllerInstance = new $controllerClass();
        } catch (\Throwable $e) {
            throw new \Exception("Controller not found", 404);
        }

        if (!method_exists($controllerInstance, $actionMethod)) {
            throw new \Exception("Action not found", 404);
        }

        call_user_func_array(array($controllerInstance, $actionMethod), $args);

    }
}
