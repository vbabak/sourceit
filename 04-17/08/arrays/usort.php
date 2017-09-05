<?php

$array = [
    array(
        'first_name' => 'Alex',
        'last_name' => 'A.'
    ),
    array(
        'first_name' => 'Boris',
        'last_name' => 'A.'
    ),
    array(
        'first_name' => 'Alex',
        'last_name' => 'B.'
    ),
    array(
        'first_name' => 'Boris',
        'last_name' => 'B.'
    ),
];

usort($array, function ($a, $b) {
    if ($a['first_name'] == $b['first_name']) {
        return ($a['last_name'] < $b['last_name']) ? -1 : 1;
    }
    return ($a['first_name'] < $b['first_name']) ? -1 : 1;
});

var_dump($array);
