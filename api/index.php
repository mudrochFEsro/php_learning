<?php

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$parts = explode("/", $path);
$resource = $parts[4];
$id = $parts[5] ?? null;

echo $resource . ", " . $id . "<br/>";
echo $_SERVER["REQUEST_METHOD"];
