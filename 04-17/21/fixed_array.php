<?php

$arr = new SplFixedArray(3);
var_dump($arr);

$arr[0] = "Ivan";
var_dump($arr);

// $arr[] = "Nick"; // RuntimeException: Index invalid or out of range

$arr->setSize(1);
var_dump($arr);
