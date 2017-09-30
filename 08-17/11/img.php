<?php

header("Content-Type: image/png");
$im = imagecreate(110, 20); // resource imagecreate ( int $width , int $height )
$background_color = imagecolorallocate($im, 0, 0, 0); //Первый вызов imagecolorallocate() задает цвет фона в палитровых изображениях - изображениях, созданных функцией imagecreate()
$text_color = imagecolorallocate($im, 233, 14, 91); // цвет текста
imagestring($im, 1, 5, 5,  "123", $text_color); // bool imagestring ( resource $image , int $font , int $x , int $y , string $string , int $color )
imagepng($im);
imagedestroy($im);
