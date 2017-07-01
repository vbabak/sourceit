<?php

namespace Library\Db;

interface DbInterface
{
    public static function getInstance(): \PDO;
}
