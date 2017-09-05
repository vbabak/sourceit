<?php

session_start();

//session_regenerate_id(true);

$name = session_name();

//var_dump($name);

$_SESSION['i'] = $_SESSION['i'] ?? 0;

$_SESSION['i']++;

var_dump($_SESSION['i']);

//var_dump(session_id());
//var_dump(session_save_path());
