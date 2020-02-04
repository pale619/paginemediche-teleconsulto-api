<?php
$token_login_utente = ""; /* OTTINIBILE DALLA REGISTRAZIONE E EFFETTUANDO IL LOGIN */
$numero_domanda = 0;
$domain = $_SERVER["SERVER_NAME"];

$link = "https://www.paginemediche.it/remote-teleconsulto?token=" . $token_login_utente . "&numero=" . $numero_domanda . "&domain=" . $domain;

echo '<div id="teleconsulto-box"><script src="' . $link . '"></script></div>';
die();