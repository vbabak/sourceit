<?php

class Greetings
{
    public $from_name = 'Anna';

    public function printGreeting($to_name = null)
    {
        echo 'Hello ' . $to_name . '! From ' . $this->from_name;
    }
}

$my_name = 'Ilona';
$greetings = new Greetings();
$greetings->printGreeting($my_name);

// Add breakpoint on line 14
//
// phpdbg -e debug.php
//
// b 14
//
// run
// info vars
// ev $my_name
// ev $my_name = 'Vlad'
// ev $my_name
// step
// finish
// q
//
