<?php

$delimiter = ','; // use a delimiter variable

//$array = ['green', 'red'];
$array = ['gre;en', 'red'];

$str = implode($delimiter, $array);
unset($array);

var_dump($str);

$array = explode($delimiter, $str);

var_dump($array);
