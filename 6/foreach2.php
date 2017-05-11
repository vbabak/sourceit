<?php
echo '<pre>';

$a = [2, 6, 9];

foreach ($a as &$v) {
    $v *= 2;
}
unset($v);

var_dump($a);


