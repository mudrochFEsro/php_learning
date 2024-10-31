<?php

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$parts = explode("/", $path);
$resource = $parts[4];
$id = $parts[5] ?? null;


if ($resource != "tasks") {

    // option 1 :
    // header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");

    // option 2 :
    http_response_code(404);
    exit;
}


echo $resource . " " . $id;
