<?php

namespace Library\Application;

use Library\Dispatcher\Dispatch;
use Library\Error\ErrorHandler;
use Library\Route\Route;

class Application implements ApplicationInterface
{
    protected $errorHandler;
    protected $route;
    protected $dispatcher;

    public function __construct()
    {
        $this->route = $this->createRoute();

        $this->dispatcher = $this->createDispatcher();

        $this->errorHandler = $this->createErrorHandler();
        $this->errorHandler->setDispatcher($this->dispatcher);
        $this->errorHandler->setRoute($this->route);
        $this->errorHandler->init_handlers();
    }

    public function run()
    {
        $requested_route = $this->getRequestedRoute();
        $this->route->parseRoute($requested_route);
        $this->dispatcher->dispatch($this->route);
    }

    protected function createErrorHandler()
    {
        $handler = new ErrorHandler();
        return $handler;
    }

    protected function createRoute()
    {
        $route = new Route();
        return $route;
    }

    protected function createDispatcher()
    {
        $dispatcher = new Dispatch();
        return $dispatcher;
    }

    protected function getRequestedRoute()
    {
        $path = $_GET['path'] ?? '';
        return $path;
    }
}
