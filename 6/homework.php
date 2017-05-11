<?php
//
//$l = 10;
//$a = [];
//
//for ($i = 0; count($a) < $l; $i++) {
//    $a[] = 5;
//}
//
//var_dump($a);

$info = stat(__FILE__);

foreach ($info as $k => $item) {
    echo $k . ' => ' . $item, PHP_EOL;
}
