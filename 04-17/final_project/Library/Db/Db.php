<?php

namespace Library\Db;

use Library\Config\ConfigFactoryAbstract;

class Db implements DbInterface
{
    protected static $instance;

    protected function __construct()
    {
    }

    public static function getInstance(): \PDO
    {
        if (static::$instance) {
            return static::$instance;
        }

        /** @var \Library\Config\Config $config */
        $config = ConfigFactoryAbstract::createConfig();
        $db = $config->get('db');
        $dsn = 'mysql:dbname=' . $db['name'] . ';host=' . $db['host'] . ';port=' . $db['port'];
        static::$instance = new \PDO($dsn, $db['user'], $db['pwd']);

        return static::$instance;
    }
}
