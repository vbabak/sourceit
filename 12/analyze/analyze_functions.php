<?php

function check_print ($price = 0) {
    if ($price > 0) {
        $random_discount = mt_rand(0, 5) / 100;
        function print_discount($discount = 0, $price) {
            if ($discount > 0) {
                echo 'Ваша скидка: ' . money_format('%.2i', $price * $discount);
            }
        }
        print_discount($random_discount, $price);
    }
}

$price = 109;
check_print($price);
