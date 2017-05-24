<?php

$users = [
    [
        'name' => 'Peter'
    ],
    [
        'first_name' => 'Ivan',
        'last_name' => 'McBook'
    ],
];

usort($users, function ($a, $b) {
    return $a['name'] <=> $b['first_name'];
});
