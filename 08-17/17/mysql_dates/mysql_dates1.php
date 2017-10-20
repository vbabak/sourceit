<?php
date_default_timezone_set('Europe/Berlin'); // system timezone is Europe/Kiev

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

function exec_sql($sql, $vars = []): array
{
    global $pdo;
    $sth = $pdo->prepare($sql);
    $sth->execute($vars);

    $data = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth->closeCursor();

    return $data;
}


exec_sql('
    drop table if exists test_dates; 
    create table if not exists test_dates(
        id int auto_increment primary key,
        code enum("1","2") default 2,
        created datetime not null
            on update current_timestamp
            default current_timestamp
    );
    ');

exec_sql('insert into test_dates (`created`) values ("' . date('Y-m-d H:i:s') . '");'); // ok
exec_sql('insert into test_dates (`created`) values (NOW());'); // the problem

var_dump(exec_sql('select * from test_dates'));

var_dump(date('Y-m-d H:i:s'));


