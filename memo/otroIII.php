<?php
// pagina2.php
echo $idPer=$_GET['idPer'];
echo $parLat="latitud".$idPer;
echo $latitud=$_COOKIE['latitud'.$idPer];
echo $longitud=$_GET[$parLat];

 
?>