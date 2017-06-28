<?php

namespace Library\Log;

class FileLog implements FileLogInterface
{

    protected $log_dir;
    protected $log_file;
    protected $error_file;

    public function log(string $msg, string $level)
    {
        $message = $this->format(strtoupper($level) . ': ' . $msg);
        $this->writeLog($this->log_file, $message);
    }

    public function logExcepting(\Throwable $exception)
    {
        $message =  'Code: ' . $exception->getCode();
        $message .= ' Message: ' . $exception->getMessage();
        $message .= PHP_EOL . $exception->getFile() . ':' . $exception->getLine();
        $message .= PHP_EOL . 'Stack Trace:' . PHP_EOL;
        $message .= $exception->getTraceAsString();
        $msg = $this->format($message);
        $this->writeLog($this->error_file, $msg);
    }

    public function setLogDir($dir)
    {
        $this->log_dir = $dir;
        $this->log_file = $this->log_dir . DIRECTORY_SEPARATOR . date('d.m.Y') . '.log';
        $this->error_file = $this->log_dir . DIRECTORY_SEPARATOR . 'errors.' . date('d.m.Y') . '.log';
    }

    protected function format($str)
    {
        $msg = PHP_EOL . date('d-m-Y H:i:s') . ' ' . $str . PHP_EOL;

        return $msg;
    }

    protected function writeLog($file, $msg)
    {
        $fh = @fopen($file, 'a+') or exit('Log file is not writable');
        flock($fh, LOCK_EX);
        fwrite($fh, $msg);
        flock($fh, LOCK_UN);
        fclose($fh);
    }
}