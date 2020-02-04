<?php
$timeout = 12;
$domain = $_SERVER["SERVER_NAME"];
$token_login_utente = ""; /* OTTINIBILE DALLA REGISTRAZIONE E EFFETTUANDO IL LOGIN */
$client_id = ""; /* UNIVOCO PER CLIENTE */
$client_secret = ""; /* UNIVOCO PER CLIENTE */ 

$headers = array(
    "domain: " . $domain
    , "client-id: " . $client_id
    , "client-secret: " . $client_secret
    , "t: " . $token_login_utente
);

$post_fields = array(
    "questionText" => "Testo della domanda"
    , "questionCategories" => "1" /* CATEGORIE DELLA DOMANDA, ELENCO DIVISO DA VIRGOLA */
    , "price" => "0.01" /* PREZZO DEL TELECONSULTO, IN FASE DI SALVATAGGIO VIENE CONTROLLATA LA CORRETTEZZA DEL DATO,
                            SIA RELATIVAMENTE AL COUPON (SE INSERITO) SIA RELATIVAMENTE ALLA CIFRA PREAPPROVATA DI PAYPAL */
    , "billName" => "Nome fatturazione"
    , "billCF" => "CODICE_FISCALE"
    , "billAddress" => "Indirizzo"
    , "billCap" => "CAP"
    , "billProvince" => "0" /* ID della provincia, ottenibile da API */
    , "billCity" => "0" /* ID della città, ottenibile da API */
    , "billTel" => "3331234567" /* Numero di telefono, utilizzato per le notifiche SMS */
);
$post_fields["coupon"] = "CODICE_COUPON";
$post_fields["orderId"] = "AAAABBBBCCCCDDDDE"; /* ID ordine paypal */
$post_fields["authorizationId"] = "AAAABBBBCCCCDDDDE"; /* ID autorizzazione paypal */

/* SE SONO STATI INSERITI DEGLI ALLEGATI */
$post_fields["attachment"] = "Allegato1;Allegato2"; /* Elenco allegati divisi da ; */

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.paginemediche.it/api/1.0/tc-add-new-question");
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