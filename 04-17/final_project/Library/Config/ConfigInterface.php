<?php

namespace Library\Config;

interface ConfigInterface
{
    public function setConfigArray(array $data);

    public function getConfigArray(): array;

    public function get(string $key);
}
