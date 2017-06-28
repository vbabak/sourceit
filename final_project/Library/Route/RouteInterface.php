<?php

namespace Library\Route;

interface RouteInterface
{
    public function parseRoute(string $path);

    public function getData(): array;

    public function getNamespace(): string;

    public function setNamespace(string $namespace);

    public function getController(): string;

    public function setController(string $controller);

    public function getAction(): string;

    public function setAction(string $action);

    public function getArgs(): array;

    public function setArgs(array $args);
}