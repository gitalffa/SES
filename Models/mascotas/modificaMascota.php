<?php
 
	session_start();
        $hoy = date("Y-m-d");
        $idMas=$_GET['idMas'];
	if($_SESSION["logueado"] == TRUE){
            if($_SESSION["rol"]){
                $verdadero=TRUE;
            }else{
            $verdadero=FALSE;
            }
    // coneccion a la base de datos
    require_once('../../coneccion/coneccion_obj.php');
    if (!$result = $mysqli->query("SELECT * FROM mascotas where idMas='$idMas' ORDER BY idMas")){
      printf("Errormessage: $\n",$mysqli->error);
    }else{
      while($renglon=$result->fetch_assoc()){
                          $nombre=$renglon['nombre'];
                          
                          
                              $urlFot=$renglon['foto'];
                              $direccion=$renglon['direccion'];
                             $conEme1=$renglon['conEme1'];
                             $corEme1=$renglon['corEme1'];
                             $celEme1=$renglon['celEme1'];
                             $conEme2=$renglon['conEme2'];
                             $corEme2=$renglon['corEme2'];
                             $celEme2=$renglon['celEme2'];
                             $conEme3=$renglon['conEme3'];
                             $corEme3=$renglon['corEme3'];
                             $celEme3=$renglon['celEme3'];
                             $propietario=$renglon['propietario'];
                             $raza=$renglon['raza'];
                             $color=$renglon['color'];
                             $edad=$renglon['edad'];
                             $talla=$renglon['talla'];
                             $medVete=$renglon['medVete'];
                             $celMedVete=$renglon['celMedVete'];
                             $padecimientos=$renglon['padecimientos'];
                             $peso=$renglon['peso'];
                             $foto=$renglon['foto'];
                             $observaciones=$renglon['observaciones'];
                             $created_at=$renglon['created_at'];
                             $updated_at=$renglon['updated_at'];
                         }
    }
		?>
  
 
		<!doctype html>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Altas/Bajas Personas</title>
    <link rel="stylesheet" type="text/css" href="../../css/icons/foundation-icons.css">
    <link rel="stylesheet" href="../../css/foundation_flex.css">
    <link rel="stylesheet" href="../../css/foundation.css">
    <link rel="stylesheet" href="../../css/app.css">

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
                    Altas/Bajas Personas
                </div>
                <div class="column small-6">
                    Bienvenido <?php echo $_SESSION["nombre"];?> 
                </div>
            </div>
        </section>
	        
        <section id="menu-container-logo">
            <ul class="menu dropdown align-left small-3 medium-offset-1" data-dropdown-menu>
               
                <li>
                  <a href="../../views/<?php echo substr($idMas,0,5).".html"; ?>">Regresar</a>  
                </li>
            </ul>
  	</section>
  	<!-- /menu header --> 
       <section id="cuerpoPrincipal">
        <form action="registraMascotas.php" method="post" enctype="multipart/form-data" data-abide novalidate >
          
         
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
                        <label>Ident Mascota
                          <?php
                          if ($verdadero){
                          ?>
                             <input type="hidden" name="idMas" value="<?php echo $idMas; ?>   ">
                             <input name="idMas" type="text" value="<?php echo $idMas; ?>   " placeholder="P1001" aria-describedby="Id de Persona" required disabled="TRUE" pattern="text"> 
                           <?php
                          }else{
                              ?>
                              <input type="hidden" name="idMas" value="<?php echo $idMas; ?>   ">
                             <input name="idMas" type="text" placeholder="<?php echo $idMas; ?>" aria-describedby="Id de Mascota" required disabled="TRUE" pattern="text"> 
                          <?php   
                          }
                           ?>
                        <span class="form-error">
                          Por favor teclea la Identificación de la Mascota.
                        </span>
                      </label>
                      <p class="help-text" id="helpNombre">Identificación única de la Mascota</p>
                      </div>
                      <!-- fin Identificación -->
                     <!-- Nombre -->
                      <div class="large-6 cell">
                        <label>Nombre
                        <input name="nombre" type="text" placeholder="Fabricio" value='<?php echo $nombre; ?>' aria-describedby="nombre de la Mascota" required pattern="text">
                        <span class="form-error">
                          Por favor teclea el Nombre de la Mascota.
                        </span>
                      </label>
                      <p class="help-text" id="helpNombre">Nombre de la Mascota</p>
                      </div>
                    </div>
                  </div>
                  <!-- /Nombre -->
                  
                  <div class="grid-container">
                     <!-- propietario -->
                    <div class="grid-x grid-padding-x">
                      <div class="large-6 cell">
                        <label>Propietario
                        <input name="propietario" type="text" placeholder="Fabricio Galindo" value='<?php echo $propietario; ?>' aria-describedby="propietario" required pattern="text">
                        <span class="form-error">
                          Por favor teclea nombre del propietario.
                        </span>
                        </label>
                        <p class="help-text" id="helpfecNac">Propietario</p>
                      </div>
                         <!-- /propietario -->
                   
                      <div class="large-6 cell">
                        <label>Direccion
                        <input name="direccion" type="text" placeholder="Calamar #39" value='<?php echo $direccion; ?>' aria-describedby="direccion" required pattern="text">
                        <span class="form-error">
                          Por favor teclea la Dirección.
                        </span>
                        </label>
                        <p class="help-text" id="helpfecNac">Direccion</p>
                      </div>
                         <!-- /direccion -->
                    </div>
                  </div>
                </div>

                <!-- /callout -->
                <hr>
                <p><strong>Contactos de Emergencia</strong></p>
                <div class="callout alert">
                    <!-- Contacto de Emergencia 1 -->
                    <p><strong>Contactos de Emergencia I</strong></p>
                  <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                      <div class="large-4 cell">
                        <label>Cont. de  Emergencia
                        <input name="conEme1" type="text" placeholder="Fabricio Galindo Copado" value='<?php echo $conEme1; ?>' aria-describedby="Contancto de Emergencia" required pattern="text">
                        <span class="form-error">
                          Por favor teclea Un Contacto de Emergencia.
                        </span>
                      </label>
                      <p class="help-text" id="helpCel">Contacto de Emergencia</p>
                      </div>
                      <div class="large-4 cell">
                        <label>Cel Emergencia
                        <input name="celEme1" type="tel" placeholder="311 1200544" value='<?php echo $celEme1; ?>' aria-describedby="Correo electronico" required pattern="tel">
                        <span class="form-error">
                          Por favor teclea Un Celular de Emergencia.
                        </span>
                      </label>
                      <p class="help-text" id="helpCel">Celular de Emergencia</p>
                      </div>
                      <div class="large-4 cell">
                        <label>Correo Emergencia
                        <input name="corEme1" type="email" placeholder="fabricio.alffa@gmail.com" value='<?php echo $corEme1; ?>' aria-describedby="Correo electronico" required pattern="email">
                        <span class="form-error">
                          Por favor teclea Un Correo de Emergencia.
                        </span>
                      </label>
                      <p class="help-text" id="helpCel">Correo de Emergencia</p>
                      </div>
                    </div>
                  </div>
                   <!-- Contacto de Emergencia 2-->
                   <p><strong>Contactos de Emergencia II</strong></p>
                  <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                      <div class="large-4 cell">
                        <label>Cont. de  Emergencia
                        <input name="conEme2" type="text" placeholder="Fabricio Galindo Copado" value='<?php echo $conEme2; ?>' aria-describedby="Contancto de Emergencia"  pattern="text">
                        <span class="form-error">
                          Por favor teclea Un Contacto de Emergencia.
                        </span>
                      </label>
                      <p class="help-text" id="helpCel">Contacto de Emergencia</p>
                      </div>
                      <div class="large-4 cell">
                        <label>Cel Emergencia
                        <input name="celEme2" type="tel" placeholder="311 1200544" value='<?php echo $celEme2; ?>' aria-describedby="Correo electronico"  pattern="tel">
                        <span class="form-error">
                          Por favor teclea Un Celular de Emergencia.
                        </span>
                      </label>
                      <p class="help-text" id="helpCel">Celular de Emergencia</p>
                      </div>
                      <div class="large-4 cell">
                       <label>Correo Emergencia
                        <input name="corEme2" type="email" placeholder="fabricio.alffa@gmail.com" value='<?php echo $corEme2; ?>' aria-describedby="Correo electronico"  pattern="email">
                        <span class="form-error">
                          Por favor teclea Un Correo de Emergencia.
                        </span>
                      </label>
                      <p class="help-text" id="helpCel">Correo de Emergencia</p>
                      </div>
                    </div>
                  </div>
                   <!-- Contacto de Emergencia 3-->
                    <p><strong>Contactos de Emergencia III</strong></p>
                  <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                      <div class="large-4 cell">
                        <label>Cont. de  Emergencia
                        <input name="conEme3" type="text" placeholder="Fabricio Galindo Copado" value='<?php echo $conEme3; ?>' aria-describedby="Contancto de Emergencia"  pattern="text">
                        <span class="form-error">
                          Por favor teclea Un Contacto de Emergencia.
                        </span>
                      </label>
                      <p class="help-text" id="helpCel">Contacto de Emergencia</p>
                      </div>
                      <div class="large-4 cell">
                        <label>Cel Emergencia
                        <input name="celEme3" type="tel" placeholder="311 1200544" value='<?php echo $celEme3; ?>' aria-describedby="Correo electronico"  pattern="tel">
                        <span class="form-error">
                          Por favor teclea Un Celular de Emergencia.
                        </span>
                      </label>
                      <p class="help-text" id="helpCel">Celular de Emergencia</p>
                      </div>
                      <div class="large-4 cell">
                        <label>Correo Emergencia
                        <input name="corEme3" type="email" placeholder="fabricio.alffa@gmail.com" value='<?php echo $corEme3; ?>' aria-describedby="Correo electronico"  pattern="email">
                        <span class="form-error">
                          Por favor teclea Un Correo de Emergencia.
                        </span>
                      </label>
                      <p class="help-text" id="helpCel">Correo de Emergencia</p>
                      </div>
                    </div>
                  </div>

                </div>
                  <!-- /callout -->
                <p><strong>Veterinario</strong></p>
                <div class="callout alert">
                    <!-- Medico VEterinario -->
                    <p><strong>Medico Veterinario</strong></p>
                  <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                      <div class="large-4 cell">
                        <label>Nombre
                        <input name="medVete" type="text" placeholder="Fabricio Galindo Copado" value='<?php echo $medVete; ?>' aria-describedby="Medico Veterinario" required pattern="text">
                        <span class="form-error">
                          Por favor teclea el Medico veterinario.
                        </span>
                      </label>
                      <p class="help-text" id="helpCel">Medico Veterinario</p>
                      </div>
                      <div class="large-4 cell">
                        <label>Cel Medico Veterinario
                        <input name="celMedVete" type="tel" placeholder="311 1200544" value='<?php echo $celMedVete; ?>' aria-describedby="Correo electronico" required pattern="tel">
                        <span class="form-error">
                          Por favor teclea Un Celular del Veterinario.
                        </span>
                      </label>
                      <p class="help-text" id="helpCel">Celular de Veterinario</p>
                      </div>
                      <div class="large-4 cell">
                        <label>Padecimientos
                        <input name="padecimientos" type="text" placeholder="" value='<?php echo $padecimientos; ?>' aria-describedby="padecimientos" >
                        <span class="form-error">
                          Por favor teclea los padecimientos.
                        </span>
                      </label>
                      <p class="help-text" id="helpCel">Padecimientos</p>
                      </div>
                    </div>
                  </div>
                   <!-- Contacto de Emergencia 2-->
                   <p><strong>Peso</strong></p>
                  <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                      <div class="large-4 cell">
                        <label>Peso
                        <input name="peso" type="number" placeholder="" value='<?php echo $peso; ?>' aria-describedby="peso" >
                        <span class="form-error">
                          Por favor teclea el peso.
                        </span>
                      </label>
                      <p class="help-text" id="helpCel">peso</p>
                      </div>
                      <div class="large-4 cell">
                        <label>Observaciones
                        <input name="observaciones" type="tel" placeholder="" value='<?php echo $observaciones; ?>' aria-describedby="observaciones" >
                        <span class="form-error">
                          Por favor teclea alguna observacion.
                        </span>
                      </label>
                      <p class="help-text" id="helpCel">observaciones</p>
                      </div>
                      
                    </div>
                  </div>
                  

                </div>
                  <!-- /callout -->
                <hr>

               
                 <label><strong>Caracteristicas / Mascota</strong></label>
                <div class="callout secundary">
                  <!--raza-->
                  <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                      <div class="large-6 cell">
                        <label>Raza
                            <input name="raza" type="text" placeholder="Labrador - Chihuhua" aria-describedby="Raza"  pattern="text">
                            <span class="form-error">
                              Por favor la raza de la mascota.
                            </span>
                          </label>
                          <p class="help-text" id="helpAlergias">Raza</p>
                      </div>
                      <!-- /raza -->
                  <!--color-->
                      <div class="large-6 cell">
                         <label>Color
                            <input name="color" type="text" placeholder="Café" value='<?php echo $color; ?>'  aria-describedby="Color"  pattern="text">
                            <span class="form-error">
                              Por favor teclea el color de la mascota.
                            </span>
                          </label>
                          <p class="help-text" id="helptipSan">Color</p>
                      </div>
                    </div>
                  </div>
                  <!-- /color -->
                        
                          <!--edad-->
                  <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                      <div class="large-6 cell">
                        <label>Edad
                            <input name="edad" type="number" placeholder="" value='<?php echo $edad; ?>' aria-describedby="edad"  pattern="number">
                            <span class="form-error">
                              Por favor teclea la Edad de la mascota.
                            </span>
                          </label>
                          <p class="help-text" id="helppadecimientos">Edad</p>
                      </div>
                      <!-- /edad -->
                      <!--talla-->
                      <div class="large-6 cell">
                        <label>Talla
                            
                              <select name="talla">
                                <option value="Grande">Grande</option>
                                <option value="Mediano">Mediano</option>
                                <option value="Chico">Chico</option>
                              </select>
                           
                            <span class="form-error">
                              Por favor teclea la talla de la mascota.
                            </span>
                          </label>
                          <p class="help-text" id="helpenfCro">talla</p>
                      </div>
                    </div>
                  </div>
                  <!-- /talla -->
 </div>
                 
                 <!-- /callout -->
                <hr>
               <div data-abide-error class="alert callout" style="display: none;">
                    <p><i class="fi-alert"></i> Existen algunos errores en tu formulario, por favor llena los campos que faltan.</p>
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
        <script src="../../js/vendor/jquery.js"></script>
    <script src="../../js/vendor/what-input.js"></script>
    <script src="../../js/vendor/foundation.js"></script>
    <script src="../../js/app.js"></script>
    </body>
</html>
		<?php
                
	} else {
		header("Location: index.php");
	}
 
 ?>