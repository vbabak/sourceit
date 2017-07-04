<?php

namespace Library\Config;

abstract class ConfigFactoryAbstract
{
    public static function getFile()
    {
        $file = APPLICATION_PATH . '/app/config/settings.php';
        return $file;
    }

    /**
     * @return \Library\Config\ConfigInterface
     */
    public static function createConfig()
    {
        $config = new Config();
        $cnf_file = self::getFile();
        $data = include $cnf_file;
        $config->setConfigArray($data);
        return $config;
    }
}
