<?php

class A
{
    protected $test = 'test';
    protected $test2 = 'test';

    // public function __toString()
    // {
    //     // return get_class($this);
    //     return __CLASS__;
    // }
    //
    // public function __invoke()
    // {
    //     return __METHOD__;
    // }

    public static function __set_state($props)
    {
        $a = new A();
        $a->test = $props['test']; // pass state from original object
        $a->test2 = ''; // clean state
        return $a;
    }

    public function __debugInfo()
    {
        return [
            // 'test'
        ];
    }

    public function setTest($s)
    {
        $this->test = $s;
        return $this;
    }

    public function getTests()
    {
        return [
            $this->test,
            $this->test2
        ];
    }
}

$a = new A();

// echo $a;
// echo $a();

$a->setTest('test __set_state');
$s = var_export($a, true); // A::__set_state(array( 'test' => 'test __set_state', ))
eval('$sObj = ' . "$s;");
var_dump($sObj->getTests());
// var_dump($a);