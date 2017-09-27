<?php

function validate_date($date)
{
    $pattern = '/^([0-3]{1}[0-9]{1})\.([0-1]{1}[0-2]{1})\.([0-9]{4})$/';
    if (!preg_match($pattern, $date, $matches)) {
        return false;
    }
    $dd = $matches[1];
    $mm = $matches[2];
    $yyyy = $matches[3];

    if ($dd == 0 || $dd > 31) {
        return false;
    }

    if ($mm == 0 || $mm > 12) {
        return false;
    }

    $year = date('Y');

    if ($yyyy > $year || $yyyy < $year - 150) {
        return false;
    }

    return true;
}

var_dump(validate_date('29.02.2017'));