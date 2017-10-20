<?php

class A
{
    protected function __construct()
    {
        echo __METHOD__;
    }
}

//
// class B extends A
// {
//     public function __construct()
//     {
//     }
// }

class C extends A
{
    public function __construct()
    {
        parent::__construct();
    }
}

// $a = new B();
// $a = new A();
$c = new C();