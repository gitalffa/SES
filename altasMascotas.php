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
    <link rel="stylesheet" href="css/foundation.css">
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
                    Bienvenido <?php echo $_SESSION["nombre"]." ".$_SESSION["apellido"];?> 
                </div>
            </div>
        </section>
	        
        <section id="menu-container-logo">
            <ul class="menu dropdown align-left small-3 medium-offset-1" data-dropdown-menu>
                <li>
                    <a href="altasPersonas.php">Altas Mascotas</a>  
                </li>
                <li>
                    <a href="bajasPersonas.php">Bajas Mascotas</a>  
                </li>
                <li>
                  <a href="admin.php">Regresar</a>  
                </li>
            </ul>
  	</section>
  	<!-- /menu header --> 
       <section id="cuerpoPrincipal">
        <form action="registraMascotas.php" method="post" enctype="multipart/form-data" data-abide novalidate >
                <div data-abide-error class="alert callout" style="display: none;">
                    <p><i class="fi-alert"></i> Existen algunos errores en tu formulario, por favor llena los campos que faltan.</p>
                </div>
                <label><strong>Datos Principales</strong></label>
                <!-- callout -->
            <div class="callout secundary">
                 <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                      <!-- Identificación -->
                      <div class="large-3 cell">
                        <label>Ident Mascota
                         
                            
                             <input name="idMas" type="text"  placeholder="M1001" aria-describedby="Id de Mascota"  required pattern="text"> 
                          
                        <span class="form-error">
                          Por favor teclea la Identificación de la Mascota.
                        </span>
                      </label>
                      <p class="help-text" id="helpNombre">Identificación única de la Mascota</p>
                      </div>
                      <!-- fin Identificación -->
                     <!-- Nombre -->
                      <div class="large-3 cell">
                        <label>Password Collar
                            <input name="passCollar1" type="Password" required aria-describedby="passCollar"  pattern="Password">
                            <span class="form-error">
                              Por Favor Teclea el password
                            </span>
                          </label>
                          <p class="help-text" id="helppassCollar">Password Collar</p>
                      </div>
                      <!-- pass 1 -->
                      <div class="large-3 cell">
                            <label>repita Password Collar
                            <input name="passCollar2" type="Password" required aria-describedby="passCollar"  pattern="Password">
                            <span class="form-error">
                              Por Favor Teclea el password
                            </span>
                          </label>
                          <p class="help-text" id="helppassCollar">Password Collar</p>
                      </div>
                      <!-- /apellidos -->
                    </div>
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