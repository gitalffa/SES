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
    require_once('../../coneccion/coneccion_obj.php');
    if (!$result = $mysqli->query("SELECT * FROM personas where idPer='$idPer' ORDER BY idPer")){
      printf("Errormessage: $\n",$mysqli->error);
    }else{
      while($renglon=$result->fetch_assoc()){
                          $nombre=$renglon['nombre'];
                           $apellidos=$renglon['apellidos'];
                           $fecNac=$renglon['fecNac'];
                           $urlFot=$renglon['foto'];
                           $direccion=$renglon['direccion'];
                             $telFij=$renglon['telFij'];
                             $telCel=$renglon['telCel'];
                             $corEle=$renglon['corEle'];
                             $conEme1=$renglon['conEme1'];
                             $corEme1=$renglon['corEme1'];
                             $celEme1=$renglon['celEme1'];
                             $conEme2=$renglon['conEme2'];
                             $corEme2=$renglon['corEme2'];
                             $celEme2=$renglon['celEme2'];
                             $conEme3=$renglon['conEme3'];
                             $corEme3=$renglon['corEme3'];
                             $celEme3=$renglon['celEme3'];
                             $comSegGasMed=$renglon['comSegGasMed'];
                             $segGasMed=$renglon['segGasMed'];
                             $numSegVid=$renglon['numSegVid'];
                             $comSegVid=$renglon['comSegVid'];
                             $numSegSoc=$renglon['numSegSoc'];
                             $numIssste=$renglon['numIssste'];
                             $medCab=$renglon['medCab'];
                             $celMedCab=$renglon['celMedCab'];
                             $alergias=$renglon['alergias'];
                             $padecimientos=$renglon['padecimientos'];
                             $enfCro=$renglon['enfCro'];
                             $enfCon=$renglon['enfCon'];
                             $traPre=$renglon['traPre'];
                             $traAct=$renglon['traAct'];
                             $peso=$renglon['peso'];
                             $estatura=$renglon['estatura'];
                             $toxicomanias=$renglon['toxicomanias'];
                             $observaciones=$renglon['observaciones'];
                             $urlfotIfe=$renglon['fotIfe'];
                             $urlfotLicCon=$renglon['fotCon'];
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
                    Bienvenido <?php echo $_SESSION["nombre"]." ".$_SESSION["apellido"];?> 
                </div>
            </div>
        </section>
	        
        <section id="menu-container-logo">
            <ul class="menu dropdown align-left small-3 medium-offset-1" data-dropdown-menu>
               
                <li>
                  <a href="../../views/<?php echo substr($idPer,0,5).".html"; ?>">Regresar</a>  
                </li>
            </ul>
  	</section>
  	<!-- /menu header --> 
       <section id="cuerpoPrincipal">
        <form action="registraPersonas.php" method="post" enctype="multipart/form-data" data-abide novalidate >
          
          <input type="hidden" name="MAX_FILE_SIZE" value="2000000000">
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
                     <!-- Nombre -->
                      <div class="large-6 cell">
                        <label>Nombre
                        <input name="nombre" type="text" placeholder="Fabricio" value='<?php echo $nombre; ?>' aria-describedby="nombre de la Persona" required pattern="text">
                        <span class="form-error">
                          Por favor teclea el Nombre de la Persona.
                        </span>
                      </label>
                      <p class="help-text" id="helpNombre">Nombre de la persona</p>
                      </div>
                    </div>
                  </div>
                  <!-- /Nombre -->
                  <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                           <!-- apellidos -->
                      <div class="large-6 cell">
                            <label>Apellidos
                            <input name="apellidos" type="text" placeholder="Galindo Copado" value='<?php echo $apellidos; ?>' aria-describedby="Apellidos" required pattern="text">
                            <span class="form-error">
                              Por favor teclea los Apellidos.
                            </span>
                          </label>
                          <p class="help-text" id="helpApellidos">Apellidos de la Persona</p>
                      </div>
                      <!-- /apellidos -->
                     <!-- fecha Nacimiento -->
                      <div class="large-6 cell">
                          <label>Fecha Nacimiento
                          <input name="fecNac" type="date" placeholder="28-10-1968" value='<?php echo $fecNac; ?>' aria-describedby="Fecha Nacimiento" required pattern="date">
                          <span class="form-error">
                            Por favor teclea la Fecha de Nacimiento.
                          </span>
                        </label>
                        <p class="help-text" id="helpfecNac">Fecha Nacimiento</p>
                      </div>
                    </div>
                  </div>
                  <div class="grid-container">
                     <!-- direccion -->
                    <div class="grid-x grid-padding-x">
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
                      <!-- Telefono Fijo -->
                      <div class="large-6 cell">
                        <label>Tel Fijo
                        <input name="telFij" type="tel" placeholder="311-2181310" value='<?php echo $telFij; ?>' aria-describedby="Tel Fijo" required pattern="tel">
                        <span class="form-error">
                          Por favor teclea el Telefono Fijo.
                        </span>
                        </label>
                        <p class="help-text" id="helpfecNac">Tel Fijo</p>
                      </div>
                  </div>
                </div>
                <!-- /Telefono Fijo -->
                      <!-- Telefono cel -->
                <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                      <div class="large-6 cell">
                        <label>Tel Celular
                        <input name="telCel" type="tel" placeholder="311-2181310" value='<?php echo $telCel; ?>' aria-describedby="Tel Celular" required pattern="tel">
                        <span class="form-error">
                          Por favor teclea el Telefono Celular.
                        </span>
                      </label>
                      <p class="help-text" id="helpCel">Tel Celular</p>
                      </div>
                       <!-- /Telefono cel -->
                       <!-- correo electronico -->
                      <div class="large-6 cell">
                         <label>Correo Electronico
                        <input name="corEle" type="email" placeholder="fabricio.alffa@gmail" value='<?php echo $corEle; ?>' aria-describedby="Correo electronico" required pattern="email">
                        <span class="form-error">
                          Por favor teclea el Correo Electronico.
                        </span>
                      </label>
                      <p class="help-text" id="helpCel">Correo Electronico</p>
                      </div>
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
                        <input name="conEme2" type="text" placeholder="Fabricio Galindo Copado" value='<?php echo $conEme2; ?>' aria-describedby="Contancto de Emergencia" required pattern="text">
                        <span class="form-error">
                          Por favor teclea Un Contacto de Emergencia.
                        </span>
                      </label>
                      <p class="help-text" id="helpCel">Contacto de Emergencia</p>
                      </div>
                      <div class="large-4 cell">
                        <label>Cel Emergencia
                        <input name="celEme2" type="tel" placeholder="311 1200544" value='<?php echo $celEme2; ?>' aria-describedby="Correo electronico" required pattern="tel">
                        <span class="form-error">
                          Por favor teclea Un Celular de Emergencia.
                        </span>
                      </label>
                      <p class="help-text" id="helpCel">Celular de Emergencia</p>
                      </div>
                      <div class="large-4 cell">
                       <label>Correo Emergencia
                        <input name="corEme2" type="email" placeholder="fabricio.alffa@gmail.com" value='<?php echo $corEme2; ?>' aria-describedby="Correo electronico" required pattern="email">
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
                        <input name="conEme3" type="text" placeholder="Fabricio Galindo Copado" value='<?php echo $conEme3; ?>' aria-describedby="Contancto de Emergencia" required pattern="text">
                        <span class="form-error">
                          Por favor teclea Un Contacto de Emergencia.
                        </span>
                      </label>
                      <p class="help-text" id="helpCel">Contacto de Emergencia</p>
                      </div>
                      <div class="large-4 cell">
                        <label>Cel Emergencia
                        <input name="celEme3" type="tel" placeholder="311 1200544" value='<?php echo $celEme3; ?>' aria-describedby="Correo electronico" required pattern="tel">
                        <span class="form-error">
                          Por favor teclea Un Celular de Emergencia.
                        </span>
                      </label>
                      <p class="help-text" id="helpCel">Celular de Emergencia</p>
                      </div>
                      <div class="large-4 cell">
                        <label>Correo Emergencia
                        <input name="corEme3" type="email" placeholder="fabricio.alffa@gmail.com" value='<?php echo $corEme3; ?>' aria-describedby="Correo electronico" required pattern="email">
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
                <hr>

                <label><strong>Seguros y Salubridad</strong></label>
                <!-- callout -->
                <div class="callout primary">
                  <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                      <!--seguros gasto medicos -->
                      <div class="large-6 cell">
                        <label>Seguro de gastos medicos
                        <input name="segGasMed" type="text" placeholder="V10001384743" value='<?php echo $segGasMed; ?>' aria-describedby="seguro de gastos medicos"  pattern="text">
                        <span class="form-error">
                          Por favor teclea la Poliza de Gastos Medicos.
                        </span>
                      </label>
                      <p class="help-text" id="helpNombre">Seguro de gastos medicos</p>
                      </div>
                      <!-- /seguros gasto medicos -->
                       <!--Compañia seguros gasto medicos -->
                      <div class="large-6 cell">
                        <label>Aseguradora Seg de gas med
                        <input name="comSegGasMed" type="text" placeholder="Seguros Monterrey" value='<?php echo $comSegGasMed; ?>' aria-describedby="compañia seguro de gastos medicos" pattern="text">
                        <span class="form-error">
                          Por favor teclea la Compañia Aseguradora de Gastos Medicos.
                        </span>
                      </label>
                      <p class="help-text" id="helpNombre">Aseguradora Seguro de gastos medicos</p>
                      </div>
                    </div>
                  </div>
                  <!-- /Compañia seguros gasto medicos -->
                       <!--No. de Seguro de vida -->
                  <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                      <div class="large-6 cell">
                        <label>No. de Seguro de Vida
                        <input name="numSegVid" type="text" placeholder="Vi0025846" value='<?php echo $numSegVid; ?>' aria-describedby="No. se seguro de vida"  pattern="text">
                        <span class="form-error">
                          Por favor teclea el numero de Poliza de Seguro de Vida.
                        </span>
                      </label>
                      <p class="help-text" id="helpNombre">Poliza de Seguro de Vida</p>
                      </div>
                      <!-- /No. de seguro de vida -->
                      <!--compañia Seguro de vida -->
                      <div class="large-6 cell">
                        <label>Compañia de Seguro de Vida
                        <input name="comSegVid" type="text" placeholder="Seguros Monterrey" value='<?php echo $comSegVid; ?>' aria-describedby="Compañia Aseguradora"  pattern="text">
                        <span class="form-error">
                          Por favor teclea la Compañia Aseguradora.
                        </span>
                      </label>
                      <p class="help-text" id="helpNombre">Compañia Aseguradora</p>
                      </div>
                    </div>
                  </div>
                    <!-- /compañia seguro de vida --> 
                     <!--No. de Seguro social -->
                  <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                      <div class="large-6 cell">
                       <label>No. de Seguro Social
                            <input name="numSegSoc" type="text" placeholder="55947401778" value='<?php echo $numSegSoc; ?>' size="11" aria-describedby="Numero de seguro social"  pattern="text">
                            <span class="form-error">
                              Por favor teclea el Numero de Seguro Social.
                            </span>
                          </label>
                          <p class="help-text" id="helpNombre">No. de Seguro Social</p>
                      </div>
                       <!-- /No. de Seguro Social -->
                           <!--No. de issste-->
                      <div class="large-6 cell">
                        <label>No. de ISSSTE
                            <input name="numIssste" type="text" placeholder="55947401778" value='<?php echo $numIssste; ?>' size="11" aria-describedby="Numero de ISSSTE"  pattern="text">
                            <span class="form-error">
                              Por favor teclea el Numero ISSSTE.
                            </span>
                          </label>
                          <p class="help-text" id="helpNombre">No. de ISSSTE</p>
                    </div>
                  </div>
                          <!-- /No. de Seguro Social -->
                         <!--med cabecera-->
                  <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                      <div class="large-6 cell">
                        <label>Nombre Medico Cabecera
                            <input name="medCab" type="text" placeholder="Dr. Fabricio Galindo" value='<?php echo $medCab; ?>' size="11" aria-describedby="Nombre Med Cabecera"  pattern="text">
                            <span class="form-error">
                              Por favor teclea El Nombre del Medico de Cabecera.
                            </span>
                          </label>
                          <p class="help-text" id="helpmedCab">Nombre Medico Cabecera</p>
                      </div>
                      <!-- /med cabecera -->
                          <!--cel med cabecera-->
                      <div class="large-6 cell">
                        <label>Celular Medico Cabecera
                            <input name="celMedCab" type="tel" placeholder="3111200544" value='<?php echo $celMedCab; ?>' size="11" aria-describedby="Celular Med Cabecera"  pattern="tel">
                            <span class="form-error">
                              Por favor teclea El Celular del Medico de Cabecera.
                            </span>
                          </label>
                          <p class="help-text" id="helpcelMedCab">Celular Medico Cabecera</p>
                      </div>
                    </div>
                  </div>


                </div>
                 <!-- /callout -->
                <hr>
                 <label><strong>Enfermedades / Padecimientos</strong></label>
                <div class="callout secundary">
                  <!--Alergias-->
                  <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                      <div class="large-6 cell">
                        <label>Alergias
                            <input name="alergias" type="text" placeholder="Cholacolate - Gluten - Pasto ..." aria-describedby="Tipos de Alergias"  pattern="text">
                            <span class="form-error">
                              Por favor teclea Los Tipos de Alergias.
                            </span>
                          </label>
                          <p class="help-text" id="helpAlergias">Tipos de Alergias</p>
                      </div>
                      <!-- /alergias -->
                  <!--tipo de sangre-->
                      <div class="large-6 cell">
                         <label>Tipo de Sangre
                            <input name="tipSan" type="text" placeholder="RH A+" value='<?php echo $tipSan; ?>'  aria-describedby="Tipo de Sangre"  pattern="text">
                            <span class="form-error">
                              Por favor teclea el Tipo de Sangre.
                            </span>
                          </label>
                          <p class="help-text" id="helptipSan">Tipo de Sangre</p>
                      </div>
                    </div>
                  </div>
                  <!-- /tipo de sangre -->
                        
                          <!--Padecimientos-->
                  <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                      <div class="large-6 cell">
                        <label>Padecimientos
                            <input name="padecimientos" type="text" placeholder="" value='<?php echo $padecimientos; ?>' aria-describedby="Padecimientos"  pattern="text">
                            <span class="form-error">
                              Por favor teclea los Padecimientos.
                            </span>
                          </label>
                          <p class="help-text" id="helppadecimientos">Padecimientos</p>
                      </div>
                      <!-- /padecimientos -->
                      <!--enfermedades cronicas-->
                      <div class="large-6 cell">
                        <label>Enfermedades Cronicas
                            <input name="enfCro" type="text" placeholder="" value='<?php echo $enfCro; ?>'  aria-describedby="Enfermedades Cronicas"  pattern="text">
                            <span class="form-error">
                              Por favor teclea las Enfermedades Cronicas.
                            </span>
                          </label>
                          <p class="help-text" id="helpenfCro">Enfermedades Cronicas</p>
                      </div>
                    </div>
                  </div>
                  <!-- /enfermedades cronicas -->
                      <!--enfermedades congenitas-->

                  <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                      <div class="large-6 cell">
                        <label>Enfermedades congenitas
                            <input name="enfCon" type="text" placeholder="" value='<?php echo $enfCon; ?>' aria-describedby="Enfermedades Congenitas"  pattern="text">
                            <span class="form-error">
                              Por favor teclea las Enfermedades Congenitas.
                            </span>
                          </label>
                          <p class="help-text" id="helpNombre">Enfermedades Congenitas</p>
                      </div>
                      <!-- /enfermedades congenitas -->
                      <!--Tratamientos previos-->
                      <div class="large-6 cell">
                        <label>Tratamientos Previos
                            <input name="traPre" type="text" placeholder="" value='<?php echo $traPre; ?>' aria-describedby="Tratamientos Previos"  pattern="text">
                            <span class="form-error">
                              Por favor teclea Tratamientos Previos.
                            </span>
                          </label>
                          <p class="help-text" id="helpNombre">Tratamientos Previos</p>
                      </div>
                    </div>
                  </div>
                  <!-- /padecimientos -->
                      <!--Tratamientos Actuales-->
                  <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                      <div class="large-6 cell">
                        <label>Tratamientos Actuales
                            <input name="traAct" type="text" placeholder="" value='<?php echo $traAct; ?>' aria-describedby="Tratamientos Actuales"  pattern="text">
                            <span class="form-error">
                              Por favor teclea Tratamientos Actuales.
                            </span>
                          </label>
                          <p class="help-text" id="helpNombre">Tratamientos Actuales</p>
                      </div>
                      <!-- /Tratamientos Actuales -->
                      <!--Peso -->
                      <div class="large-6 cell">
                       <label>Peso
                            <input name="peso" type="text" placeholder="" value='<?php echo $peso; ?>' aria-describedby="Toxicomanias" required pattern="number">
                            <span class="form-error">
                              Por favor el Peso.
                            </span>
                          </label>
                          <p class="help-text" id="helpNombre">Peso</p>
                      </div>
                    </div>
                  </div>
                   <!-- /peso -->
                  <!--Estatura -->
                  <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                      <div class="large-6 cell">
                        <label>Estatura
                            <input name="estatura" type="text" placeholder="" value='<?php echo $estatura; ?>' aria-describedby="Toxicomanias" required pattern="number">
                            <span class="form-error">
                              Por favor la Estatura.
                            </span>
                          </label>
                          <p class="help-text" id="helpNombre">Estatura</p>
                      </div>
                       <!-- /peso -->
                 
                    <!--Toxocomanias-->
                      <div class="large-6 cell">
                        <label>Toxicomanias
                            <input name="toxicomanias" type="text" placeholder="" value='<?php echo $toxicomanias; ?>' aria-describedby="Toxicomanias"  pattern="text">
                            <span class="form-error">
                              Por favor teclea Toxicomanias.
                            </span>
                          </label>
                          <p class="help-text" id="helpNombre">Toxicomanias</p>
                      </div>
                    </div>
                  </div>
                  <!-- /Toxocomanias -->
                    <!--Observaciones-->
                  <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                      <div class="large-12 cell">
                        <label>Observaciones
                            <input name="observaciones" type="text" placeholder="" value='<?php echo $observaciones; ?>' aria-describedby="Observaciones"  pattern="text">
                            <span class="form-error">
                              Por favor teclea Observaciones.
                            </span>
                          </label>
                          <p class="help-text" id="helpNombre">Observaciones</p>
                    </div>
                  </div>

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