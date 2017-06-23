<?php

class A
{
    private function foo()
    {
        echo "success!\n";
    }

    public function test()
    {
        static::foo(); // вызов статического метода в нестатическом контексте
    }
}

class B extends A
{
    public function foo()
    {
        echo __METHOD__;
    }
}

$b = new B();
$b->test();
