<?php

class Test
{
    public function __construct($color = 'green')
    {
        var_dump($color);
    }

    public static function getNew()
    {
        return new static();
    }
}

class Apple extends Test
{
    private $weight = 10;
    private $color;

    public function __construct($color = 'red')
    {
        parent::__construct($color);
        $this->color = $color;
    }

    public function __clone()
    {
        $this->weight = 10;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function setWeight(int $weight)
    {
        $this->weight = $weight;
        return $this;
    }
}

// $apple = Apple::getNew();
$apple = new Apple('white');
$weight = $apple->setWeight(25)->getWeight();
// $apple->setWeight(25);
// $weight = $apple->getWeight();

// var_dump($weight);

// $test1 = new Test();

// $apple2 = new $apple;

$apple2 = clone $apple;

var_dump($apple2);
//
// var_dump(
//     $apple instanceof Apple,
//     $apple instanceof Test
// );
