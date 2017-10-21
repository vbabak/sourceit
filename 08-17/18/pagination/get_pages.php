<?php

$page = $_GET['page'] ?? 1;
$page = (int) $page;

spl_autoload_register(function ($name) {
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $name);
    $file = __DIR__ . DIRECTORY_SEPARATOR . $path . '.php';
    // var_dump($file);
    if (file_exists($file)) {
        include_once $file;
    }
});

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

$total_elements_arr = exec_sql('select count(*) as total from `items`');
$total_elements = isset($total_elements_arr[0]['total']) ? $total_elements_arr[0]['total'] : 0;

$pagination = new \Pagination\MyPagination();
$pagination->setCurrentPage($page);
$pagination->setTotalElements($total_elements);
$links_range = $pagination->getLinksRange();

var_dump($pagination);
