<?php
echo '<pre>';

$settings = include "settings.php"; // can use return here
// or
//$settings = require "settings.php";

//$settings = include_once "settings.php"; // returns true
//$settings = require_once "settings.php"; // returns true

var_dump($settings);

include("rand.php"); // value1

include("rand.php"); // value2

include_once("rand.php"); // ничего не произойдет тк файл уже был включен, $number = value2

var_dump($number); // импортированная переменная из файла rand.php, $number = value2

