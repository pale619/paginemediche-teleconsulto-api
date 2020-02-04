<?php
$timeout = 12;
$domain = $_SERVER["SERVER_NAME"];
$token_login_utente = ""; /* OTTINIBILE DALLA REGISTRAZIONE E EFFETTUANDO IL LOGIN */
$client_id = ""; /* UNIVOCO PER CLIENTE */
$client_secret = ""; /* UNIVOCO PER CLIENTE */
$numero_domanda = 0;

$headers = array(
    "domain: " . $domain
    , "client-id: " . $client_id
    , "client-secret: " . $client_secret
    , "t: " . $token_login_utente
);

$post_fields = array(
    "answer" => "Testo della risposta del paziente"
    , "qid" => $numero_domanda
);

/* SE SONO STATI INSERITI DEGLI ALLEGATI */
$post_fields["attachment"] = "Allegato1;Allegato2"; /* Elenco allegati divisi da ; */

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.paginemediche.it/api/1.0/tc-add-patient-answer");
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