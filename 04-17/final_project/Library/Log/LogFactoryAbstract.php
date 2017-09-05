<?php

namespace Library\Log;

use Library\Config\ConfigFactoryAbstract;

abstract class LogFactoryAbstract
{
    /**
     * @return \Library\Log\FileLogInterface
     */
    public static function getDefaultLogger()
    {
        $config = ConfigFactoryAbstract::createConfig();
        $logger = new FileLog();
        $logger->setLogDir($config->get('log_dir'));

        return $logger;
    }
}