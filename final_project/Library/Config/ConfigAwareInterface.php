<?php

namespace Library\Config;

interface ConfigAwareInterface
{
    public function setConfig(ConfigInterface $config);

    public function getConfig(): ConfigInterface;
}