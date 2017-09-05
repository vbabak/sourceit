<?php

function txt_get_words_cnt($str)
{
//    $cnt = str_word_count($str);
//    return $cnt;

    $count = (int) preg_match_all('/\w+/u', $str, $matches);
    return $count;
}

function txt_sentence_count($text)
{
    $count = (int) preg_match_all('/(\w+\s?[.!?:;]+)/u', $text, $matches);
    return $count;
}