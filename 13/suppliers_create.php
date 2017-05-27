<?php
mysqli_report(MYSQLI_REPORT_ALL);
$mysqli = mysqli_connect('localhost', 'suppliers_u', '111', 'suppliers');

if (!$mysqli) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}

$first_name = 'Roman';
$last_name = 'Grey';
$company = 'Shell';
$city = 'Kharkiv';
$country = 'Ukraine';
$created = date('Y-m-d H:i:s');

$stmt = mysqli_prepare($mysqli, "INSERT INTO `suppliers` (first_name, last_name, company, city, country, created) VALUES (?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, 'ssssss', $first_name, $last_name, $company, $city, $country, $created);
mysqli_stmt_execute($stmt);

printf("%d затронуто строк\n", mysqli_stmt_affected_rows($stmt));

mysqli_stmt_close($stmt);
mysqli_close($mysqli);
