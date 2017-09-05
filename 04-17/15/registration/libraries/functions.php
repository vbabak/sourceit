<?php

function isLoggedIn()
{
    $is_logged_in = isset($_SESSION['user_id']);
    return $is_logged_in;
}

function validate_registration($email, $pwd, $pwd2)
{
    $errors = [];
    if (!preg_match('/^[a-z0-9._]{2,}@[a-z]{2,}\.[a-z]{2,}$/u', $email)) {
        $errors['email'] = 'Error';
    }
    if (!$pwd) {
        $errors['password'] = 'Not set';
    }
    if ($pwd !== $pwd2) {
        $errors['password'] = 'Not equal';
    }
    return $errors;
}

function do_registration($email, $pwd)
{
    $pwd = password_hash($pwd, PASSWORD_BCRYPT);
    $mysqli = get_db_connect();
    $stmt = mysqli_prepare($mysqli, "INSERT INTO `users` (`user_role_id`, `username`, `email`, `password`, `created`) VALUES ((SELECT user_role_id FROM user_roles WHERE role_code='supplier'), ?, ?, ?, NOW())");
    mysqli_stmt_bind_param($stmt, 'sss', $email, $email, $pwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return mysqli_insert_id($mysqli);
}

function do_auth($email, $password)
{
    $mysqli = get_db_connect();
    $stmt = mysqli_prepare($mysqli, "SELECT `user_id`, `password` FROM `users` WHERE `email` = ? ");
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user_data = mysqli_fetch_assoc($result);
    if (!$user_data) {
        return false;
    }
    if (!password_verify($password, $user_data['password'])) {
        return false;
    }
    return $user_data['user_id'];
}
