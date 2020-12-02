<?php
//config.php

require_once 'vendor/autoload.php';

$google_client = new Google_Client();

$google_client->setClientId('177727695476-hi7ld41ak5e241cp0r9ed06gh94tkd2r.apps.googleusercontent.com');

$google_client->setClientSecret('lOVTx9DP39gJckk_igPuS-5f');

$google_client->setRedirectUri('http://localhost/test-php/Project2/login.php');

$google_client->addScope('email');

$google_client->addScope('profile');    

?>