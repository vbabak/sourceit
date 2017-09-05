<?php
echo '<pre>';
$min = $_POST['min'] ?? '';
$max = $_POST['max'] ?? '';
var_dump($min, $max);
$rand_number = mt_rand((int)$min, (int)$max);
var_dump($rand_number);
$mod = $rand_number % 2;
//if ($mod === 0) {
//    echo 'hit' . PHP_EOL;
//} else {
//    echo 'fail' . PHP_EOL;
//}
//switch ($mod) {
//    case 0:
//        echo 'hit' . PHP_EOL;
//        break;
//    default:
//        echo 'fail' . PHP_EOL;
//        break;
//}
echo $mod ? 'fail' : 'hit';
echo PHP_EOL;
var_dump($mod);
?>
<form method="post">
    <input value="" name="min">
    <input value="" name="max">
    <input type="submit" value="send">
</form>
