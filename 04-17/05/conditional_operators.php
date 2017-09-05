<?php
/**
 * Ternary operator
 */
$name = isset($_POST['name']) ? $_POST['name'] : '';

/**
 * Ternary operator (short form)
 */
$username = $name ? : 'anonymous';

/**
 * Null coalescing
 */

$name = $_POST['name'] ?? '';