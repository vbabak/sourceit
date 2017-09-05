<?php

function print_directory($path, $level)
{

    $padding = str_pad(' ', $level);
    echo $padding . basename($path) . PHP_EOL;
    if (is_dir($path)) {
        if (!is_readable($path)) {
            echo $padding . '<span style="color:red">is not readable</span>' . PHP_EOL;
            return;
        }
        $files = scandir($path);
        foreach ($files as $file) {
            if ('.' === $file || '..' === $file) {
                continue;
            }
            print_directory($path . DIRECTORY_SEPARATOR . $file, $level + 4);
        }
    }
}

echo '<pre>';
print_directory('/vagrant/11', 0);
