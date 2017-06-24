<?php

namespace Library\Route;

class Route
{
    protected $namespace;
    protected $controller;
    protected $action;
    protected $args = array();

    public function parseRoute(string $path)
    {
        $path = trim($path, '/');
        $path = strtolower($path);
        $parts = !empty($path) ? explode('/', $path) : array();
        $this->namespace = $parts[0] ?? 'application';
        $this->controller = $parts[1] ?? 'index';
        $this->action = $parts[2] ?? 'index';
        $this->args = isset($parts[3]) ? array_slice($parts, 3) : array();
        return $this->getData();
    }

    public function getData()
    {
        return [
            'namespace' => $this->getNamespace(),
            'controller' => $this->getController(),
            'action' => $this->getAction(),
            'args' => $this->getArgs()
        ];
    }

    public function getNamespace()
    {
        return $this->namespace;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getArgs()
    {
        return $this->args;
    }
}
