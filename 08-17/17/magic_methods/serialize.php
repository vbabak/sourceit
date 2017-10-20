<?php

class A
{
    public $test = 'test';
    public $test2 = 'test2';

    public function __sleep()
    {
        // skip test2
        return [
            'test'
        ];
    }

    public function __wakeup()
    {
        // $this->test2; // will be with default value
    }
}

$a = new A();
$a->test = 'changed-test';
$a->test2 = 'changed-test2';

$a_serialized = serialize($a);
var_dump($a_serialized);
var_dump(unserialize($a_serialized));
