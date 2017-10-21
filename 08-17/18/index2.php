<?php

// case 1 - absolute path
// require_once "subnamepace.php";
//
// $user = new \Application\Model\User\UserModel();
// $user->setName('Ivan');
// echo $user->getName();

// case 2 - relative path
// namespace Application;
// require_once "subnamepace.php";
// $user = new namespace\Model\User\UserModel();
// var_dump($user);

// case 3 - partial path
// namespace Application\Model;
// require_once "subnamepace.php";
// $user = new User\UserModel();
// var_dump($user);

// case 4 - import namespace
namespace Run;
// require_once "subnamepace.php";
use Application\Model\User;
$userModel = new User\UserModel();
var_dump($userModel);

