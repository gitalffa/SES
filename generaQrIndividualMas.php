<?php
 
	session_start();
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
    <title>Generacion QR</title>
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
                    Generacion QR
                </div>
                <div class="column small-6">
                    Bienvenido <?php echo $_SESSION["nombre"]." ".$_SESSION["apellido"];?> 
                </div>
            </div>
        </section>
	        
        <section id="menu-container-logo">
            <ul class="menu dropdown align-left small-3 medium-offset-1" data-dropdown-menu>
                <li>
                  <a href="admin.php">Regresar</a>  
                </li>
            </ul>
  	</section>
  	<!-- /menu header --> 
        <!-- panza -->
        <section id="cuerpoPrincipal">
            <form action="qRIndividualMas.php" method="get" data-abide novalidate >
                <div data-abide-error class="alert callout" style="display: none;">
                    <p><i class="fi-alert"></i> Existen algunos errores en tu formulario, por favor llena los campos que faltan.</p>
                </div>
                  <div class="row">

                      <div class="small-12">
                      <label>Num Vehiculo
                      <select name="idMas" id="select">
                      <?php
                        $resultadoTotalVehiculos=$mysqli->query("select * from mascotas");
                        if(!$resultadoTotalVehiculos){
                          printf("Errormessage: $\n",$mysqli->error);
                        }else{
                          while($renglon=$resultadoTotalVehiculos->fetch_assoc()){
                            ?>
                            <option value="<?php echo $renglon['idMas']; ?>"><?php echo $renglon['idMas']." ".$renglon['nombre']; ?></option>

                            <?php
                          }
                        }
                      ?>
                    </select>
                    </div>
                  </div>     
                <div class="row">
                    <fieldset class="large-6 columns">
                        <button name="envia" class="button" type="submit" value="Submit">Submit</button>
                    </fieldset>
                    <fieldset class="large-6 columns">
                      <button class="button" type="reset" value="Reset">Reset</button>
                    </fieldset>
                </div>
            </form> 
        </section>
        <!-- fin panza -->
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