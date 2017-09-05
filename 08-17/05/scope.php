<?php

$name = 'Ivan';

function print_name()
{
    // global $name;
    $name = $GLOBALS['name'];
    print_r($name);
}

print_name();
