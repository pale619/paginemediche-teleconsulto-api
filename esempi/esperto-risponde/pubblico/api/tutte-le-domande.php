<?php
$timeout = 12;
$domain = $_SERVER["SERVER_NAME"];
$client_id = ""; /* UNIVOCO PER CLIENTE */
$client_secret = ""; /* UNIVOCO PER CLIENTE */

$headers = array(
    "domain: " . $domain
    , "client-id: " . $client_id
    , "client-secret: " . $client_secret
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.paginemediche.it/api/1.0/er-get-question-list");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$data = json_decode(curl_exec($ch));
curl_close($ch);

if($data) {
    var_dump($data);
}
die();