<?php

require_once 'autoloader.php';

$logger = new \Logger\FileLogger(__DIR__ . '/' . date('Y-m-d') . '.log.txt');
$logger->debug('Hi');
$logger->info('test');
$logger->log(\Logger\Psr\Log\LogLevel::EMERGENCY, 'emergency message');

// $logger = new \Logger\FileLogger('/' . date('Y-m-d') . '.log.txt');

