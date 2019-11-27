<?php
 
if(isset($_GET["error"]) && $_GET["error"] != "login") {
    header("Location: index.php");
  }
 
 require_once('../coneccion/coneccion_obj.php');
          $idMas=$_GET['idMas'];
          $resultadoTrabajador=$mysqli->query("select * from mascotas where idMas='$idMas'");
           if(!$resultadoTrabajador){
                            printf("Errormessage: $\n",$mysqli->error);
                          }else{
                          while($renglon=$resultadoTrabajador->fetch_assoc()){
                          
                           $urlFot=$renglon['foto'];
                           $nombre=$renglon['nombre'];
                           
                           
                         }
                       }
           //$nombre_fichero=$urlFot;

            $nombre_fichero=substr($urlFot,3);
 ?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/icons/foundation-icons.css">
    <link rel="stylesheet" href="../css/foundation_flex.css">
    <link rel="stylesheet" href="../css/app.css">

  </head>
<body>
 
 
    <h5 align="center">Siempre Estoy Seguro</h5>
    <h5 align="center">Sistema de Codificacion <strong>QR</strong></h5>
    <?php
 
      if(isset($_GET["error"])) {
                            ?>
                            <section id="login" class="callout alert" align="center">
                              Contraseña erronea.<br> Intentelo de nuevo.
                            </section>
                           <?php    
      }
 
     



?>


<p id="demo"></p>

<script>
var x = document.getElementById("demo");
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";

  }
}

function showPosition(position) {
  var latitud = position.coords.latitude;
  var longitud = position.coords.longitude;
  document.cookie = "latitud<?php echo $idMas; ?> = " + latitud;
  document.cookie = "longitud<?php echo $idMas; ?> = " + longitud;
  x.innerHTML = "Gracias por tu ayuda";
   x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;

}

getLocation();
</script>
<div class="grid-container">
  <div class="grid-x grid-margin-x">
    <div class="cell small-offset-1 small-10">
        <p>La mascota que trae este collar se llama <strong><?php 
              if($nombre!=""){
                echo $nombre;  
                }else{
                echo "Sin Datos";
              }
         ?></strong>, y posiblemente que este perdido y asustado, junto al codigo QR que acabas de leer trae escrito una contraseña que tendras que introducir en el campo que se encuentra abajo para que le llegue un mensaje a su dueño y de ser posible tu mismo puedas marcar a los telefonos de emergencia que aparecen en su credencial</p>
       </div>
  </div>
</div>


<div class="column medium-offset-4 medium-4" >     
  <section id="login" class="callout secundary">
    <?php
    if (file_exists($nombre_fichero)) {
                ?>
                <div class="media-object">
                  <div class="media-object-section">
                    <img src="<?php echo $nombre_fichero; ?>" height='300' width='300'>  
                  </div>
                </div>
                
               
                <?php
              }

    ?>
    <form action="logincreSesMas.php" method="post" enctype="multipart/form-data" data-abide novalidate>
     
      
      <div>
       
          <input type="hidden" name="usuario" value="<?php echo $idMas; ?>">   
      </div>
      
        <input type="password" class="form-control" name="password" placeholder="Password" size="8">
        <span class="form-error">
                            Por favor teclea tu pass.
        </span>
        </label>
                        <p class="help-text" id="helpNombre">El Password lo encuentras en el collar</p>
      <button type="submit" name="enviar" class="btn btn-default">Entrar</button>
    </form>
  </section>
</div>
  </div>
 
    <footer class="footer align-left small-5 medium-offset-1">
          <h6>Contacto</h6>
          <a href="tel:+013111916868"><strong>Telefono</strong> <span>3111916868</span></a>
          <a href="mailto:westrup@gmail.com"><strong>E-mail</strong> <span>westrup@gmail.com</span></a>
    </footer>
    <!-- /contacto -->
    <script src="../js/vendor/jquery.js"></script>
        <script src="../js/vendor/what-input.js"></script>
        <script src="../js/vendor/foundation.js"></script>
        <script src="../js/app.js"></script>
  </body>
</html>