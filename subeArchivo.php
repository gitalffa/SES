<?php
 
	session_start();
	if($_SESSION["logueado"] == TRUE) {
		?>
 
		<!doctype html>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Altas/Bajas Taxistas</title>
    <link rel="stylesheet" type="text/css" href="css/icons/foundation-icons.css">
    <link rel="stylesheet" href="css/foundation_flex.css">
    <link rel="stylesheet" href="css/app.css">
<?php
        //            include 'favicon.php';
    ?>
  </head>
    <body>
        <section id="encabezado">
            <div class="row">
                <div class="column small-12">
                    <h5 align="center">Página de Administración</h5> 
                    <h6 align="center">Altas/Bajas de Taxistas</h6>
                </div>
            </div>
            <div class="row">
                <div class="column small-3 small-offset-8">
                    Bienvenido <?php echo $_SESSION["nombre"];?> 
                </div>
            </div>
        </section>

        <section id="menu-container-logo">
            <ul class="menu dropdown align-left small-3 medium-offset-1" data-dropdown-menu>
                <li>
                     <a href="altasTaxistas.php">Altas Taxistas</a>  
                </li>
                <li>
                    <a href="bajasTaxistas.php">Bajas Taxistas</a>   
                </li>
                <li>
                  <a href="admin.php">Regresar</a>  
                </li>
            </ul>
  	</section>
  	<!-- /menu header --> 
        <section>
        <?php
        echo $IdTaxista=$_POST["IdTaxista"];
        $nombre=$_POST["nombre"];
        $tipoDeArchivo=$_FILES['userfile']['type'];
        $tamañoArchivo=$_FILES['userfile']['size'];
        var_dump($tipoDeArchivo);
        var_dump($tamañoArchivo);
        $nombreArchivo="images/".$nombre.".jpg";
        if(!(strpos($tipoDeArchivo, 'jpeg') && ($tamañoArchivo < 2000000000))){
          ?>
          <div class="callout success small-6 column  small-offset-3 text-center">
                        <p>La extension o el tamaño de los archivos no es correcto</p>
                        <p>solo se permiten archivo gif y jpg con un tamaño no mayor</p>
                        <p>a los 100 Kb.</p>
          </div>
          <?php
        }else{
          if (move_uploaded_file($_FILES['userfile']['tmp_name'], $nombreArchivo)){
            ?>
            <div class="callout success small-6 column  small-offset-3 text-center">
                        <p>El archivo fue cargado correctamente</p>
            </div>
            <?php
          }else{
             ?>
            <div class="callout success small-6 column  small-offset-3 text-center">
                        <p>Hubo un error en la carga</p>
            </div>
            <?php
          }
        }

        require_once('coneccion/coneccion_obj.php');
        /***/
           

            /* determinar el número de filas del resultado */
            

           echo $IdTaxista;
               $inserta=$mysqli->query("UPDATE trabajadores SET urlFoto='$nombreArchivo' WHERE id='$IdTaxista' ");
               if($inserta==true){
                   ?>
            <section >
                <div class="callout success small-6 column  small-offset-3 text-center">
                        Se agrego el id <?php echo $IdTaxista; ?> del taxista <?php echo $nombre; ?>.
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
           
        
        /****/
        
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