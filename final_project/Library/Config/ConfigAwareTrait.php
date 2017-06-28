<?php

namespace Library\Config;

trait ConfigAwareTrait
{
    /** @var  ConfigInterface */
    protected $config;

    public function setConfig(ConfigInterface $config)
    {
        $this->config = $config;

        return $this;
    }

    public function getConfig(): ConfigInterface
    {
        return $this->config;
    }
}
