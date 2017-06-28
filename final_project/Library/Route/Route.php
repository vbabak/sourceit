<?php

namespace Library\Route;

class Route implements RouteInterface
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

    public function getData(): array
    {
        return [
            'namespace' => $this->getNamespace(),
            'controller' => $this->getController(),
            'action' => $this->getAction(),
            'args' => $this->getArgs()
        ];
    }

    public function getNamespace(): string
    {
        return $this->namespace;
    }

    public function setNamespace(string $n)
    {
        $this->namespace = $n;
        return $this;
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function setController(string $c)
    {
        $this->controller = $c;
        return $this;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function setAction(string $a)
    {
        $this->action = $a;
        return $this;
    }

    public function getArgs(): array
    {
        return $this->args;
    }

    public function setArgs(array $args = array())
    {
        $this->args = $args;
        return $this;
    }
}
