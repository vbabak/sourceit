<?php

$shortopts  = "s:";

$options = getopt($shortopts);

if (empty($options['s'])) {
    exit('Argument -s is required' . PHP_EOL);
}

echo "strlen: " . strlen($options['s']) . PHP_EOL;

echo "mb_strlen: " . mb_strlen($options['s']) . PHP_EOL;

