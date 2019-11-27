<?php

//Agregamos la libreria para genera códigos QR
	require "phpqrcode/qrlib.php";   
  ini_set( 'display_errors', 0 );
  error_reporting( E_ALL ); 
	
	//Declaramos una carpeta temporal para guardar la imagenes generadas
	$dir = 'temp/';
	require_once('coneccion/coneccion_obj.php');
	$idPer=$_GET['idPer'];
	$resultadoTrabajador=$mysqli->query("select * from personas where idPer='$idPer'");
  //var_dump($resultadoTrabajador);
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

                     }
                        }
	//Si no existe la carpeta la creamos
	if (!file_exists($dir))
        mkdir($dir);
	
        //Declaramos la ruta y nombre del archivo a generar
	$filename = $dir."$nombre".".png";
 
        //Parametros de Condiguración
	
	$tamaño = 1; //Tamaño de Pixel
	$level = 'H'; //Precisión Baja
	$framSize = 3; //Tamaño en blanco
	$contenido = "http://www.siempreestoyseguro.com/views/$idPer".".html"; //Texto
	
	
        //Mostramos la imagen generada
	 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credencial SeS</title>
    <link rel="stylesheet" type="text/css" href="css/icons/foundation-icons.css">
    <link rel="stylesheet" href="css/foundation_flex.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
<body>
<?php
echo "nombre: ".$nombre." ".$apellidos;
	echo "<br>";
	echo "Id: ".$idPer;
	echo "<br>";
  echo $urlFot;
        //Enviamos los parametros a la Función para generar código QR 
	QRcode::png($contenido, $filename, $level, $tamaño, $framSize); 
echo '<img src="'.$dir.basename($filename).'" /><hr/>'; 
$fichero_salida_html="views/".$idPer.".html";
$archivo_html="<!doctype html>
<html class=\"no-js\" lang=\"en\" dir=\"ltr\">
  <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"x-ua-compatible\" content=\"ie=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1;creSesPass.php?idPer=".$idPer."\">
    <title>Credencial SES</title>
    <link rel=\"stylesheet\" href=\"../css/foundation.css\">
    <link rel=\"stylesheet\" href=\"../css/app.css\">
  </head>
  <body>
<div class=\"column small-12 medium-9\">
  <div class=\"callout primary\">
        <h1>Siempre Estoy Seguro </h1>
  </div>
</div>
    <script src=\"../js/vendor/jquery.js\"></script>
    <script src=\"../js/vendor/what-input.js\"></script>
    <script src=\"../js/vendor/foundation.js\"></script>
    <script src=\"../js/app.js\"></script>
  </body>
</html>
";

$fp=fopen($fichero_salida_html,'w+');
fwrite($fp,$archivo_html);
fclose($fp);
if(!file_exists($fichero_salida_html)) die("Error en la Generacion del Archivo");
else echo "Archivo " . $fichero_salida_html . " Generado.";

$fichero_salida="views/".$idPer.".php";
$archivo="<!doctype html>
<html class=\"no-js\" lang=\"en\" dir=\"ltr\">
  <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"x-ua-compatible\" content=\"ie=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Credencial SES</title>
    <link rel=\"stylesheet\" href=\"../css/foundation.css\">
    <link rel=\"stylesheet\" href=\"../css/app.css\">
  </head>
  <body>
<div class=\"column small-12 medium-9\">
    <div class=\"media-object\">
      <div class=\"media-object-section\">
        <div class=\"thumbnail\">
          <?php
          require_once('../coneccion/coneccion_obj.php');
          \$idPer=\$_GET['idPer'];
          \$resultadoTrabajador=\$mysqli->query(\"select * from personas where idPer='\$idPer'\");
           if(!\$resultadoTrabajador){
                            printf(\"Errormessage: $\\n\",\$mysqli->error);
                          }else{
                          while(\$renglon=\$resultadoTrabajador->fetch_assoc()){
                          \$nombre=\$renglon['nombre'];
                           \$apellidos=\$renglon['apellidos'];
                           \$fecNac=\$renglon['fecNac'];
                           \$urlFot=\$renglon['foto'];
                           \$direccion=\$renglon['direccion'];
                             \$telFij=\$renglon['telFij'];
                             \$telCel=\$renglon['telCel'];
                             \$corEle=\$renglon['corEle'];
                             \$conEme1=\$renglon['conEme1'];
                             \$corEme1=\$renglon['corEme1'];
                             \$celEme1=\$renglon['celEme1'];
                             \$conEme2=\$renglon['conEme2'];
                             \$corEme2=\$renglon['corEme2'];
                             \$celEme2=\$renglon['celEme2'];
                             \$conEme3=\$renglon['conEme3'];
                             \$corEme3=\$renglon['corEme3'];
                             \$celEme3=\$renglon['celEme3'];
                             \$comSegGasMed=\$renglon['comSegGasMed'];
                             \$segGasMed=\$renglon['segGasMed'];
                             \$numSegVid=\$renglon['numSegVid'];
                             \$comSegVid=\$renglon['comSegVid'];
                             \$numSegSoc=\$renglon['numSegSoc'];
                             \$numIssste=\$renglon['numIssste'];
                             \$medCab=\$renglon['medCab'];
                             \$celMedCab=\$renglon['celMedCab'];
                             \$alergias=\$renglon['alergias'];
                             \$padecimientos=\$renglon['padecimientos'];
                             \$enfCro=\$renglon['enfCro'];
                             \$enfCon=\$renglon['enfCon'];
                             \$traPre=\$renglon['traPre'];
                             \$traAct=\$renglon['traAct'];
                             \$peso=\$renglon['peso'];
                             \$estatura=\$renglon['estatura'];
                             \$toxicomanias=\$renglon['toxicomanias'];
                             \$observaciones=\$renglon['observaciones'];
                             \$urlfotIfe=\$renglon['fotIfe'];
                             \$urlfotLicCon=\$renglon['fotCon'];
                         }
                       }
         
          \$nombre_fichero=\$urlFot;

              if (file_exists(\$nombre_fichero)) {
                ?>
                
                <img src=\"<?php echo \$nombre_fichero; ?>\" height='300' width='300'>
                <?php
              } else {
                 ?>
                  <div class=\"callout primary\">
                    <p>No existe una foto del usuario</p>
                    <p>Por favor vaya al final de Menu</p>
                    <p>para dar de alta sus datos</p>
                  </div>
                <?php
              }
          ?>
        </div>
      </div>
    </div>
    <ul class=\"accordion\" data-accordion data-allow-all-closed=\"true\">
        <li class=\"accordion-item is-active\" data-accordion-item>
          <a href=\"#\" class=\"accordion-title\">Datos Personales</a>
          <div class=\"accordion-content\" data-tab-content>
            <div class=\"callout primary\"><div class=\"callout primary\">
              <div class=\"row\">
                            <!-- datos Personales -->
                            <strong>Datos Personales</strong>
                            <div class=\"small-12 columns\">
                              <label>Nombre</label>
                              <p><?php echo \$nombre.\" \".\$apellidos; ?></p>
                            </div>
                    </div>
                    <div class=\"row\">
                            <div class=\"small-12 columns\">
                              <label>Fecha Nac.</label>
                              <p><?php echo \$fecNac; ?></p>
                            </div>
                    </div>
                    <div class=\"row\">
                            <div class=\"small-12 columns\">
                              <label>Dirección</label>
                             
                              <p><?php echo \$direccion; ?></p>
                            </div>
                    </div>
                              <!-- /datos Personales -->
                       
                       <div class=\"row\">
                            <div class=\"small-4 columns\">
                              <label>Correo Electronico</label>
                              <p><?php echo \$corEle; ?></p>
                              
                            </div>
                    </div>
                    <div class=\"row\">
                            <div class=\"small-4 columns\">
                              
                              <a href=\"tel:<?php echo \$telFij; ?>\"><strong>Telefono Fijo</strong> <span><?php echo \$telFij; ?></span></a>
                             
                            </div>
                    </div>
                    <div class=\"row\">
                            <div class=\"small-4 columns\">
                              
                              <a href=\"tel:<?php echo \$telCel; ?>\"><strong>Telefono Celular</strong> <span><?php echo \$telCel; ?></span></a>
                            </div>
                    </div>
                            
                              <!-- /datos Personales -->
            </div>
          </div>
        </li>
        <li class=\"accordion-item\" data-accordion-item>
          <a href=\"#\" class=\"accordion-title\">Contato de Emergencia</a>
          <div class=\"accordion-content\" data-tab-content>
            <div class=\"callout warning\">
              <div class=\"row\">
                        <!-- Contacto de Emergencia -->
                        <strong>Contacto de Emergencia I</strong>
                        <div class=\"small-12 columns\">
                          <label>Cont. Emergencia</label>
                          <p><?php echo \$conEme1; ?></p>
                        </div>
                </div>
                <div class=\"row\">
                        <div class=\"small-12 columns\">
                          <a href=\"tel:<?php echo \$celEme1; ?>\"><strong>Celular de Emergencia</strong> <span><?php echo \$celEme1; ?></span></a>
                        </div>
                </div>
                <div class=\"row\">
                        <div class=\"small-12 columns\">
                         <a href=\"mailto:<?php echo \$corEme1; ?>\"><strong>Correo de Emergencia</strong> <span><?php echo \$corEme1; ?></span></a>
                        </div>
                </div>
                <div class=\"row\">
                        <!-- Contacto de Emergencia -->
                        <strong>Contacto de Emergencia II</strong>
                        <div class=\"small-12 columns\">
                          <label>Cont. Emergencia</label>
                          <p><?php echo \$conEme2; ?></p>
                        </div>
                </div>
                <div class=\"row\">
                        <div class=\"small-12 columns\">
                         <a href=\"tel:<?php echo \$celEme2; ?>\"><strong>Celular de Emergencia</strong> <span><?php echo \$celEme2; ?></span></a>
                        </div>
                </div>
                <div class=\"row\">
                        <div class=\"small-12 columns\">
                          <a href=\"mailto:<?php echo \$corEme2; ?>\"><strong>Correo de Emergencia</strong> <span><?php echo \$corEme2; ?></span></a>
                        </div>
                </div>
                <div class=\"row\">
                        <!-- Contacto de Emergencia -->
                        <strong>Contacto de Emergencia III</strong>
                        <div class=\"small-12 columns\">
                          <label>Cont. Emergencia</label>
                          <p><?php echo \$conEme3; ?></p>
                        </div>
                </div>
                <div class=\"row\">
                        <div class=\"small-12 columns\">
                         <a href=\"tel:<?php echo \$celEme3; ?>\"><strong>Celular de Emergencia</strong> <span><?php echo \$celEme3; ?></span></a>
                        </div>
                </div>
                <div class=\"row\">
                        <div class=\"small-12 columns\">
                          <a href=\"mailto:<?php echo \$corEme3; ?>\"><strong>Correo de Emergencia</strong> <span><?php echo \$corEme3; ?></span></a>
                        </div>
                </div>
            </div>
          </div>
        </li>
        <li class=\"accordion-item\" data-accordion-item>
          <a href=\"#\" class=\"accordion-title\">Seguros y Salubridad</a>
          <div class=\"accordion-content\" data-tab-content>
            <div class=\"callout alert\">
               <div class=\"row\">
                        <!-- Seguros y Salubridad -->
                        <strong>Seguros y Salubridad</strong>
                        <div class=\"small-12 columns\">
                          <label>Seguro de Gastos Medicos</label>
                         
                          <p><?php echo \$segGasMed; ?></p>
                        </div>
                </div>
                <div class=\"row\">
                        <div class=\"small-12 columns\">
                          <label>Compañia Seguro de Gastos Medicos</label>
                         
                          <p><?php echo \$comSegGasMed; ?></p>
                        </div>
                </div>
                <div class=\"row\">
                        <div class=\"small-12 columns\">
                          <label>No. de Seguro de Vida</label>
                         
                          <p><?php echo \$numSegVid; ?></p>
                        </div>
                </div>
                <div class=\"row\">
                        <div class=\"small-12 columns\">
                          <label>Compañia de Seguro de Vida</label>
                          
                          <p><?php echo \$comSegVid; ?></p>
                        </div>
                </div>
                <div class=\"row\">
                        <div class=\"small-12 columns\">
                          <label>Numero de IMSS</label>
                         
                          <p><?php echo \$numSegSoc; ?></p>
                        </div>
                </div>
                <div class=\"row\">
                        <div class=\"small-12 columns\">
                          <label>Numero de Issste</label>
                          
                          <p><?php echo \$numIssste; ?></p>
                        </div>
                </div>
                <div class=\"row\">
                        <div class=\"small-12 columns\">
                          <label>Nombre Med. de Cabecera</label>
                         
                          <p><?php echo \$medCab; ?></p>
                        </div>
                </div>
                <div class=\"row\">
                        <div class=\"small-12 columns\">

                           <a href=\"tel:<?php echo \$celMedCab; ?>\"><strong>Celular Medico de Cabecera</strong> <span><?php echo \$celMedCab; ?></span></a>
                        </div>
                </div>

            </div>
          </div>
        </li>
        <li class=\"accordion-item\" data-accordion-item>
          <a href=\"#\" class=\"accordion-title\">Enfermedades / Padecimientos</a>
          <div class=\"accordion-content\" data-tab-content>
            <div class=\"callout primary\">
              <div class=\"row\">
                        <!-- Enfermedades / Padecimientos -->
                        <strong>Enfermedades / Padecimientos</strong>
                        <div class=\"small-12 columns\">
                          <label>Alergias</label>
                         
                          <p><?php echo \$alergias; ?></p>
                        </div>
            </div>
            <div class=\"row\">
                        <div class=\"small-12 columns\">
                          <label>Padecimientos</label>
                          
                          <p><?php echo \$padecimientos; ?></p>
                        </div>
            </div>
            <div class=\"row\">
                        <div class=\"small-12 columns\">
                          <label>Enfermedades Cornicas</label>
                          
                          <p><?php echo \$enfCro; ?></p>
                        </div>
            </div>
            <div class=\"row\">
                        <div class=\"small-12 columns\">
                          <label>Enfermedades Congenicas</label>
                          <p><?php echo \$enfCon; ?></p>
                         
                        </div>
            </div>
            <div class=\"row\">
                        <div class=\"small-12 columns\">
                          <label>Tratamientos Previos</label>
                         
                          <p><?php echo \$traPre; ?></p>
                        </div>
            </div>
            <div class=\"row\">
                        <div class=\"small-12 columns\">
                          <label>Tratamientos Actuales</label>
                          
                          <p><?php echo \$traAct; ?></p>
                        </div>
            </div>
            <div class=\"row\">
                        <div class=\"small-12 columns\">
                          <label>Estatura</label>
                          <p><?php echo \$estatura; ?></p>
                         
                        </div>
            </div>
            <div class=\"row\">
                        <div class=\"small-12 columns\">
                          <label>Peso</label>
                          <p><?php echo \$peso; ?></p>
                          
                        </div>
            </div>
            <div class=\"row\">
                        <div class=\"small-12 columns\">
                          <label>Toxicomanias</label>
                         
                          <p><?php echo \$toxicomanias; ?></p>
                        </div>
            </div>
            <div class=\"row\">
                        <div class=\"small-12 columns\">
                          <label>Observaciones</label>
                          
                           <p><?php echo \$observaciones; ?></p>
                        </div>
            </div>
            </div>
          </div>
        </li>
         <li class=\"accordion-item\" data-accordion-item>
          <a href=\"#\" class=\"accordion-title\">Indentificaciones</a>
          <div class=\"accordion-content\" data-tab-content>
            <div class=\"callout primary\">
              <div class=\"media-object\">
              <div class=\"media-object-section\">
                
                <div class=\"thumbnail\">
                <img src='<?php echo \$urlfotIfe; ?>' height='300' width='300'>
                </div>
              </div>
            </div>
            <div class=\"media-object\">
              <div class=\"media-object-section\">
                
                <div class=\"thumbnail\">
                <img src='<?php echo \$urlfotLicCon; ?>' height='300' width='300'>
                </div>
              </div>
            </div>
            </div>
          </div>
        </li>
        <li class=\"accordion-item\" data-accordion-item>
          <a href=\"#\" class=\"accordion-title\">Da de alta tus datos</a>
          <div class=\"accordion-content\" data-tab-content>
            <div class=\"callout primary\">
              <div class=\"media-object\">
              <div class=\"media-object-section\">
                
                <div class=\"thumbnail\">
                <a href=\"../Models/index.php?idPer=<?php echo \$idPer; ?>\"> Captura tus Datos</a>
                </div>
              </div>
            </div>
            
            </div>
          </div>
        </li>

      </ul>
<?php

    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    \$from = \"siempree@siempreestoyseguro.com\";
    \$to = \"$corEme1\";
    \$subject = \"Correo enviado por siempreestoyseguro.com\";
    \$message = \"Ha sido leido el QR adscrito a <?php echo \$nombre; ?> <?php echo \$apellidos; ?>\";
    \$headers = \"From:\" . \$from;
    mail(\$to,\$subject,\$message, \$headers);
    echo \"El mensaje ha sido enviado.\";
?>

</div>
    <script src=\"../js/vendor/jquery.js\"></script>
    <script src=\"../js/vendor/what-input.js\"></script>
    <script src=\"../js/vendor/foundation.js\"></script>
    <script src=\"../js/app.js\"></script>
  </body>
</html>
"
    ;
/*$fp=fopen($fichero_salida,'w+');
fwrite($fp,$archivo);
fclose($fp);
if(!file_exists($fichero_salida)) die("Error en la Generacion del Archivo");
else echo "Archivo " . $fichero_salida . " Generado.";*/
?>
<section id="menu-container-logo">
            <ul class="menu dropdown align-left small-3 medium-offset-1" data-dropdown-menu>
                <li>
                  <a href="admin.php">Regresar</a>  
                </li>
            </ul>
 </section>
<script src="js/vendor/jquery.js"></script>
<script src="js/vendor/what-input.js"></script>
<script src="js/vendor/foundation.js"></script>
</body>
</html>