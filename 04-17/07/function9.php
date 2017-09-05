<?php

$list = array (
    array('Имя', 'Фамилия', 'Должность'),
    array('Иван', 'Иванов', 'программист'),
);

$fp = fopen('file.csv', 'w+');

foreach ($list as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);
