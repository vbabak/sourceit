<?php

//const ITEM_COLOR = 'red';
//
//function def_constants() {
//    define('ITEM_SIZE', '25');
//}
//def_constants();
//
//echo '<pre>';
//var_dump(ITEM_SIZE, ITEM_COLOR);

function chocolate()
{
    $s = 'calling ' . __FUNCTION__ . '() on line ';
    $s .= __LINE__ . ' in file ' . __FILE__;
    print $s;
}

function bar(callable $func)
{
    return call_user_func($func);
}

bar('chocolate');