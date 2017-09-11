<?php

$list = [
    [
        'first_name' => 'Ivan',
        'last_name' => 'Ivanov',
    ],
    [
        'first_name' => 'Petr',
        'last_name' => 'Petrov',
    ],
];

$file = fopen('file.csv', 'w+');
$head_arr = [];
if (isset($list[0])) {
    $head_arr = array_keys($list[0]);
}
fputcsv($file, $head_arr);
foreach ($list as $person) {
    fputcsv($file, $person);
}

fclose($file);
