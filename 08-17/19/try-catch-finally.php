<?php

function print_rand()
{
    $rand = rand(1, 20);
    if ($rand < 10) {
        throw new Exception("rand '$rand' is out of range");
    }
}

try {
    print_rand();
    // throw new Error('Some error');
    var_dump('End of try{}');
} catch (Throwable $e) {
    var_dump($e->getMessage());
    var_dump('File: ' . $e->getFile() . ' Line: ' . $e->getLine());
    var_dump($e->getTraceAsString());
} finally {
    var_dump('Will be always called');
}
