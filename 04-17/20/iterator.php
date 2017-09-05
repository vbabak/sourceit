<?php

class MyClass implements Iterator
{
    public $var1 = 'value 1';
    public $var2 = 'value 2';
    public $var3 = 'value 3';

    protected $protected = 'protected var';
    private $private = 'private var';
    private $position = 0;

    private $array = array(
        "firstelement",
        "secondelement",
        "lastelement",
    );

    public function __construct()
    {
        $this->position = 0;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->array[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
    }

    public function valid()
    {
        return isset($this->array[$this->position]);
    }

    // public function __debugInfo()
    // {
    //     return [
    //         'var1' => $this->var1,
    //         'var2' => $this->var2,
    //         'var3' => $this->var3,
    //     ];
    // }
}

$obj = new MyClass();
// var_dump($obj);

foreach ($obj as $k => $v) {
    var_dump($k . ' => ' . $v);
}


