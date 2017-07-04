<?php

namespace Library\Dispatcher;

use Library\Autoload\Autoloader;
use Library\Config\ConfigAwareInterface;
use Library\Config\ConfigFactoryAbstract;
use Library\Log\LogAwareInterface;
use Library\Log\LogFactoryAbstract;
use Library\Route\Route;
use Library\View\ViewInterface;

class Dispatch implements DispatcherInterface
{
    public function dispatch(Route $route)
    {
        $namespace = $route->getNamespace() . '\Controller\\';
        $controller = $route->getController();
        $action = $route->getAction();
        $args = $route->getArgs();

        $controllerClass = '\\' . ucfirst($namespace) . ucfirst($controller) . 'Controller';
        $actionMethod = $action . 'Action';

        $controllerInstance = $this->createControllerInstance($controllerClass, $actionMethod);

        $view = call_user_func_array(array($controllerInstance, $actionMethod), $args);

        if (!($view instanceof ViewInterface)) {
            throw new \Exception('Controller should return instance of ViewInterface', 500);
        }

        echo $view->render();
    }

    protected function createControllerInstance($controllerClass, $actionMethod)
    {
        Autoloader::loadController($controllerClass);
        $controllerInstance = new $controllerClass();


        if (!method_exists($controllerInstance, $actionMethod)) {
            throw new \Exception("Action $controllerClass::$actionMethod not found", 404);
        }

        if ($controllerInstance instanceof LogAwareInterface) {
            $logger = LogFactoryAbstract::getDefaultLogger();
            $controllerInstance->setLogger($logger);
        }

        if ($controllerInstance instanceof ConfigAwareInterface) {
            $config = ConfigFactoryAbstract::createConfig();
            $controllerInstance->setConfig($config);
        }

        return $controllerInstance;
    }


}
