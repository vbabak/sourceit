<?php

declare(strict_types=1);


function sum(float $a, float $b): float
{
    return $a + $b;
}

echo '<pre>';
//var_dump(sum(1, 2)); // исключение, int -> float
//var_dump(sum(1.5, 2.5));
//var_dump(sum('1.5', '2.5'));
