<?php

function get_num_calls()
{
    static $calls = 0;

    $calls++;

    return $calls;
}

for ($i = 0; $i < 10; $i++) {
    get_num_calls();
}

echo get_num_calls();

// var_dump($calls);
