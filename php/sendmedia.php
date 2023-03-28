<?php

$body = array(
    "api_key" => "b97b74f802c2802b94358267c160bbd282f5c384",
    "receiver" => "6285174902345",
    "data" => array(
        "url" => "https://i.ibb.co/QbmsBqs/code.png",
        "media_type" => "image",
        "caption" => "Hello World"
    )
);

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => "http://localhost:4000/api/send-media",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($body),
    CURLOPT_HTTPHEADER => [
        "Accept: */*",
        "Content-Type: application/json",
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}
