<?php
echo '<pre>';


echo 'example 3' . PHP_EOL;
$i = 5;
do {
    if ($i < 5) {
        echo "i недостаточно велико";
        break;
    }
    $i -= 6;
    if ($i < 0) {
        echo "i содержит отрицательное значение";
        break;
    }
    echo "значение i подходит";
} while (0);
