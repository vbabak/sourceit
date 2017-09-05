<?php

try {
    // throw new Exception('Some error');
} catch (Throwable $e) {
    echo $e->getMessage() . PHP_EOL;
} finally {
    echo 'Will be always called';
}