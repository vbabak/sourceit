<?php

$connection = mysqli_connect('localhost', 'root', '111', 'test2', 3306);

function get_roles($conn, $role_code = null, $user_role_id = null)
{
    // $result = mysqli_query($conn, 'SELECT * FROM `user_role` WHERE `role_code` = "' . $role_code . '" ');

    $smt = mysqli_prepare($conn, 'SELECT * FROM `user_role` WHERE `role_code` = ? AND user_role_id = ? ');
    mysqli_stmt_bind_param($smt, 'ss', $role_code, $user_role_id);
    mysqli_stmt_execute($smt);

    $result = mysqli_stmt_get_result($smt);

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row) {
            $data[] = $row;
        }
    }

    return $data;
}

function update_role_code($conn, $role_id, $new_code)
{
    $smt = mysqli_prepare($conn, 'UPDATE `user_role` SET role_code = ? WHERE user_role_id = ?');
    mysqli_stmt_bind_param($smt, 'ss', $new_code, $role_id);
    mysqli_stmt_execute($smt);
}

function delete_user_role($conn, $role_id)
{
    $smt = mysqli_prepare($conn, 'DELETE FROM `user_role` WHERE user_role_id = ?');
    mysqli_stmt_bind_param($smt, 's', $role_id);
    mysqli_stmt_execute($smt);
}


// var_dump(get_roles($connection, 'user', 2));

delete_user_role($connection, 2);

var_dump(get_roles($connection, 'superuser', 2));

mysqli_close($connection);
