<?php

spl_autoload_register(function ($name) {
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $name);
    $file = __DIR__ . DIRECTORY_SEPARATOR . $path . '.php';
    // var_dump($file);
    if (file_exists($file)) {
        include_once $file;
    }
});

$user = new Application\Model\User\UserModel();
var_dump(
    $user->setName('Nick')->getName()
);
