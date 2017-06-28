<?php

require_once APPLICATION_PATH . '/Library/Autoloader/AutoloaderInterface.php';
require_once APPLICATION_PATH . '/Library/Autoloader/Autoloader.php';

$autoloader = new \Library\Autoload\Autoloader();

spl_autoload_register(array($autoloader, 'libraryAutoloader'));
spl_autoload_register(array($autoloader, 'appAutoloader'));
