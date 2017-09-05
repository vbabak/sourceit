<?php
echo '<pre>';

for ($i = 0; $i < 10; $i++) {

    if ($i < 3) {
        // continue;
    }

    echo '$i: ', $i . PHP_EOL;

    for ($j = 2; $j >= 0; $j--) {

        if ($j < 2) {
            break;
            // break 2;
            //continue 2;
        }

        echo '$j: ', $j . PHP_EOL;
    }
    echo PHP_EOL;
}

