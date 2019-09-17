<?php
session_start();

/**
 * Returns a unique session id (timestamp) as JSON formatted string.
 * If the session id doesn't exist, it is created.
 *
 * You'd normally prevent direct access to this script file,
 * but for testing purposes this is omitted.
 */

if (empty($_SESSION['pizzaId'])) {
    $_SESSION['pizzaId'] = mktime();
}

// Stick id into assoc array
$aarr = array("pizzaId" => $_SESSION['pizzaId']);

// Transform assoc array to JSON format
$json = json_encode($aarr);

// We'll be outputting a JSON formatted string
header('Content-Type: application/json');

// Return the JSON data
echo $json;
