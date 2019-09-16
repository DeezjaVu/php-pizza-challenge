<?php
session_start();

/**
 * Check if session exists.
 */
if (empty($_SESSION['pizzaId'])) {
    // header('Content-Type: application/json');
    // header("HTTP/1.0 403 Forbidden");
    echo "Access denied";
    // exit;
}

$price = 0;

// Get pizza size pricelist
$sizes = file_get_contents('../data/sizes.json');

//Decode JSON
$json_sizes = json_decode($sizes, true);

//Print data
print_r($json_sizes);

// Get pizza veggies pricelist
$veggies = file_get_contents('../data/veggies.json');

//Decode JSON
$json_veggies = json_decode($veggies, true);

// Merge data
$options = array_merge($json_sizes, $json_veggies);
print_r($options);

// Takes raw data from the request
$json = file_get_contents('php://input');

// Converts it into a PHP object
$data = json_decode($json);

print_r($data);

$aarr = array(
    "price" => $price,
);

// Transform assoc array to JSON format
$json = json_encode($aarr);

// We'll be outputting a JSON formatted string
header('Content-Type: application/json');

// Send data
echo $json;
