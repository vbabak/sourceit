<?php

namespace Library\Autoload;

class Autoloader implements AutoloaderInterface
{
    public static function loadController($class_name)
    {
        $class_name = str_replace(array('.', '\\'), array('', DIRECTORY_SEPARATOR), $class_name);
        $file = APPLICATION_PATH . '/app/' . $class_name . '.php';
        if (!file_exists($file)) {
            throw new \Exception("Controller $class_name not found", 404);
        }
        include $file;
    }

    public function libraryAutoloader($class_name)
    {
        $class_name = str_replace(array('.', '\\'), array('', DIRECTORY_SEPARATOR), $class_name);
        if (preg_match('/^Library/u', $class_name)) {
            include APPLICATION_PATH . '/' . $class_name . '.php';
        }
    }

    public function appAutoloader($class_name)
    {
        $class_name = str_replace(array('.', '\\'), array('', DIRECTORY_SEPARATOR), $class_name);
        include APPLICATION_PATH . '/app/' . $class_name . '.php';
    }
}
