<?php

function print_array_values($array)
{
    echo '<pre>';
    foreach ($array as $v) {
        echo $v, PHP_EOL;
    }
}

$arr = range('a', 'z');
print_array_values($arr);
