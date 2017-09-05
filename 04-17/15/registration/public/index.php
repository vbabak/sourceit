<?php

$settings = require '../config/settings.php';
require_once '../libraries/db.php';
require_once '../libraries/functions.php';

session_start();

define('IS_LOGGED_IN', isLoggedIn());
$errors = [];
$route = $_GET['route'] ?? 'index';

if ('registration' === $route) {
    if (IS_LOGGED_IN) {
        header('Location: index.php');
        exit;
    }
    $reg = $_POST['registration'] ?? null;
    if ($reg) {
        // перед валидацией можно применить фильтр
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $password = isset($_POST['password']) ? trim($_POST['password']) : '';
        $password2 = isset($_POST['password2']) ? trim($_POST['password2']) : '';
        // валидация
        $errors = validate_registration($email, $password, $password2);
        if (empty($errors)) {
            $user_id = do_registration($email, $password);
            $_SESSION['user_id'] = $user_id;
            header('Location: index.php?route=index');
            exit;
        }
    }

    require_once '../views/registration.phtml';
}

if ('index' === $route) {
    require_once '../views/index.phtml';
}

if ('auth' === $route) {
    $auth = $_POST['auth'] ?? null;
    if ($auth) {
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $password = isset($_POST['password']) ? trim($_POST['password']) : '';
        $user_id = do_auth($email, $password);
        if ($user_id) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user_id;
            header('Location: index.php?route=index');
            exit;
        } else {
            $errors['email'] = 'Error';
            $errors['password'] = 'Error';
        }

    }
    require_once '../views/auth.phtml';
}

if ('logout' === $route) {
    $_SESSION['user_id'] = null;
    header('Location: index.php?route=index');
    exit;
}


if (!IS_LOGGED_IN && !in_array($route, ['index', 'registration', 'auth'])) {
    header('Location: index.php?route=registration');
    exit;
}
