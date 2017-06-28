<?php

namespace Library\Autoload;

class Autoloader implements AutoloaderInterface
{
    public function libraryAutoloader($class_name)
    {
        $class_name = str_replace(array('.', '\\'), array('', DIRECTORY_SEPARATOR), $class_name);
        if (strpos($class_name, 'Library') !== false) {
            include APPLICATION_PATH . '/' . $class_name . '.php';
        }
    }

    public function appAutoloader($class_name)
    {
        $class_name = str_replace(array('.', '\\'), array('', DIRECTORY_SEPARATOR), $class_name);
        if (preg_match('/Controller$/', $class_name)) {
            $this->loadController($class_name);
        } else {
            include APPLICATION_PATH . '/app/' . $class_name . '.php';
        }
    }

    protected function loadController($class_name)
    {
        $file = APPLICATION_PATH . '/app/' . $class_name . '.php';
        if (!file_exists($file)) {
            throw new \Exception("Controller $class_name not found", 404);
        }
        include $file;
    }
}
