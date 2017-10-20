<?php

class A
{
    public function __call($name, $arguments)
    {
        switch ($name) {
            case "test":
                echo "Вызван метод test()";
                break;
            default:
                echo 'default';
                break;
        }
    }

    public static function __callStatic($name, $arg)
    {
        switch ($name) {
            case "test":
                echo "Вызван метод test()";
                break;
            default:
                echo 'default';
                break;
        }
    }

    public static function test()
    {
        echo __METHOD__;
    }

    // public function test()
    // {
    //     echo __METHOD__;
    // }
}

$a = new A();

// $a->test();
A::test();