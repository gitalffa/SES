<?php
require_once('WhatsmsApi.php');
$whatsmsapi = new WhatsmsApi();
$whatsmsapi->setApiKey("5d1247dd4aaa2");
$fechaLectura = date("Y-m-d H:i:s");
$whatsmsapi->sendSms("523111200544", "Hello World desde la web! enviado el $fechaLectura");
?>