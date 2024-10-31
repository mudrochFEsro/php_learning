<?php

$ch = curl_init();

$token = "";

$headers = [
    "Authorization: token " . $token,
    "User-Agent: mudrochFEsro"
];

// $payload = json_encode([
//     "name" => "Created from API",
//     "description" => "an example API-created repo"
// ]);

// curl_setopt_array($ch, [
//     CURLOPT_URL => "https://api.github.com/user/repos",
//     CURLOPT_RETURNTRANSFER => "true",
//     CURLOPT_HTTPHEADER => $headers,
//     CURLOPT_CUSTOMREQUEST => "POST",
//     CURLOPT_POSTFIELDS => $payload
// ]);

curl_setopt_array($ch, [
    CURLOPT_URL => "https://api.github.com/gists",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => $headers,
]);


$response = curl_exec($ch);

$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

$data = json_decode($response, true);

print_r($data);

foreach ($data as $gist) {
    echo $gist["id"] . " - " . $gist["description"] . "\n";
}


