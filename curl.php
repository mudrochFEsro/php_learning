<?php

$ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, "https://randomuser.me/api");
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = [
    "Authorization: Client-ID "
];

$response_headers = [];
$header_callback = function ($ch, $header) use (&$response_headers) {
    $len = strlen($header);
    $response_headers[] = $header;
    return $len;
};

curl_setopt_array($ch, [
    CURLOPT_URL => "https://api.unsplash.com/photos",
    CURLOPT_RETURNTRANSFER => true
]);

$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

echo $status_code, "\n";
echo $response, "\n";
