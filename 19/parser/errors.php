<?php

set_exception_handler(function (Throwable $e) {
    $status_code = $e->getCode();
    $msg = $e->getMessage();

    if ($status_code === 404) {
        header('HTTP/1.0 404 Not Found');
    } else {
        header('HTTP/1.1 500 Internal Server Error');
    }

    // @todo log exception
    exit($msg);
});

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    // var_dump($errno, $errstr, $errfile, $errline);
    // @todo log error
}, E_ALL);
