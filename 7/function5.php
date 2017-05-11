<?php

//function array_multiply($multiplier = 2, &$array)
function array_multiply(&$array, $multiplier = 2)
{
    foreach ($array as $k => $v) {
        $array[$k] = $v * $multiplier;
    }
    return $array;
}

$arr = range(5, 9); // 5,6,7,8,9
array_multiply($arr);

print_r($arr);


