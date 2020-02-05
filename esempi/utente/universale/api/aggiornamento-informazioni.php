<?php
$timeout = 12;
$domain = $_SERVER["SERVER_NAME"];
$client_id = ""; /* UNIVOCO PER CLIENTE */
$client_secret = ""; /* UNIVOCO PER CLIENTE */
$token = ""; /* OTTINIBILE DALLA REGISTRAZIONE E EFFETTUANDO IL LOGIN */
$field = ""; /* CAMPO DA AGGIORNARE */
$new_value = ""; /* VALORE AGGIORNATO */

$headersBearer = array(
    "domain: " . $domain
    , "client-id: " . $client_id
    , "client-secret: " . $client_secret
    , "t: " . $token
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.paginemediche.it/api/auth/user/pass");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, $headersBearer);
curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$data = json_decode(curl_exec($ch));
curl_close($ch);

if ($data && strlen($data->data->bearer)) {
    $bearer_token = $data->data->bearer;
}

if (strlen($bearer_token)) {
    $authorization = "Authorization: Bearer " . $bearer_token;
    $headers = array(
        $authorization
    );

    switch ($field) {
        case "address":
            if ($new_value) {
                $url = "https://api.paginemediche.it/api/auth/user/update";
                $params = array('address' => $new_value);
                $url .= '?' . http_build_query($params);
            }
            break;
        case "avatar":
            if ($new_value) {
                $url = "https://api.paginemediche.it/api/auth/user/updateAvatar";
                $params = array('avatar' => $new_value);
                $url .= '?' . http_build_query($params);
            }
            break;
        case "cap":
            if ($new_value) {
                $url = "https://api.paginemediche.it/api/auth/user/update";
                $params = array('cap' => $new_value);
                $url .= '?' . http_build_query($params);
            }
            break;
        case "cf":
            if ($new_value) {
                $url = "https://api.paginemediche.it/api/auth/user/update";
                $params = array('cf' => $new_value);
                $url .= '?' . http_build_query($params);
            }
            break;
        case "city":
            if ($new_value) {
                $url = "https://api.paginemediche.it/api/auth/user/update";
                $params = array('town' => $new_value);
                $url .= '?' . http_build_query($params);
            }
            break;
        case "dataNascita":
            if ($new_value) {
                $url = "https://api.paginemediche.it/api/auth/user/update";
                $params = array('birthday' => $new_value);
                $url .= '?' . http_build_query($params);
            }
            break;
        case "last_update":
            $url = "https://api.paginemediche.it/api/auth/user/update";
            $params = array('last_update' => time());
            $url .= '?' . http_build_query($params);
            break;
        case "name":
            if ($new_value) {
                $url = "https://api.paginemediche.it/api/auth/user/updateName";
                $params = array('name' => $new_value);
                $url .= '?' . http_build_query($params);
            }
            break;
        case "province":
            if ($new_value) {
                $url = "https://api.paginemediche.it/api/auth/user/update";
                $params = array('province' => $new_value);
                $url .= '?' . http_build_query($params);
            }
            break;
        case "sesso":
            if ($new_value) {
                $url = "https://api.paginemediche.it/api/auth/user/update";
                $params = array('gender' => $new_value);
                $url .= '?' . http_build_query($params);
            }
            break;
        case "surname":
            if ($new_value) {
                $url = "https://api.paginemediche.it/api/auth/user/updateSurname";
                $params = array('surname' => $new_value);
                $url .= '?' . http_build_query($params);
            }
            break;
        case "tel":
            if ($new_value) {
                $url = "https://api.paginemediche.it/api/auth/user/updateTel";
                $params = array('tel' => $new_value);
                $url .= '?' . http_build_query($params);
            }
            break;
        case "username":
            if ($new_value) {
                $url = "https://api.paginemediche.it/api/auth/user/updateUsername";
                $params = array('username' => $new_value);
                $url .= '?' . http_build_query($params);
            }
            break;
        default:
            die("CAMPO NON PREVISTO");

    }
} else {
    die("ERRORE RICHIESTA BEARER");
}

if (strlen($url)) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $dataOperationResults = json_decode(curl_exec($ch));
    curl_close($ch);

    if($dataOperationResults) {
        var_dump($dataOperationResults);
    }
}
die();