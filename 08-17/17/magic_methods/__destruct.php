<?php

class A
{
    public function __destruct()
    {
        echo __METHOD__;
    }
}

$a = new A();

// unset($a);

var_dump(__DIR__);