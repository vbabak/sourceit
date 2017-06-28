<?php

namespace Library\Autoload;

interface AutoloaderInterface
{
    public function libraryAutoloader($class_name);

    public function appAutoloader($class_name);
}
