<?php

mysqli_report(MYSQLI_REPORT_ALL);
$mysqli = mysqli_connect('localhost', 'suppliers_u', '111', 'suppliers');

if (!$mysqli) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}

$first_name = 'Ivan';
$id = 1;
$stmt = mysqli_prepare($mysqli, "UPDATE `suppliers` SET first_name = ? WHERE supplier_id = ?");
mysqli_stmt_bind_param($stmt, 'si', $first_name, $id);
mysqli_stmt_execute($stmt);

printf("%d затронуто строк\n", mysqli_stmt_affected_rows($stmt));

mysqli_stmt_close($stmt);
mysqli_close($mysqli);
