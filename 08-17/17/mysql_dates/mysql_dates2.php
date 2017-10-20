<?php
date_default_timezone_set('Europe/Berlin');

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
    [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8, time_zone = 'Europe/Berlin'"]
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


exec_sql('
drop table if exists test_dates;
create table if not exists test_dates(
    id int auto_increment primary key,
    code enum("1","2") default 2,
    created_datetime datetime not null
        on update current_timestamp
        default current_timestamp,
    created_timestamp timestamp not null
        on update current_timestamp
        default current_timestamp,
    created_timestamp2 timestamp not null
        on update current_timestamp
        default current_timestamp
);
');

exec_sql('insert into test_dates (`code`) values (1);');

exec_sql('set time_zone = \'Europe/London\'; insert into test_dates (`code`) values (1); set time_zone = \'Europe/Berlin\'');

var_dump(exec_sql('select * from test_dates'));

var_dump(date('Y-m-d H:i:s'));