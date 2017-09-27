<?php

$str = 'vagrant/08-17/10/validate_email.php:13:boolean true';

function remove_vowels($str)
{
    $pattern = '#[oiuyea\s]#i';
    return preg_replace($pattern, '', $str);
}

var_dump(remove_vowels($str));
