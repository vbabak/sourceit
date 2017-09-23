<?php

session_start();

require_once "./functions.php";

if (!is_user_logged_in()) {
    // показать форму ввода логин-пароль
    $errors = [];
    if (isset($_POST['submit_login'])) {
        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';
        if (strlen($login) > 16 || strlen($login) < 5) {
            $errors['login'] = 'Поле login должно быть от 5 до 16 символов';
        }
        if (strlen($password) > 12 || strlen($password) < 6) {
            $errors['password'] = 'Поле password должно быть от 6 до 12 символов';
        }
        if (empty($errors)) {
            log_in();
            header('Location: index.php');
        }
    }
    include "./login.html";
} else {
    // показать личный кабинет

    if (!empty($_POST['log_out'])) {
        log_out();
        header('Location: index.php');
    }

    include './profile.html';
}
