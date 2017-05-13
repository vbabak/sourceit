<?php

include_once "txtlib.php";

$txt = '
Пример строки ;
охватывающей 3 строки;
с использованием синтаксиса php.
';

//$txt = 'This is 4 words.';

$words = txt_sentence_count($txt);

echo $words;

