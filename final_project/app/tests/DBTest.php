<?php

use Library\Db\Db;
use PHPUnit\Framework\TestCase;

class DBTest extends TestCase
{
    public function testConnection()
    {
        $connection = Db::getInstance();
        $this->assertInstanceOf(PDO::class, $connection);
    }
}