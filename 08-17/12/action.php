<?php

if ($_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
    // ajax request
    $login = $_POST['login'] ?? '';
    $email = $_POST['email'] ?? '';

    $response = [
        'success' => false,
        'data' => [],
        'errors' => [],
    ];
    $errors = [];

    if (!$login) {
        $errors['login'] = 'Login is invalid';
    }

    if (!$email) {
        $errors['email'] = 'Email is invalid';
    }

    if (empty($errors)) {
        $response['success'] = true;
    } else {
        $response['errors'] = $errors;
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
