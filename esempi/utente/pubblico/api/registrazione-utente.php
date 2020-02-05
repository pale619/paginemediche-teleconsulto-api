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
    , "email" => "prova@prova.it"
    , "password" => "Password2020!"
    , "name" => "Utente"
    , "surname" => "Test"
    , "birthday" => "1970-01-01"
    , "town" => "Milano"
    , "province" => "Milano"
    , "address" => "Via Roma 1"
    , "cap" => "20100"
    , "cf" => "TSTTNT70A01F205P"
    , "tel" => "3331122333"
    , "gender" => "M"
    , "avatar" => "LINK ASSOLUTO IMMAGINE"
    , "referer" => $domain
    , "created" => time()
    , "last_update" => time()
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.paginemediche.it/api/auth/user/registration");
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