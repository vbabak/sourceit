<?php

function array_multiply(array $array = array(1, 2), int $multiplier = 2): array
{
    foreach ($array as $k => $v) {
        $array[$k] = $v * $multiplier;
    }
    return $array;
}

$arr = range(5, 9); // 5,6,7,8,9

print_r(array_multiply());
