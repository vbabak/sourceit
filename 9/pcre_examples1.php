<?php

// example 1
$pattern = '/[a-z]{1,}/i'; // i ^ {1,}
$str = 'Cat';

$found = preg_match($pattern, $str, $matches);
var_dump($found, $matches);

