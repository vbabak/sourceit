<?php

function print_directory($path, $nesting_level = 0)
{
    if (!file_exists($path)) {
        echo "Directory $path doesn't exist";
        return null;
    }
    $files = scandir($path);
    $spaces = str_pad(' ', $nesting_level * 4);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }
        $file_path = $path . DIRECTORY_SEPARATOR . $file;

        $formatted_str = $spaces . '%s' . $file . PHP_EOL;
        if (is_dir($file_path)) {
            echo sprintf($formatted_str, '(d) ');
            print_directory($file_path, $nesting_level + 1);
        } else {
            echo sprintf($formatted_str, '(f) ');
        }

    }
}

$path = $_GET['path'] ?? '/vagrant';
// $path = '/vagrant\'';
print_directory($path);
