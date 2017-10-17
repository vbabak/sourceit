<?php

class Logger
{
    public static $msg = '';

    public static function log()
    {
        var_dump(static::$msg);
    }
}

function process()
{
    Logger::$msg = __FUNCTION__;
    Logger::log();
}

function process_end()
{
    Logger::$msg = __FUNCTION__;
    Logger::log();
}


process();
process_end();

$logger = new Logger();
// $logger::$msg = '';

var_dump($logger::$msg);
