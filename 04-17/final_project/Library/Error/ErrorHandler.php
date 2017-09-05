<?php

namespace Library\Error;

use Library\Dispatcher\Dispatch;
use Library\Log\LogFactoryAbstract;
use Library\Log\LogInterface;
use Library\Route\Route;

class ErrorHandler implements ErrorHandlerInterface
{
    /** @var Dispatch */
    protected $dispatcher;

    /** @var Route */
    protected $route;

    public function setDispatcher(Dispatch $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function setRoute(Route $route)
    {
        $this->route = $route;
    }

    public function init_handlers()
    {
        set_error_handler(array($this, 'handle_errors'));
        set_exception_handler(array($this, 'handle_exceptions'));
    }

    public function handle_errors($errno, $errstr, $errfile, $errline)
    {
        $msg = 'Code ' . $errno . ', Error: ' . $errstr . ' in ';
        $msg .= $errfile . ':' . $errline;
        $logger = LogFactoryAbstract::getDefaultLogger();
        $logger->log($msg, LogInterface::ERROR);
    }

    public function handle_exceptions(\Throwable $exception)
    {
        $this->route->setNamespace('application')
            ->setController('error')
            ->setAction('error')
            ->setArgs(array($exception));
        try {
            $this->dispatcher->dispatch($this->route);
        } catch (\Throwable $e) {
            $exception = $e;
        } finally {
            if ($exception->getCode() !== 404) {
                $logger = LogFactoryAbstract::getDefaultLogger();
                $logger->logExcepting($exception);
            }
        }
    }

}
