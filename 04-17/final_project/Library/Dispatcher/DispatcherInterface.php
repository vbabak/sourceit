<?php

namespace Library\Dispatcher;

use Library\Route\Route;

interface DispatcherInterface
{
    public function dispatch(Route $route);
}