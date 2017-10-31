<?php

declare(strict_types = 1);

namespace Logger;

use Logger\Psr\Log\InvalidArgumentException;
use Logger\Psr\Log\LoggerInterface;
use Logger\Psr\Log\LogLevel;
use Exception;

class FileLogger implements LoggerInterface
{
    protected $file_path;
    protected $log_level;

    public function __construct($file_path)
    {
        if (!file_exists($file_path)) {
            if (!touch($file_path)) {
                throw new Exception('Can not create file: ' . $file_path);
            }
        }
        $this->file_path = $file_path;
    }

    public function emergency($message, array $context = array())
    {
        $this->setLogLevel(__METHOD__);
        $this->write($message);
    }

    public function alert($message, array $context = array())
    {
        $this->setLogLevel(__METHOD__);
        $this->write($message);
    }

    public function critical($message, array $context = array())
    {
        $this->setLogLevel(__METHOD__);
        $this->write($message);
    }

    public function error($message, array $context = array())
    {
        $this->setLogLevel(__METHOD__);
        $this->write($message);
    }

    public function warning($message, array $context = array())
    {
        $this->setLogLevel(__METHOD__);
        $this->write($message);
    }

    public function notice($message, array $context = array())
    {
        $this->setLogLevel(__METHOD__);
        $this->write($message);
    }

    public function info($message, array $context = array())
    {
        $this->setLogLevel(__METHOD__);
        $this->write($message);
    }

    public function debug($message, array $context = array())
    {
        $this->setLogLevel(__METHOD__);
        $this->write($message);
    }

    public function log($level, $message, array $context = array())
    {
        // $levels = [
        //     LogLevel::EMERGENCY,
        //     LogLevel::ALERT,
        //     LogLevel::CRITICAL,
        //     LogLevel::ERROR,
        //     LogLevel::WARNING,
        //     LogLevel::NOTICE,
        //     LogLevel::INFO,
        //     LogLevel::DEBUG,
        // ];

        // if (isset($levels[$level])) {
        //
        // }

        // if (array_key_exists($level, $levels)) {
        // }

        if (method_exists($this, $level)) {
            return call_user_func(array($this, $level), $message, $context);
        } else {
            throw new InvalidArgumentException("Incorrect argument value level $level");
        }
    }

    public function getFilePath()
    {
        return $this->file_path;
    }

    protected function getLogLevel()
    {
        return $this->log_level;
    }

    protected function setLogLevel($level)
    {
        $data = explode('::', $level);
        $this->log_level = array_pop($data);
        return $this;
    }

    protected function write(string $msg)
    {
        $file = $this->getFilePath();
        if (!is_writable($file)) {
            throw new Exception('File ' . $file . ' is not writable');
        }

        $date = date('Y-m-d H:i:s');

        $log_level = $this->getLogLevel();

        $str = "$date [$log_level] $msg" . PHP_EOL;

        $fh = fopen($file, 'a+');
        fwrite($fh, $str);
        fclose($fh);
    }
}
