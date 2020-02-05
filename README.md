# UTENTE
API Utente Paginemediche

## Prerequisito
Avere una coppia di informazioni client_id e client_secret valida per il dominio che sta effettuando la chiamata

## Chiamate API

### Registrazione utente
###### Tipo chiamata: POST
```
https://auth.paginemediche.it/api/auth/user/registration

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
```

### Login utente
###### Tipo chiamata: POST
```
https://auth.paginemediche.it/api/auth/user/login

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
```

### Informazioni utente
###### Tipo chiamata: GET
```
https://auth.paginemediche.it/api/auth/user/accessInfo

$headers = array(
    "domain: " . $domain
    , "client-id: " . $client_id
    , "client-secret: " . $client_secret
    , "t: " . $token
);
```

### Eliminazione utente
###### Tipo chiamata: GET
```
https://auth.paginemediche.it/api/auth/user/clearProfile

$headers = array(
    "domain: " . $domain
    , "client-id: " . $client_id
    , "client-secret: " . $client_secret
    , "t: " . $token
);
```

### Aggiornamento informazioni utente
###### Tipo chiamata: PUT
```
https://auth.paginemediche.it/api/auth/user/update
https://auth.paginemediche.it/api/auth/user/updateAvatar
https://auth.paginemediche.it/api/auth/user/updateName
https://auth.paginemediche.it/api/auth/user/updateSurname
https://auth.paginemediche.it/api/auth/user/updateUsername

$authorization = "Authorization: Bearer " . $bearer_token;
$headers = array(
    $authorization
);
    
$params = array('NOME_CAMPO' => $new_value);
$url .= '?' . http_build_query($params);
```


# TELECONSULTO
API Teleconsulto Paginemediche

## Prerequisito
Avere una coppia di informazioni client_id e client_secret valida per il dominio che sta effettuando la chiamata

## Chiamate API

### Lista domande utente
###### Tipo chiamata: GET
```
https://api.paginemediche.it/api/1.0/tc-get-patient-question-list

$headers = array(
    "domain: " . $domain
    , "client-id: " . $client_id
    , "client-secret: " . $client_secret
    , "t: " . $token_login_utente
);
```

### Dettaglio domanda utente
###### Tipo chiamata: POST
```
https://api.paginemediche.it/api/1.0/tc-get-question-detail

$headers = array(
    "domain: " . $domain
    , "client-id: " . $client_id
    , "client-secret: " . $client_secret
    , "t: " . $token_login_utente
);
$post_fields = array(
    "qid" => $numero_domanda
);
```

### Verifica coupon
###### Tipo chiamata: POST
```
https://api.paginemediche.it/api/1.0/tc-get-coupon-info

$headers = array(
    "domain: " . $domain
    , "client-id: " . $client_id
    , "client-secret: " . $client_secret
);

$post_fields = array(
    "code" => "CODICE_COUPON"
);
```

### Lista categorie
###### Tipo chiamata: GET
```
https://api.paginemediche.it/api/1.0/tc-get-categories

$headers = array(
    "domain: " . $domain
    , "client-id: " . $client_id
    , "client-secret: " . $client_secret
);
```

### Inserimento domanda utente
###### Tipo chiamata: POST
```
https://api.paginemediche.it/api/1.0/tc-add-new-question

$headers = array(
    "domain: " . $domain
    , "client-id: " . $client_id
    , "client-secret: " . $client_secret
    , "t: " . $token_login_utente
);

$post_fields = array(
    "questionText" => "Testo della domanda"
    , "questionCategories" => "1"
    , "price" => "0.01"
    , "billName" => "Nome fatturazione"
    , "billCF" => "CODICE_FISCALE"
    , "billAddress" => "Indirizzo"
    , "billCap" => "CAP"
    , "billProvince" => "0"
    , "billCity" => "0"
    , "billTel" => "3331234567"
    , "coupon" => "CODICE_COUPON"
    , "orderId" => "AAAABBBBCCCCDDDDE"
    , "authorizationId" => "AAAABBBBCCCCDDDDE"
    , "attachment" => "Allegato1;Allegato2"
);
```

### Inserimento risposta utente
###### Tipo chiamata: POST
```
https://api.paginemediche.it/api/1.0/tc-add-patient-answer

$headers = array(
    "domain: " . $domain
    , "client-id: " . $client_id
    , "client-secret: " . $client_secret
    , "t: " . $token_login_utente
);

$post_fields = array(
    "answer" => "Testo della risposta del paziente"
    , "qid" => $numero_domanda
    , "attachment" => "Allegato1;Allegato2";
);
```

## Widget
### Inserimento domanda utente
```
$token_login_utente = "";
$domain = $_SERVER["SERVER_NAME"];
$link = "https://www.paginemediche.it/remote-teleconsulto?type=premium&token=" . $token_login_utente . "&domain=" . $domain;

echo '<div id="teleconsulto-box"><script src="' . $link . '"></script></div>';
```

### Dettaglio domanda utente
```
$token_login_utente = "";
$domain = $_SERVER["SERVER_NAME"];
$numero_domanda = 0;
$link = "https://www.paginemediche.it/remote-teleconsulto?token=" . $token_login_utente . "&numero=" . $numero_domanda . "&domain=" . $domain;

echo '<div id="teleconsulto-box"><script src="' . $link . '"></script></div>';
```

# ESPERTO RISPONDE
API Esperto risponde Paginemediche

## Prerequisito
Avere una coppia di informazioni client_id e client_secret valida per il dominio che sta effettuando la chiamata

## Chiamate API

### Lista domande dominio
###### Tipo chiamata: GET
```
https://api.paginemediche.it/api/1.0/er-get-question-list

$headers = array(
    "domain: " . $domain
    , "client-id: " . $client_id
    , "client-secret: " . $client_secret
);
```

### Lista domande utente
###### Tipo chiamata: GET
```
https://api.paginemediche.it/api/1.0/er-get-patient-question-list

$headers = array(
    "domain: " . $domain
    , "client-id: " . $client_id
    , "client-secret: " . $client_secret
    , "t: " . $token_login_utente
);
```

### Dettaglio domanda utente
###### Tipo chiamata: POST
```
https://api.paginemediche.it/api/1.0/er-get-question-detail

$headers = array(
    "domain: " . $domain
    , "client-id: " . $client_id
    , "client-secret: " . $client_secret
    , "t: " . $token_login_utente
);
$post_fields = array(
    "qid" => $numero_domanda
);
```

### Inserimento domanda utente
###### Tipo chiamata: POST
```
https://api.paginemediche.it/api/1.0/er-add-new-question

$headers = array(
    "domain: " . $domain
    , "client-id: " . $client_id
    , "client-secret: " . $client_secret
    , "t: " . $token_login_utente
);

$post_fields = array(
    "questionTitle" => "Titolo della domanda"
    , "questionText" => "Testo della domanda"
);
```

## Widget
### Inserimento domanda utente
```
$token_login_utente = "";
$domain = $_SERVER["SERVER_NAME"];
$link = "https://www.paginemediche.it/remote-teleconsulto?token=" . $token_login_utente . "&domain=" . $domain;

echo '<div id="teleconsulto-box"><script src="' . $link . '"></script></div>';
```

### Dettaglio domanda utente
```
$token_login_utente = "";
$domain = $_SERVER["SERVER_NAME"];
$numero_domanda = 0;
$link = "https://www.paginemediche.it/remote-teleconsulto?token=" . $token_login_utente . "&numero=" . $numero_domanda . "&domain=" . $domain;

echo '<div id="teleconsulto-box"><script src="' . $link . '"></script></div>';
```