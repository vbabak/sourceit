<?php
// problem - server moves to a different timezone

$tz = 'Europe/Kiev';
date_default_timezone_set($tz);

$db = [
    'dbname' => 'test2',
    'host' => 'localhost',
    'port' => '3306',
    'user' => 'root',
    'pwd' => '111',
];

// data source name
$dsn = 'mysql:dbname=' . $db['dbname'] . ';host=' . $db['host'] . ';port=' . $db['port'];

// SELECT @@global.time_zone, @@session.time_zone;
// mysql_tzinfo_to_sql /usr/share/zoneinfo | mysql -u root -p mysql

$pdo = new PDO(
    $dsn,
    $db['user'],
    $db['pwd'],
    [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8, time_zone = '" . $tz . "'"]
);

function exec_sql($sql, $vars = []): array
{
    global $pdo;
    $sth = $pdo->prepare($sql);
    $sth->execute($vars);
    if ($sth->errorCode() > 0) {
        var_dump($sth->errorInfo());
    }
    $data = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth->closeCursor();

    return $data;
}

var_dump(exec_sql('select * from test_dates')); // berlin/whatever time

var_dump('current time:' . date('Y-m-d H:i:s')); // kiev time