<?php

class BaseClass
{
    public function test()
    {
        echo "Вызван метод BaseClass::test()\n";
    }

    final public function moreTesting()
    {
        echo "Вызван метод BaseClass::moreTesting()\n";
    }
}

class ChildClass extends BaseClass
{
    public function moreTesting()
    {
        echo "Вызван метод ChildClass::moreTesting()\n";
    }
}
