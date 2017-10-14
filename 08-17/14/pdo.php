<?php

$db = [
    'dbname' => 'mysql',
    'host' => 'localhost',
    'port' => '3306',
    'user' => 'root',
    'pwd' => '111',
];

// data source name
$dsn = 'mysql:dbname=' . $db['dbname'] . ';host=' . $db['host'] . ';port=' . $db['port'];
$pdo = new PDO($dsn, $db['user'], $db['pwd']);

$sth = $pdo->prepare('SELECT * FROM `user` WHERE `User` = :user LIMIT 2');
$sth->execute(['user' => 'root']);
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

var_dump($data);
