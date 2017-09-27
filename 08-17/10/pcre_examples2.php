<?php

// example 2
$pattern = '/^this\sis([\w\s.]+)string$/';
$str = 'this is some other. And 12 text string';

$found = preg_match($pattern, $str, $matches);
if ($found) {
    var_dump($matches[1]);
}

