<?php

use Library\Log\LogFactoryAbstract;
use PHPUnit\Framework\TestCase;

class LogTest extends TestCase
{
    public function testLogDirIsWritable()
    {
        /** @var \Library\Log\FileLog $logger */
        $logger = LogFactoryAbstract::getDefaultLogger();

        $dir = $logger->getLogDir();
        $this->assertEquals(1, is_writable($dir));
    }

}
