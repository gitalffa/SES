<!doctype html>

<html class="no-js" lang="en" dir="ltr">

  <head>

    <meta charset="utf-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Credencial SES</title>

    <link rel="stylesheet" href="../css/foundation.css">

    <link rel="stylesheet" href="../css/app.css">

  </head>

  <body>



<div class="column small-12 medium-9" align="center">

    

          <?php

         $idPer=$_GET['idPer'];

         $latitud = $_COOKIE["latitud".$idPer];

         $longitud = $_COOKIE["longitud".$idPer];

         

          

          

          $archivoActual = $_SERVER['PHP_SELF'];

          //header("refresh:1;url=$archivoActual");

          require_once('../coneccion/coneccion_obj.php');

          $resultadoTrabajador=$mysqli->query("select * from personas where idPer='$idPer'");

           if(!$resultadoTrabajador){

                            printf("Errormessage: $\n",$mysqli->error);

                          }else{

                          while($renglon=$resultadoTrabajador->fetch_assoc()){

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

                             $tipSan=$renglon['tipSan'];

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

         

          $nombre_fichero=$urlFot;



              if (file_exists($nombre_fichero)) {

                ?>

                <div class="media-object" align="center">

                  <div class="media-object-section">

                    

                    

                    <img src="<?php echo $nombre_fichero; ?>" height='300' width='300'>

                    

                  </div>

                </div>

                

                <div class="grid-container">

                     <div class="grid-x grid-padding-x">

                       <div class="large-6 cell">

                        <form action="../Models/index.php" method="get" enctype="multipart/form-data" data-abide novalidate >

                           <input type="hidden" name="idPer" value="<?php echo $idPer; ?>">

                           <input type="hidden" name="camFot">

                            <fieldset class="large-6 columns">

                                <button name="enviar" class="button" type="submit" value="Submit">Cambiar Foto</button>

                            </fieldset>

                        </form>

                       </div>

                     </div>

                  </div>

                <?php

              } else {

                 ?>

                  <div class="callout primary">

                    <p>No existe una foto del usuario</p>

                    <p>Por favor vaya al final de Menu</p>

                    <p>para dar de alta sus datos</p>

                  </div>

                  <div class="grid-container">

                     <div class="grid-x grid-padding-x">

                       <div class="large-6 cell">

                        <form action="../Models/index.php" method="get" enctype="multipart/form-data" data-abide novalidate >

                           <input type="hidden" name="idPer" value="<?php echo $idPer; ?>">

                           <input type="hidden" name="camFot">

                            <fieldset class="large-6 columns">

                                <button name="enviar" class="button" type="submit" value="Submit">Subir Foto</button>

                            </fieldset>

                        </form>

                       </div>

                     </div>

                  </div>

                <?php

              }

          ?>

        

    <ul class="accordion" data-accordion data-allow-all-closed="true">

        <li class="accordion-item is-active" data-accordion-item>

          <a href="#" class="accordion-title">Datos Personales</a>

          <div class="accordion-content" data-tab-content>

            <div class="callout primary"><div class="callout primary">

              <div class="row">

                            <!-- datos Personales -->

                            <strong>Datos Personales</strong>

                            <div class="small-12 columns">

                              <label>Nombre</label>

                              <p><?php echo $nombre." ".$apellidos; ?></p>

                            </div>

                    </div>

                    <div class="row">

                            <div class="small-12 columns">

                              <label>Fecha Nac.</label>

                              <p><?php echo $fecNac; ?></p>

                            </div>

                    </div>

                    <div class="row">

                            <div class="small-12 columns">

                              <label>Dirección</label>

                             

                              <p><?php echo $direccion; ?></p>

                            </div>

                    </div>

                              <!-- /datos Personales -->

                       

                       <div class="row">

                            <div class="small-4 columns">

                              <label>Correo Electronico</label>

                              <p><?php echo $corEle; ?></p>

                              

                            </div>

                    </div>

                    <div class="row">

                            <div class="small-4 columns">

                              

                              <a href="tel:<?php echo $telFij; ?>"><strong>Telefono Fijo</strong> <span><?php echo $telFij; ?></span></a>

                             

                            </div>

                    </div>

                    <div class="row">

                            <div class="small-4 columns">

                              

                              <a href="tel:<?php echo $telCel; ?>"><strong>Telefono Celular</strong> <span><?php echo $telCel; ?></span></a>

                            </div>

                    </div>

                            

                              <!-- /datos Personales -->

            </div>

          </div>

        </li>

        <li class="accordion-item" data-accordion-item>

          <a href="#" class="accordion-title">Contacto de Emergencia</a>

          <div class="accordion-content" data-tab-content>

            <div class="callout warning">

              <div class="row">

                        <!-- Contacto de Emergencia -->

                        <strong>Contacto de Emergencia I</strong>

                        <div class="small-12 columns">

                          <label>Cont. Emergencia</label>

                          <p><?php echo $conEme1; ?></p>

                        </div>

                </div>

                <div class="row">

                        <div class="small-12 columns">

                          <a href="tel:<?php echo $celEme1; ?>"><strong>Celular de Emergencia</strong> <span><?php echo $celEme1; ?></span></a>

                        </div>

                </div>

                <div class="row">

                        <div class="small-12 columns">

                         <a href="mailto:<?php echo $corEme1; ?>"><strong>Correo de Emergencia</strong> <span><?php echo $corEme1; ?></span></a>

                        </div>

                </div>

                <div class="row">

                        <!-- Contacto de Emergencia -->

                        <strong>Contacto de Emergencia II</strong>

                        <div class="small-12 columns">

                          <label>Cont. Emergencia</label>

                          <p><?php echo $conEme2; ?></p>

                        </div>

                </div>

                <div class="row">

                        <div class="small-12 columns">

                         <a href="tel:<?php echo $celEme2; ?>"><strong>Celular de Emergencia</strong> <span><?php echo $celEme2; ?></span></a>

                        </div>

                </div>

                <div class="row">

                        <div class="small-12 columns">

                          <a href="mailto:<?php echo $corEme2; ?>"><strong>Correo de Emergencia</strong> <span><?php echo $corEme2; ?></span></a>

                        </div>

                </div>

                <div class="row">

                        <!-- Contacto de Emergencia -->

                        <strong>Contacto de Emergencia III</strong>

                        <div class="small-12 columns">

                          <label>Cont. Emergencia</label>

                          <p><?php echo $conEme3; ?></p>

                        </div>

                </div>

                <div class="row">

                        <div class="small-12 columns">

                         <a href="tel:<?php echo $celEme3; ?>"><strong>Celular de Emergencia</strong> <span><?php echo $celEme3; ?></span></a>

                        </div>

                </div>

                <div class="row">

                        <div class="small-12 columns">

                          <a href="mailto:<?php echo $corEme3; ?>"><strong>Correo de Emergencia</strong> <span><?php echo $corEme3; ?></span></a>

                        </div>

                </div>

            </div>

          </div>

        </li>

        <li class="accordion-item" data-accordion-item>

          <a href="#" class="accordion-title">Seguros y Salubridad</a>

          <div class="accordion-content" data-tab-content>

            <div class="callout alert">

               <div class="row">

                        <!-- Seguros y Salubridad -->

                        <strong>Seguros y Salubridad</strong>

                        <div class="small-12 columns">

                          <label>Seguro de Gastos Medicos</label>

                         

                          <p><?php echo $segGasMed; ?></p>

                        </div>

                </div>

                <div class="row">

                        <div class="small-12 columns">

                          <label>Compañia Seguro de Gastos Medicos</label>

                         

                          <p><?php echo $comSegGasMed; ?></p>

                        </div>

                </div>

                <div class="row">

                        <div class="small-12 columns">

                          <label>No. de Seguro de Vida</label>

                         

                          <p><?php echo $numSegVid; ?></p>

                        </div>

                </div>

                <div class="row">

                        <div class="small-12 columns">

                          <label>Compañia de Seguro de Vida</label>

                          

                          <p><?php echo $comSegVid; ?></p>

                        </div>

                </div>

                <div class="row">

                        <div class="small-12 columns">

                          <label>Numero de IMSS</label>

                         

                          <p><?php echo $numSegSoc; ?></p>

                        </div>

                </div>

                <div class="row">

                        <div class="small-12 columns">

                          <label>Numero de Issste</label>

                          

                          <p><?php echo $numIssste; ?></p>

                        </div>

                </div>

                <div class="row">

                        <div class="small-12 columns">

                          <label>Nombre Med. de Cabecera</label>

                         

                          <p><?php echo $medCab; ?></p>

                        </div>

                </div>

                <div class="row">

                        <div class="small-12 columns">



                           <a href="tel:<?php echo $celMedCab; ?>"><strong>Celular Medico de Cabecera</strong> <span><?php echo $celMedCab; ?></span></a>

                        </div>

                </div>



            </div>

          </div>

        </li>

        <li class="accordion-item" data-accordion-item>

          <a href="#" class="accordion-title">Enfermedades / Padecimientos</a>

          <div class="accordion-content" data-tab-content>

            <div class="callout primary">

              <div class="row">

                        <!-- Enfermedades / Padecimientos -->

                        <strong>Enfermedades / Padecimientos</strong>

                        <div class="small-12 columns">

                          <label>Alergias</label>

                         

                          <p><?php echo $alergias; ?></p>

                        </div>

            </div>

            <div class="row">

                        <div class="small-12 columns">

                          <label>Tipo de Sangre</label>

                          

                          <p><?php echo $tipSan; ?></p>

                        </div>

            </div>

            <div class="row">

                        <div class="small-12 columns">

                          <label>Padecimientos</label>

                          

                          <p><?php echo $padecimientos; ?></p>

                        </div>

            </div>

            <div class="row">

                        <div class="small-12 columns">

                          <label>Enfermedades Cornicas</label>

                          

                          <p><?php echo $enfCro; ?></p>

                        </div>

            </div>

            <div class="row">

                        <div class="small-12 columns">

                          <label>Enfermedades Congenicas</label>

                          <p><?php echo $enfCon; ?></p>

                         

                        </div>

            </div>

            <div class="row">

                        <div class="small-12 columns">

                          <label>Tratamientos Previos</label>

                         

                          <p><?php echo $traPre; ?></p>

                        </div>

            </div>

            <div class="row">

                        <div class="small-12 columns">

                          <label>Tratamientos Actuales</label>

                          

                          <p><?php echo $traAct; ?></p>

                        </div>

            </div>

            <div class="row">

                        <div class="small-12 columns">

                          <label>Estatura</label>

                          <p><?php echo $estatura; ?></p>

                         

                        </div>

            </div>

            <div class="row">

                        <div class="small-12 columns">

                          <label>Peso</label>

                          <p><?php echo $peso; ?></p>

                          

                        </div>

            </div>

            <div class="row">

                        <div class="small-12 columns">

                          <label>Toxicomanias</label>

                         

                          <p><?php echo $toxicomanias; ?></p>

                        </div>

            </div>

            <div class="row">

                        <div class="small-12 columns">

                          <label>Observaciones</label>

                          

                           <p><?php echo $observaciones; ?></p>

                        </div>

            </div>

            </div>

          </div>

        </li>

         <li class="accordion-item" data-accordion-item>

          <a href="#" class="accordion-title">Indentificaciones</a>

          <div class="accordion-content" data-tab-content>

            <div class="callout primary">

              

                <?php



                $nombre_fichero=$urlfotIfe;



              if (file_exists($nombre_fichero)) {

                ?>

                <div class="media-object">

                  <div class="media-object-section">

                    

                    <div class="thumbnail">

                    <img src="<?php echo $nombre_fichero; ?>" height='300' width='300'>

                    </div>

                  </div>

                </div>

                

                <div class="grid-container">

                     <div class="grid-x grid-padding-x">

                       <div class="large-6 cell">

                        <form action="../Models/index.php" method="get" enctype="multipart/form-data" data-abide novalidate >

                           <input type="hidden" name="idPer" value="<?php echo $idPer; ?>">

                           <input type="hidden" name="camIfe">

                            <fieldset class="large-6 columns">

                                <button name="envia" class="button" type="submit" value="Submit">Cambiar Foto</button>

                            </fieldset>

                        </form>

                       </div>

                     </div>

                  </div>

                <?php

              } else {

                 ?>

                  <div class="callout primary">

                    <p>No existe una foto de la cred. del IFE</p>

                    <p>Por favor haga clic en el boton de abajo</p>

                    <p>para subir la foto.</p>

                  </div>

                  <div class="grid-container">

                     <div class="grid-x grid-padding-x">

                       <div class="large-6 cell">

                        <form action="../Models/index.php" method="get" enctype="multipart/form-data" data-abide novalidate >

                           <input type="hidden" name="idPer" value="<?php echo $idPer; ?>">

                           <input type="hidden" name="camIfe">

                            <fieldset class="large-6 columns">

                                <button name="envia" class="button" type="submit" value="Submit">Subir Foto</button>

                            </fieldset>

                        </form>

                       </div>

                     </div>

                  </div>

                <?php

              }





                $nombre_fichero=$urlfotLicCon;



              if (file_exists($nombre_fichero)) {

                ?>

                <div class="media-object">

                  <div class="media-object-section">

                    

                    <div class="thumbnail">

                    <img src="<?php echo $nombre_fichero; ?>" height='300' width='300'>

                    </div>

                  </div>

                </div>

                

                <div class="grid-container">

                     <div class="grid-x grid-padding-x">

                       <div class="large-6 cell">

                        <form action="../Models/index.php" method="get" enctype="multipart/form-data" data-abide novalidate >

                           <input type="hidden" name="idPer" value="<?php echo $idPer; ?>">

                           <input type="hidden" name="camLic">

                            <fieldset class="large-6 columns">

                                <button name="envia" class="button" type="submit" value="Submit">Cambiar Foto</button>

                            </fieldset>

                        </form>

                       </div>

                     </div>

                  </div>

                <?php

              } else {

                 ?>

                  <div class="callout primary">

                    <p>No existe una foto de la Lic de Conducir</p>

                    <p>Por favor haga clic en el boton de abajo</p>

                    <p>para subir la foto.</p>

                  </div>

                  <div class="grid-container">

                     <div class="grid-x grid-padding-x">

                       <div class="large-6 cell">

                        <form action="../Models/index.php" method="get" enctype="multipart/form-data" data-abide novalidate >

                           <input type="hidden" name="idPer" value="<?php echo $idPer; ?>">

                           <input type="hidden" name="camLic">

                            <fieldset class="large-6 columns">

                                <button name="envia" class="button" type="submit" value="Submit">Subir Foto</button>

                            </fieldset>

                        </form>

                       </div>

                     </div>

                  </div>

                <?php

              }



                ?>



                

            </div>

          </div>

        </li>

        <li class="accordion-item" data-accordion-item>

          <a href="#" class="accordion-title">Da de alta tus datos</a>

          <div class="accordion-content" data-tab-content>

            <div class="callout primary">

              <div class="media-object">

              <div class="media-object-section">

                

                <div class="thumbnail">

                <a href="../Models/index.php?idPer=<?php echo $idPer; ?>"> Captura tus Datos</a>

                </div>

              </div>

            </div>

            

            </div>

          </div>

        </li>





        <li class="accordion-item" data-accordion-item>

          <a href="#" class="accordion-title">Estadisticas de la Cuenta</a>

          <div class="accordion-content" data-tab-content>

            <div class="callout primary">

               <div class="grid-container">

                     <div class="grid-x grid-padding-x">

                       <div class="large-6 cell">

                        <p>Tu Cuenta Fue Creada el <strong><?php echo $created_at ?></strong></p>

                        <p>y su última actualización fue el <strong><?php echo $updated_at ?></strong></p>

                       </div>

                     </div>

                  </div>

            </div>

          </div>

        </li>



      </ul>

<?php

    date_default_timezone_set('America/Mazatlan');

    $fechaLectura = date("Y-m-d H:i:s");

    ini_set( 'display_errors', 1 );

    error_reporting( E_ALL );

    $from = "info@siempreestoyseguro.com";

    $para = "52"."$celEme1";

    $to = $corEme1;

    $subject = "Correo enviado por siempreestoyseguro.com";

    $message = utf8_encode("Ha sido leido el QR adscrito a  $nombre $apellidos  el dia $fechaLectura.

    Da click en la siguiente liga para ubicarlo : https://www.google.com/maps/place/$latitud,$longitud

    ");



require_once('../Models/WhatsmsApi.php');

$whatsmsapi = new WhatsmsApi();

$whatsmsapi->setApiKey("5d1247dd4aaa2");
//$whatsmsapi->setApiKey("5d0feb8a2184c");

$whatsmsapi->sendSms("$para", "$message");



  $headers = "From:" . $from;

    mail($to,$subject,$message, $headers);

    echo "El mensaje ha sido enviado $fechaLectura.";

    $to=$corEme2;

    mail($to,$subject,$message, $headers);

    echo "El mensaje ha sido enviado $fechaLectura.";

    $to=$corEme3;

    mail($to,$subject,$message, $headers);

    echo "El mensaje ha sido enviado $fechaLectura.";

?>



</div>



    <script src="../js/vendor/jquery.js"></script>

    <script src="../js/vendor/what-input.js"></script>

    <script src="../js/vendor/foundation.js"></script>

    <script src="../js/app.js"></script>

  </body>

</html>

