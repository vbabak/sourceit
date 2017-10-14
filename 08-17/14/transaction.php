<?php


$db = [
    'dbname' => 'test2',
    'host' => 'localhost',
    'port' => '3306',
    'user' => 'root',
    'pwd' => '111',
];

// data source name
$dsn = 'mysql:dbname=' . $db['dbname'] . ';host=' . $db['host'] . ';port=' . $db['port'];
$pdo = new PDO($dsn, $db['user'], $db['pwd']);

$pdo->beginTransaction();

// $pdo->exec("delete from users where id = 1");
// $pdo->exec("drop table users"); // @link https://dev.mysql.com/doc/refman/5.7/en/implicit-commit.html
$success = false;

if ($success) {
    $pdo->commit();
} else {
    var_dump('rollback');
    $pdo->rollBack();
}
