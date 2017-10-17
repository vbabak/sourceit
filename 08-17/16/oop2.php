<?php

class Logger
{
    protected $msg = '';

    public function __construct($msg)
    {
        $this->msg = $msg;
    }

    public function log()
    {
        echo $this->msg;
    }
}

class MySQLLogger extends Logger
{
    public function log()
    {
        $this->log_to_mysql($this->msg);
    }

    protected function log_to_mysql($msg)
    {
        var_dump(__CLASS__, __METHOD__, $msg);
    }
}

$msg = __FILE__ . ':' . __LINE__;
$logger = new MySQLLogger($msg);
$logger->log();

