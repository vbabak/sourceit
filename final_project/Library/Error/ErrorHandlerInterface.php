<?php

namespace Library\Error;

use Library\Dispatcher\Dispatch;
use Library\Route\Route;

interface ErrorHandlerInterface
{
    public function setDispatcher(Dispatch $dispatcher);

    public function setRoute(Route $route);

    public function init_handlers();
}
