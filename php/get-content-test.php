<?php

define("SIZES_URL", "../data/sizes.json");
define("PHP_INPUT", "php://input");

$sizes = file_get_contents(SIZES_URL);

// echo "<pre>";
// print_r($sizes);
// echo "</pre>";
// echo "\n";

$filecontent = file_get_contents(PHP_INPUT);

if (empty($filecontent)) {
    header("HTTP/1.0 403 Forbidden");
    header('Content-Type: application/json');
    echo '{"error":"Forbidden","status":403,"message":"Access denied. Direct access to this resource is not allowed."}';
    exit;
}
