<?php

namespace Library\Log;

interface LogInterface
{
    const INFO = 'info';
    const ERROR = 'error';
    const FATAL = 'fatal error';

    public function log(string $msg, string $level);

    public function logExcepting(\Throwable $e);
}