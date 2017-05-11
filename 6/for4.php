<?php
echo '<pre>';

$array_size = mt_rand(10, 100);
$array = [];

for ($i = 0; $i < $array_size; $i++) {
    $array[] = mt_rand(0, 1000);
}

var_dump($array);