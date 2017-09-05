<?php

function array_multiply($array, $multiplier)
{
    foreach ($array as $k => $v) {
        $array[$k] = $v * $multiplier;
    }
    return $array;
}

$arr = range(5, 9); // 5,6,7,8,9
$arr2 = array_multiply($arr, 3);

var_dump($arr);

// ?

var_dump($arr2);
