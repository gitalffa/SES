<?php

//Agregamos la libreria para genera códigos QR
	require "phpqrcode/qrlib.php";   
  ini_set( 'display_errors', 0 );
  error_reporting( E_ALL ); 
	
	//Declaramos una carpeta temporal para guardar la imagenes generadas
	$dir = 'temp/';
	require_once('coneccion/coneccion_obj.php');
	$idMas=$_GET['idMas'];
	$resultadoTrabajador=$mysqli->query("select * from mascotas where idMas='$idMas'");
  //var_dump($resultadoTrabajador);
                        if(!$resultadoTrabajador){
                          printf("Errormessage: $\n",$mysqli->error);
                        }else{
                        while($renglon=$resultadoTrabajador->fetch_assoc()){
                         $nombre=$renglon['nombre'];
                         
                         $fecNac=$renglon['fecNac'];
                         $urlFot=$renglon['foto'];
                         
                         
                         $conEme1=$renglon['conEme1'];
                         $corEme1=$renglon['corEme1'];
                         $celEme1=$renglon['celEme1'];
                         $conEme2=$renglon['conEme2'];
                         $corEme2=$renglon['corEme2'];
                         $celEme2=$renglon['celEme2'];
                         $conEme3=$renglon['conEme3'];
                         $corEme3=$renglon['corEme3'];
                         $celEme3=$renglon['celEme3'];
                         

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
	$contenido = "http://www.siempreestoyseguro.com/views/$idMas".".html"; //Texto
	
	
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
echo "nombre: ".$nombre;
	echo "<br>";
	echo "Id: ".$idMas;
	echo "<br>";
  echo $urlFot;
        //Enviamos los parametros a la Función para generar código QR 
	QRcode::png($contenido, $filename, $level, $tamaño, $framSize); 
echo '<img src="'.$dir.basename($filename).'" /><hr/>'; 
$fichero_salida_html="views/".$idMas.".html";
$archivo_html="<!doctype html>
<html class=\"no-js\" lang=\"en\" dir=\"ltr\">
  <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"x-ua-compatible\" content=\"ie=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1;creSesPassMas.php?idMas=".$idMas."\">
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

$fichero_salida="views/".$idMas.".php";
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
          \$resultadoTrabajador=\$mysqli->query(\"select * from mascotas where idMas='\$idMas'\");
           if(!\$resultadoTrabajador){
                            printf(\"Errormessage: $\\n\",\$mysqli->error);
                          }else{
                          while(\$renglon=\$resultadoTrabajador->fetch_assoc()){
                          \$nombre=\$renglon['nombre'];
                           
                           
                           \$urlFot=\$renglon['foto'];
                           \$direccion=\$renglon['direccion'];
                             
                             \$conEme1=\$renglon['conEme1'];
                             \$corEme1=\$renglon['corEme1'];
                             \$celEme1=\$renglon['celEme1'];
                             \$conEme2=\$renglon['conEme2'];
                             \$corEme2=\$renglon['corEme2'];
                             \$celEme2=\$renglon['celEme2'];
                             \$conEme3=\$renglon['conEme3'];
                             \$corEme3=\$renglon['corEme3'];
                             \$celEme3=\$renglon['celEme3'];
                             
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
          <a href=\"#\" class=\"accordion-title\">Datos Mascota</a>
          <div class=\"accordion-content\" data-tab-content>
            <div class=\"callout primary\"><div class=\"callout primary\">
              <div class=\"row\">
                            <!-- datos Mascota -->
                            <strong>Datos Mascota</strong>
                            <div class=\"small-12 columns\">
                              <label>Nombre</label>
                              <p><?php echo \$nombre; ?></p>
                            </div>
                    </div>
                    
                    <div class=\"row\">
                            <div class=\"small-12 columns\">
                              <label>Dirección</label>
                             
                              <p><?php echo \$direccion; ?></p>
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
          <a href=\"#\" class=\"accordion-title\">Da de alta tus datos</a>
          <div class=\"accordion-content\" data-tab-content>
            <div class=\"callout primary\">
              <div class=\"media-object\">
              <div class=\"media-object-section\">
                
                <div class=\"thumbnail\">
                <a href=\"../Models/indexMas.php?idMas=<?php echo \$idMas; ?>\"> Captura tus Datos</a>
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