<?php

$dbhost = '209.59.139.52';
$dbusername = 'siempree_weso';
$dbuserpass = 'z2Dca2qeHxDYPmN';
$default_dbname = 'siempree_seguro';


    
    $mysqli = new mysqli($dbhost, $dbusername, $dbuserpass, $default_dbname);
    if ($mysqli->connect_errno) {
       echo "Lo sentimos, este sitio web está experimentando problemas."."<br>";
       echo "Error: Fallo al conectarse a MySQL debido a: \n"."<br>";
       echo "Errno: " . $mysqli->connect_errno . "\n";
       echo "Error: " . $mysqli->connect_error . "\n";
    
   
    exit;
}

?>