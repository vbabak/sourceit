<?php

function sum(float $a, float $b): string
{
    echo gettype($a), ' ', gettype($b), PHP_EOL; // попал ли вывод в <pre> ?
    return $a + $b;
}

echo '<pre>';
var_dump(sum('1', '2')); // sting -> float; returns string
