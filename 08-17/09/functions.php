<?php

function is_user_logged_in()
{
    return !empty($_SESSION['user_id']);
}

function log_in($id = null)
{
    $id = $id ?? microtime(true);
    $_SESSION['user_id'] = (int) $id;
}

function get_user_name()
{
    if (!is_user_logged_in()) {
        return '';
    }

    return $_SESSION['user_id'];
}

function log_out()
{
    $_SESSION['user_id'] = null;
}
