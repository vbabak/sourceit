<?php
echo '<pre>';

$a = [2, 6, 9];

foreach ($a as $k => $v) {
    $a[$k] = $v * 2;
}

//$a[0] = 3;

var_dump($a);


