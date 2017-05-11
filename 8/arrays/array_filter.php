<?php

$numbers = range(0, 20);

// нечетные
$odd = array_filter($numbers, function ($v) {
    return $v & 1;
});

var_dump($odd);