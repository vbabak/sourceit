<?php

namespace Application\Controller;

use Library\Log\LogInterface;
use Library\View\HTMLView;

class ErrorController extends ControllerAbstract
{
    public function errorAction(\Throwable $exception)
    {
        $logger = $this->getLogger();
        $http_version = 'HTTP/1.1';
        if (404 === $exception->getCode()) {
            header($http_version . ' 404 Not Found');
            $logger->log('Requested resource ' . $_SERVER['REQUEST_URI'] . ' not found', LogInterface::INFO);
            return new HTMLView($this->getViewsPath('error/404.phtml'));
        } else {
            header($http_version . ' 500 Server Error');
            return new HTMLView($this->getViewsPath('error/500.phtml'));
        }
    }
}