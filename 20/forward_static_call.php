<?php

class A
{
    const NAME = 'A';

    public static function test()
    {
        $args = func_get_args();
        echo static::NAME, " " . join(',', $args) . " \n";
    }
}

class B extends A
{
    const NAME = 'B';

    public static function test()
    {
        echo self::NAME, "\n";
        parent::test('parent::');
        call_user_func(array('A', 'test'), 'call_user_func()');
        forward_static_call(array('A', 'test'), 'forward_static_call()'); // может быть вызвана только внутри метода класса
    }
}

B::test('foo');
