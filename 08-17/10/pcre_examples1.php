<?php

// example 1
$pattern = '/([A-Za-z]){1,}/'; // i ^ {1,}
$str = 'Cat';

$found = preg_match($pattern, $str, $matches);
var_dump($found, $matches);

