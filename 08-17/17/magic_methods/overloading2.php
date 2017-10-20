<?php

class A
{
    protected $test = 'test';

    public function __set($name, $value)
    {
    }

    public function __get($name)
    {
        return rand(0, 10);
    }

    public function __isset($name)
    {
        var_dump(__METHOD__);
        return false;
    }

    public function __unset($name)
    {
        var_dump($this);
    }
}

$a = new A();
// $a->test = 10;
// var_dump($a);

// echo $a->test;
// var_dump(isset($a->test));

unset($a->test);