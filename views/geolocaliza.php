<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <?php
     date_default_timezone_set('America/Mazatlan');
    $fechaLectura=$_GET['fechaLectura'];
    $idPer=$_GET['idPer'];
    $latitud=$_GET['latitud'];
    $longitud=$_GET['longitud'];
    require_once('../coneccion/coneccion_obj.php');
          $resultadoTrabajador=$mysqli->query("select * from personas where idPer='$idPer'");
           if(!$resultadoTrabajador){
                            printf("Errormessage: $\n",$mysqli->error);
                          }else{
                          while($renglon=$resultadoTrabajador->fetch_assoc()){
                          $nombre=$renglon['nombre'];
                          $apellidos=$renglon['apellidos'];
                          
                         }
                       }
      $texto="La pulsera de tu familiar ".$nombre." ".$apellidos." fue leida el dia ".$fechaLectura." en estas coordenadas Lat: ".$latitud." Long: ".$longitud ;
     ?>

    <div id="map"></div>
    <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var map, infoWindow;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          
          zoom: 17

        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: <?php echo $latitud; ?>,
              lng: <?php echo $longitud; ?>
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('<?php echo $texto; ?>');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2t1pKMQqTMjPQJDGBAQUqMQK5tqmbAsI&callback=initMap">
    </script>
  </body>
</html>