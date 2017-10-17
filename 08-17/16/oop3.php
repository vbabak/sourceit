<?php

class Box
{
    protected const CODE = "box-xyz";

    public function print_box()
    {
        // return self::CODE; // parent, self, static
        return static::CODE; // parent, self, static
    }
}

class TriangleBox extends Box
{
    protected const CODE = "box-triangle";
}

$triangle_box = new TriangleBox();
$box = new Box();

// var_dump($triangle_box);

// $triangle_box::CODE = 'box';

var_dump($triangle_box->print_box());
var_dump($box->print_box());
