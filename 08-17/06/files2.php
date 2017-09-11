<?php

$file = fopen('file.csv', 'r');

while ($row = fgetcsv($file)) {
    var_dump($row);
}

fclose($file);
