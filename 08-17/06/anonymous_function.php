<?php

$min = 5;
$max = 10;

$func = function () use ($min, $max) {
    return rand($min, $max);
};

echo $func();
