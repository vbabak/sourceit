<?php

spl_autoload_register(function ($class_name) {
    $class_name = str_replace(array('.', '\\'), array('', DIRECTORY_SEPARATOR), $class_name);
    include $class_name . '.php';
});
