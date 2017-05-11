<?php
echo '<pre>';


echo 'example 2' . PHP_EOL;
do {
    $rand_number = mt_rand(0, 12);
    echo $rand_number, PHP_EOL;
    if ($rand_number > 11) {
        break;
    }
} while (1);

