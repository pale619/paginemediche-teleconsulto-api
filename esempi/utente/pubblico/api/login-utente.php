<?php
$timeout = 12;
$domain = $_SERVER["SERVER_NAME"];
$client_id = ""; /* UNIVOCO PER CLIENTE */
$client_secret = ""; /* UNIVOCO PER CLIENTE */

$headers = array(
    "domain: " . $domain
    , "client-id: " . $client_id
    , "client-secret: " . $client_secret
    , "model: utente"
);
$post_fields = array(
    "username" => "username"
    , "password" => "Password2020!"
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://auth.paginemediche.it/api/auth/user/login");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
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