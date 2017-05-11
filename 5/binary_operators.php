<?php

/**
 * And
 */
$a = 0b0001; // 1
$b = 0b0011; // 3
$c = $a & $b; // 0b0001
var_dump(decbin($c), $c);


/**
 * Or
 */
$a = 0b0101; // 5
$b = 0b0011; // 3
$c = $a | $b; // 0b0111
var_dump(decbin($c), $c);

/**
 * Xor
 */
$a = 0b0101; // 5
$b = 0b0011; // 3
$c = $a ^ $b; // 0b0110
var_dump(decbin($c), $c);


/**
 * Shift right
 */
$a = 0b0101; // 5
$c = $a >> 1; // 0b0010
var_dump(decbin($c), $c);
