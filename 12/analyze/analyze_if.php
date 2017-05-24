<?php

$user_name = $_GET['uname'] ?? 'anonymous';

if ($user_name = 'anonymous') {
    header('HTTP/1.0 403 Forbidden');
    exit("Forbidden");
} else {
    session_start();
    $_SESSION['user_name'] = $user_name;
}
