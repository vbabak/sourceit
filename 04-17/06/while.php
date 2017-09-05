<?php
echo '<pre>';
// example 1
$i = 1;
while ($i <= 10) {
    echo $i++ . PHP_EOL;
}

//$i--;

// example 2
$j = 1;
while ($i > 0 && $j <= 10) {
    echo "i " . $i-- . PHP_EOL;
    echo "j " . $j++ . PHP_EOL;
}

