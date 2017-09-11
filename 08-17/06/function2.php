<?php

function array_multiply(array &$array, int $multiplier = 2): array
{
    foreach ($array as $k => $v) {
        $array[$k] = $v * $multiplier;
    }
    return $array;
}

$arr = range(5, 9); // 5,6,7,8,9
array_multiply($arr);
array_multiply($arr, 3);

var_dump($arr);


