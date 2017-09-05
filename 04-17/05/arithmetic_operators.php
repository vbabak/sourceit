<?php

/**
 * Identity
 */
$a = '0.1';
$a = +$a;
var_dump($a);

/**
 * Negation
 */
$a = '5';
$a = -$a;
var_dump($a);


/**
 * Modulo
 */
var_dump(5 % 2); // 5/2 = 2.5; 2*2 = 4; 5-4 = 1;
var_dump(13 % 3); // 13/3 = 4.3(3); 4*3 = 12; 13-12 = 1;

/**
 * Exponentiation
 */
var_dump(2 ** 3);