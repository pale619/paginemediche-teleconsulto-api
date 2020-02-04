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
https://api.paginemediche.it/api/1.0/tc-add-patient-answer"

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