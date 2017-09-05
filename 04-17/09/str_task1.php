<?php

function my_str_rev(string $s = ''): string
{
    $length = strlen($s);
    $str_rev = '';

    while ($length-- > 0) {
        $str_rev .= $s[$length];
    }
    return $str_rev;
}

function my_str_rev_mb(string $s = ''): string
{
    $length = mb_strlen($s);
    $str_rev = '';

    while (--$length >= 0) {
        $str_rev .= mb_substr($s, $length, 1);
    }
    return $str_rev;
}

$str = 'Иван';

print my_str_rev_mb($str);
//echo $str[0] . $str[1];




































/**

$length = mb_strlen($string, $encoding);
$reversed = '';
while ($length-- > 0) {
    $reversed .= mb_substr($string, $length, 1, $encoding);
}

 *
 */