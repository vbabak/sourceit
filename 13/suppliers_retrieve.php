<?php
mysqli_report(MYSQLI_REPORT_ALL);
$mysqli = mysqli_connect('localhost', 'suppliers_u', '111', 'suppliers');

if (!$mysqli) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}

$id = 1;
$stmt = mysqli_prepare($mysqli, "select * from suppliers where supplier_id > ?");
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

printf("%d затронуто строк\n", mysqli_stmt_affected_rows($stmt));

var_dump($data);

mysqli_stmt_close($stmt);
mysqli_close($mysqli);
