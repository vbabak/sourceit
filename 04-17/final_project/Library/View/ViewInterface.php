<?php

namespace Library\View;

interface ViewInterface
{
    // public function __construct(array $data = []): ViewInterface; // Disallow return types for constructors, destructors and clone methods

    public function __construct(string $file_path, array $data = []);

    public function __get(string $key);

    public function setData(array $data = []): ViewInterface;

    public function getData(): array;

    public function renderPartial(string $file_path, array $data = []): string;

    public function render(): string;
}
