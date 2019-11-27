<?php

    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "luis.westrup@siempreestoyseguro.com";
    $to = "$corEme1";
    $subject = "Correo enviado por siempreestoyseguro.com";
    $message = "Ha sido leido el QR adscrito a $nombre $apellidos";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "El mensaje ha sido enviado.";
?>