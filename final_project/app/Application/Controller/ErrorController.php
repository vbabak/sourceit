<?php

namespace Application\Controller;

use Library\Log\LogFactoryAbstract;
use Library\Log\LogInterface;

class ErrorController extends ControllerAbstract
{
    public function errorAction(\Throwable $exception)
    {
        $logger = $this->getLogger();
        $http_version = 'HTTP/1.1';
        if (404 === $exception->getCode()) {
            header($http_version . ' 404 Not Found');
            $logger->log('Requested resource ' . $_SERVER['REQUEST_URI'] . ' not found', LogInterface::INFO);
            include $this->getViewsDir() . '/error/404.phtml';
        } else {
            header($http_version . ' 500 Server Error');
            include $this->getViewsDir() . '/error/500.phtml';
        }
    }
}