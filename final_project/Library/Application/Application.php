<?php

namespace Library\Application;

use Library\Dispatcher\Dispatch;
use Library\Route\Route;

class Application
{
    public function run()
    {
        $path = $_GET['path'] ?? '';

        $route = new Route();
        $route->parseRoute($path);

        $dispatcher = new Dispatch();
        $dispatcher->dispatch($route);

    }
}
