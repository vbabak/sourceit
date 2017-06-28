<?php

namespace Library\Config;

class Config implements ConfigInterface
{
    protected $data = [];

    public function setConfigArray(array $data)
    {
        $this->data = $data;

        return $this;
    }

    public function getConfigArray(): array
    {
        return $this->data;
    }

    public function get(string $key)
    {
        return array_key_exists($key, $this->data) ? $this->data[$key] : null;
    }

}