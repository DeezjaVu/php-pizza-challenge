<?php
session_start();

/**
 * Check if session exists.
 */
if (empty($_SESSION['pizzaId'])) {
    // header("HTTP/1.0 403 Forbidden");
    // header('Content-Type: application/json');
    // echo '{"error":"Forbidden","status":403,"message":"Access denied. Direct access to this resource is not allowed."}';
    // exit;
}

// Define constants for json file paths
define('CHEESES_URL', '../data/cheeses.json');
define('CRUSTS_URL', '../data/crusts.json');
define('MEAT_URL', '../data/meat.json');
define('SAUCES_URL', '../data/sizes.json');
define('SIZES_URL', '../data/sizes.json');
define('VEGGIES_URL', '../data/veggies.json');

/**
 * Load data from json files.
 */
function getData() {
    // Get pizza size data and decode it
    $sizes = file_get_contents(SIZES_URL);
    $json_sizes = json_decode($sizes, true);

    // Get pizza veggies data and decode it
    $veggies = file_get_contents(VEGGIES_URL);
    $json_veggies = json_decode($veggies, true);

    // Merge all data and return it
    $options = array_merge($json_sizes, $json_veggies);
    return $options;
}

$price = 0;

$options = getData();
// print_r($options);

// Get raw data from the request
$input = file_get_contents('php://input');

if (empty($input)) {
    header("HTTP/1.0 403 Forbidden");
    header('Content-Type: application/json');
    echo '{"error":"Forbidden","status":403,"message":"Access denied. Direct access to this resource is not allowed."}';
    exit;
}

// Convert it into a PHP object
$data = json_decode($input);

$inputOptions = $data->options;
// print_r($inputOptions);

foreach ($inputOptions as $iValue) {
    // echo $iValue, "\n";
    foreach ($options as $oValue) {
        // oValue is an assoc array with "key value" pairs:
        // id, label, value, price
        // print_r($oValue);
        // echo " - id: ", $oValue['id'], "\n";
        if ($iValue === $oValue['id']) {
            $price += $oValue['price'];
        }
    }
}

// Prepare return value
$aarr = array(
    "price" => $price,
);
// Transform assoc array to JSON format
$json = json_encode($aarr);

// We'll be outputting a JSON formatted string
header('Content-Type: application/json');

// Send data
echo $json;
