<?php
 
	session_start();
        $hoy = date("Y-m-d");
        $idPer=$_GET['idPer'];
	if($_SESSION["logueado"] == TRUE){
            if($_SESSION["rol"]){
                $verdadero=TRUE;
            }else{
            $verdadero=FALSE;
            }
    // coneccion a la base de datos
    require_once('../coneccion/coneccion_obj.php');
		?>
  

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sube Foto Personal</title>
    <link rel="stylesheet" type="text/css" href="../css/icons/foundation-icons.css">
    <link rel="stylesheet" href="../css/foundation_flex.css">
    <link rel="stylesheet" href="../css/foundation.css">
    <link rel="stylesheet" href="../css/app.css">

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
                    Sube Foto Personal
                </div>
                <div class="column small-6">
                    Bienvenido <?php echo $_SESSION["idPer"]." ".$_SESSION["nombre"]." ".$_SESSION["apellido"];?> 
                </div>
            </div>
        </section>
	        
        <section id="menu-container-logo">
            <ul class="menu dropdown align-left small-3 medium-offset-1" data-dropdown-menu>
               
                <li>
                  <a href="../views/<?php echo substr($idPer,0,5).".html"; ?>">Regresar</a>  
                </li>
            </ul>
  	</section>
  	<!-- /menu header --> 
       <section id="cuerpoPrincipal">
        <form action="regFotPer.php" method="post" enctype="multipart/form-data" data-abide novalidate >
          
          <input type="hidden" name="MAX_FILE_SIZE" value="500000">
                <div data-abide-error class="alert callout" style="display: none;">
                    <p><i class="fi-alert"></i> Existen algunos errores en tu formulario, por favor llena los campos que faltan.</p>
                </div>
                <label><strong>Datos Personales</strong></label>
                <!-- callout -->
            <div class="callout secundary">
                 <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                      <!-- Identificación -->
                      <div class="large-6 cell">
                        <label>Ident Persona
                          <?php
                          if ($verdadero){
                          ?>
                             <input type="hidden" name="idPer" value="<?php echo $idPer; ?>   ">
                             <input name="idPer" type="text" value="<?php echo $idPer; ?>   " placeholder="P1001" aria-describedby="Id de Persona" required disabled="TRUE" pattern="text"> 
                           <?php
                          }else{
                              ?>
                              <input type="hidden" name="idPer" value="<?php echo $idPer; ?>   ">
                             <input name="idPer" type="text" placeholder="<?php echo $idPer; ?>" aria-describedby="Id de Persona" required disabled="TRUE" pattern="text"> 
                          <?php   
                          }
                           ?>
                        <span class="form-error">
                          Por favor teclea la Identificación de la Persona.
                        </span>
                      </label>
                      <p class="help-text" id="helpNombre">Identificación única de la Persona</p>
                      </div>
                      <!-- fin Identificación -->
                    
                </div>
                 <!-- /callout -->
                <hr>
                <label><strong>Archivos </strong></label>
                <div class="callout primary">
                  
                     <!--Foto -->
                     
                        
                         
                           <div class="small-12 columns">
                          <label>Foto
                            <input name="foto" type="file" multiple aria-describedby="Foto" required pattern="file">
                            <span class="form-error">
                              Selecciona el archivo de la foto.
                            </span>
                          </label>
                          <p class="help-text" id="helpNombre">Foto</p>
                        </div>
                        
                      
                        

                  <!-- /Foto  -->
                  
                  
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
        <script src="../js/vendor/jquery.js"></script>
    <script src="../js/vendor/what-input.js"></script>
    <script src="../js/vendor/foundation.js"></script>
    <script src="../js/app.js"></script>
    </body>
</html>
		<?php
                
	} else {
		header("Location: index.php?idPer=$idPer");
	}
 
 ?>