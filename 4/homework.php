<?php
//ini_set('display_errors', 'On');
//ini_set('error_reporting', E_ALL);
$a = '';
$b = '';
if (!empty($_GET['a']) && !empty($_GET['b'])) {
    $a = $_GET['a'];
    $b = $_GET['b'];
    var_dump($a, $b);
    $c = $a * $b;
    var_dump($c);

    print_r('Произведение $a * $b = ' . $c);
} else {
    if (empty($_GET['a'])) {
        echo 'a не передана';
    }
    if (empty($_GET['b'])) {
        echo 'b не передана';
    }
}
?>
<form method="get">
    <div>a: <input type="text" name="a" value="<?php echo $a ?>"></div>
    <div>b: <input type="text" name="b" value="<?php echo $b ?>"></div>
    <div><input type="submit" value="Send"></div>
</form>
