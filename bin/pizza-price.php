<?php
session_start();

/**
 * Check if session exists.
 */
if (empty($_SESSION['pizzaId'])) {
    header('Content-Type: application/json');
    echo "Access denied";
    // exit;
}

$price = 0;

$aarr = array(
        "price" => $price
);

// Transform assoc array to JSON format
$json = json_encode($aarr);

// We'll be outputting a JSON formatted string
header('Content-Type: application/json');

// Send data
echo $json;
?>