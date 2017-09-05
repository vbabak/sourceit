<?php

// пример замыкания

$min = 10;
$max = 20;
$f = function () use ($min, $max) {
    return rand($min, $max);
};

//echo $f();

var_dump($f);
