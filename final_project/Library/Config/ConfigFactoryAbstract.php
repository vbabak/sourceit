<?php

namespace Library\Config;

abstract class ConfigFactoryAbstract
{
    public static function createConfig()
    {
        $config = new Config();
        $data = include APPLICATION_PATH . '/app/config/settings.php';
        $config->setConfigArray($data);
        return $config;
    }
}
