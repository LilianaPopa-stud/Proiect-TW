<?php
require_once('resources/google-api/vendor/autoload.php');
$gClient =  new Google_Client();
$gClient->setClientId("1005556800536-qarmet75rtlbqbof51m1gku0stm77qas.apps.googleusercontent.com");
$gClient->setClientSecret("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");
$gClient->setApplicationName("BPIC Login");
$gClient->setRedirectUri("http://localhost/BPIC/registration/server.php");
$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

$login_url = $gClient->createAuthUrl();
?>