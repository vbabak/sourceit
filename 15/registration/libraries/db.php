<?php

function get_db_connect()
{
    global $settings;
    $db = $settings['db'];
    static $conn;
    if ($conn) {
        return $conn;
    }
    $conn = mysqli_connect($db['host'], $db['user'], $db['pwd'], $db['db_name']);
    if (!$conn) {
        throw new Exception('db connection error');
    }
    return $conn;
}