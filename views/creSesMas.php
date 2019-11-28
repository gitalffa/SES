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
         $idMas=$_GET['idMas'];
         $latitud = $_COOKIE["latitud".$idMas];
         $longitud = $_COOKIE["longitud".$idMas];
         
          
          
          $archivoActual = $_SERVER['PHP_SELF'];
          //header("refresh:1;url=$archivoActual");
          require_once('../coneccion/coneccion_obj.php');
          $resultadoTrabajador=$mysqli->query("select * from mascotas where idMas='$idMas'");
           if(!$resultadoTrabajador){
                            printf("Errormessage: $\n",$mysqli->error);
                          }else{
                          while($renglon=$resultadoTrabajador->fetch_assoc()){
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
          $nombre_fichero=substr($urlFot,3);
          //$nombre_fichero=substr($urlFot,3);
              if (file_exists($nombre_fichero)) {
                ?>
              <div class="callout primary">
                <h6>Siempre Estoy Seguro</h6>
               <div class="grid-container">
                <div class="grid-x grid-margin-x">
                  <div >
                   <div class="media-object" align="center">
                      <div class="media-object-section">
                      <img src="<?php echo $nombre_fichero; ?>" height='300' width='300'>
                  </div>
                 </div> 
                </div>
                </div>
              </div>
            </div>
               
                
                <div class="grid-container">
                     <div class="grid-x grid-padding-x">
                       <div class="large-6 cell">
                        <form action="../Models/mascotas/index.php" method="get" enctype="multipart/form-data" data-abide novalidate >
                           <input type="hidden" name="idMas" value="<?php echo $idMas; ?>">
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
                        <form action="../Models/mascotas/index.php" method="get" enctype="multipart/form-data" data-abide novalidate >
                           <input type="hidden" name="idMas" value="<?php echo $idMas; ?>">
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
          <a href="#" class="accordion-title">Datos Mascota</a>
          <div class="accordion-content" data-tab-content>
            <div class="callout primary">
              <div class="row">
                            <!-- datos Personales -->
                            <strong>Datos Mascota</strong>
                            <div class="small-12 columns">
                              <label>Nombre</label>
                              <p><?php echo $nombre; ?></p>
                            </div>
                    </div>
                  
                  <div class="row">
                            <div class="small-12 columns">
                              <label>Dirección</label>
                             
                              <p><?php echo $direccion; ?></p>
                            </div>
                    </div>
                    <div class="row">
                            <div class="small-12 columns">
                              <label>Propietario</label>
                             
                              <p><?php echo $propietario; ?></p>
                            </div>
                    </div>
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
          <a href="#" class="accordion-title">Caracteristicas de la Mascota</a>
          <div class="accordion-content" data-tab-content>
            <div class="callout primary">
              <div class="grid-container">
               <div class="grid-x grid-padding-x">
                 <div class="large-6 cell">
                    Raza
                 </div>
                 <div class="large-6 cell">
                    <strong><?php echo $raza; ?></strong>
                 </div>
                 <div class="large-6 cell">
                    Color
                 </div>
                 <div class="large-6 cell">
                    <strong><?php echo $color; ?></strong>
                 </div>
                 <div class="large-6 cell">
                   Edad
                 </div>
                 <div class="large-6 cell">
                    <strong><?php echo $edad; ?></strong>
                 </div>
                 

               </div>
             </div>
            
            </div>
          </div>
        </li>
        <li class="accordion-item" data-accordion-item>
          <a href="#" class="accordion-title">Veterinaria</a>
          <div class="accordion-content" data-tab-content>
            <div class="callout primary">
              <div class="grid-container">
               <div class="grid-x grid-padding-x">
                 <div class="large-6 cell">
                    Medico Veterinario
                 </div>
                 <div class="large-6 cell">
                    <strong><?php echo $medVete; ?></strong>
                 </div>
                 <div class="large-6 cell">
                    Celular Veterinario
                 </div>
                 <div class="large-6 cell">
                    <a href="tel:<?php echo $celMedVete; ?>"> <span><?php echo $celMedVete; ?></span></a>
                 </div>
                 <div class="large-6 cell">
                   Padecimientos
                 </div>
                 <div class="large-6 cell">
                    <strong><?php echo $padecimientos; ?></strong>
                 </div>
                 <div class="large-6 cell">
                   Peso
                 </div>
                 <div class="large-6 cell">
                    <strong><?php echo $peso; ?></strong>
                 </div>
                 <div class="large-6 cell">
                   Talla
                 </div>
                 <div class="large-6 cell">
                    <strong><?php echo $talla; ?></strong>
                 </div>
                 <div class="large-6 cell">
                   Observaciones
                 </div>
                 <div class="large-6 cell">
                    <strong><?php echo $observaciones; ?></strong>
                 </div>
                 
               </div>
             </div>
            
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
                <a href="../Models/mascotas/index.php?idMas=<?php echo $idMas; ?>"> Captura tus Datos</a>
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
    $message = utf8_encode("Ha sido leido el QR adscrito a  $nombre  el dia $fechaLectura.
    Da click en la siguiente liga para ubicarlo : https://www.google.com/maps/place/$latitud,$longitud
    ");

/*require_once('../Models/WhatsmsApi.php');
$whatsmsapi = new WhatsmsApi();
$whatsmsapi->setApiKey("5d0feb8a2184c");
$whatsmsapi->sendSms("$para", "$message");*/
  $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "El mensaje ha sido enviado $fechaLectura.";
    $to=$corEme2;
    mail($to,$subject,$message, $headers);
    echo "El mensaje ha sido enviado $fechaLectura.";
    $to=$corEme3;
    mail($to,$subject,$message, $headers);
    echo "El mensaje ha sido enviado $fechaLectura.";

 $inserta=$mysqli->query("insert into localizacion (id,idPer,localizacion,fecha,status) value ('0','$idPer',ST_GeomFromText('POINT($latitud $longitud)'),'$fechaLectura',1)");
    if($inserta==False){
       ?>
                    <section >
                        <div class="callout success small-6 column  small-offset-3 text-center">
                                Ocurrio un error en la insersión.
                                <?php echo $mysqli->error; ?>
                        </div>
                    </section>
                    
                    <?php
    }

/*//SMS Semysms


 $url = "https://semysms.net/api/3/sms.php"; //Url address for sending SMS
 $phone = $celEme1; // Phone number
 $msg = $message;  // Message
 $device = '154588';  //  Device code
 $token = '4be7a9a260587d169e8c93ed7bda6f25';  //  Your token (secret)

 $data = array(
        "phone" => $phone,
        "msg" => $msg,
        "device" => $device,
        "token" => $token
    );

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);     
    $output = curl_exec($curl);
    curl_close($curl);

    echo $output;*/



   // https://semysms.net/api/3/sms.php?token=61829ab50c6fe91076dd72655a0363c4&device=153673&phone=3111200544&msg=Eres%20Chingon
?>
</div>
    <script src="../js/vendor/jquery.js"></script>
    <script src="../js/vendor/what-input.js"></script>
    <script src="../js/vendor/foundation.js"></script>
    <script src="../js/app.js"></script>
  </body>
</html>