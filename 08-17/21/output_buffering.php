<?php

ob_start();

echo "Hi";

echo " World";

$data = ob_get_contents();
ob_end_clean();

var_dump($data);
