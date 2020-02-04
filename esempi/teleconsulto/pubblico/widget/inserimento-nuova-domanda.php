<?php
$token_login_utente = ""; /* OTTINIBILE DALLA REGISTRAZIONE E EFFETTUANDO IL LOGIN */
$domain = $_SERVER["SERVER_NAME"];

$link = "https://www.paginemediche.it/remote-teleconsulto?type=premium&token=" . $token_login_utente . "&domain=" . $domain;

echo '<div id="teleconsulto-box"><script src="' . $link . '"></script></div>';
die();