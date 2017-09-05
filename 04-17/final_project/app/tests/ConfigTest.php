<?php

use Library\Config\ConfigFactoryAbstract;
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    public function testConfigFileExists()
    {
        $cnf_file = ConfigFactoryAbstract::getFile();
        $this->assertEquals(1, file_exists($cnf_file));
    }

    public function testConfigIterable()
    {
        $config = ConfigFactoryAbstract::createConfig();
        $data = $config->getConfigArray();
        $this->assertEquals(1, is_iterable($data));
    }
}
