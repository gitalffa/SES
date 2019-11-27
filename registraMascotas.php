<?php
 
	session_start();
        date_default_timezone_set('America/Mazatlan');
        $hoy = date("Y-m-d");
	if($_SESSION["logueado"] == TRUE){
            if($_SESSION["rol"]){
                $verdadero=TRUE;
            }else{
            $verdadero=FALSE;
            }
    // coneccion a la base de datos
    require_once('coneccion/coneccion_obj.php');
		?>
  
 
		<!doctype html>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Altas/Bajas Mascotas</title>
    <link rel="stylesheet" type="text/css" href="css/icons/foundation-icons.css">
    <link rel="stylesheet" href="css/foundation_flex.css">
    <link rel="stylesheet" href="css/app.css">

  </head>
    <body>
        <section id="encabezado">
            <div class="row">
                <div class="column small-12">
                    <h5 align="center">Página de Administración</h5> 
                </div>
            </div>
            <div class="row">
                <div class="column small-6 ">
                    Altas/Bajas Mascotas
                </div>
                <div class="column small-6">
                     Bienvenido <?php echo $_SESSION["idPer"]." ".$_SESSION["nombre"]." ".$_SESSION["apellido"];?> 
                </div>
            </div>
        </section>
	        
       <section id="menu-container-logo">
            <ul class="menu dropdown align-left small-3 medium-offset-1" data-dropdown-menu>
                <li>
                    <a href="altasMascotas.php">Altas Mascotas</a>  
                </li>
                <li>
                    <a href="#">Bajas Mascotas</a>  
                </li>
                <li>
                  <a href="admin.php">Regresar</a>  
                </li>
            </ul>
    </section>
  	<!-- /menu header --> 
       <section id="cuerpoPrincipal">
        <?php
        $idMas=$_POST['idMas'];
        $passCollar1=$_POST['passCollar1'];
        $passCollar2=$_POST['passCollar2'];
        
       
        
        $created_at=date("Y-m-d H:i:s");
        $updated_at=date("Y-m-d H:i:s");
        require("coneccion/coneccion_obj.php");
        if($passCollar2==$passCollar1){
          if ($result = $mysqli->query("SELECT idMas FROM mascotas where idMas='$idMas' ORDER BY idMas")) {
              $row_cnt = $result->num_rows;
              if ( $row_cnt==0 ){
                $inserta=$mysqli->query("insert into mascotas (id,idMas,password,passcollar,nombre,direccion,conEme1,celEme1,corEme1,conEme2,celEme2,corEme2,conEme3,celEme3,corEme3,propietario,raza,color,edad,talla,medVete,celMedVete,padecimientos,peso,foto,observaciones,created_at,updated_at) value ('0','$idPer','$idPer','$passCollar1','','','','','','','','','','','','','','',0,0,'','','',0,'','','$created_at','$updated_at')");
                if($inserta==true){

                  ?>
                    <section >
                        <div class="callout success small-6 column  small-offset-3 text-center">
                                Ya se inserto el registro 
                        </div>
                    </section>
                    
                    <?php
               
               }else{
                    ?>
                    <section >
                        <div class="callout success small-6 column  small-offset-3 text-center">
                                Ocurrio un error en la insersión.
                                <?php echo $mysqli->error; ?>
                        </div>
                    </section>
                    
                    <?php
               }

               
              }else{
                 ?>
                    <section >
                        <div class="callout success small-6 column  small-offset-3 text-center">
                                Ya existe el registro  
                        </div>
                    </section>
                    
                    <?php
              }
          }else{
            echo "algo paso que no se inserto el registro";
          }
        }else{
           ?>
                       <div class="callout alert">
                              <div class="row">
                              
                                    <div class="small-12 columns" align="center">
                                     <p> Los Passwords no coinciden</p>
                                    </div>
                              </div>
                        </div>
                      <?php
        }

        ?>

       </section>



        <footer class="footer align-left small-5 medium-offset-1">
              <h6>Contacto</h6>
              
              <a href="tel:+013111916868"><strong>Telefono</strong> <span>3111916868</span></a>
              <a href="mailto:westrup@gmail.com"><strong>E-mail</strong> <span>westrup@gmail.com</span></a>
        </footer>
        <!-- /contacto -->
        <script src="js/vendor/jquery.js"></script>
        <script src="js/vendor/what-input.js"></script>
        <script src="js/vendor/foundation.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>
		<?php
                
	} else {
		header("Location: index.php");
	}
 
 ?>