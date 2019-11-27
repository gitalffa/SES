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
    require_once('../../coneccion/coneccion_obj.php');
    $idPer=$_POST['idPer'];
    $idPer=substr($idPer,0,5);
		?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sube Foto Personal</title>
    <link rel="stylesheet" type="text/css" href="../../css/icons/foundation-icons.css">
    <link rel="stylesheet" href="../../css/foundation_flex.css">
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
        <?php
        $idPer;
        $MAX_FILE_SIZE=$_POST['MAX_FILE_SIZE'];
        $tipArcFoto=$_FILES['foto']['type'];
        $tamArcFoto=$_FILES['foto']['size'];
       
        if($tamArcFoto == 0){
          $foto=NULL;
                      ?>

                       <div class="callout alert">
                              <div class="row">
                              
                                    <div class="small-6 columns">
                                     <p> El tamaño del archivo es mas grande que el permitido.
                                    </div>
                              </div>
                        </div>
                      <?php
                    }else{
                      if(strpos($tipArcFoto,"jpeg")){
                        $foto="../../images/personas/".$idPer."foto".".jpeg";
                        if (move_uploaded_file($_FILES['foto']['tmp_name'], $foto)){
                          
                          ?>
                          <div class="callout primary">
                                <div class="row">
                                
                                      <div class="small-6 columns">
                                       <p> El archivo de la foto ha sido cargada correctamente.</p>
                                      </div>
                                      <?php 
                                       require("../../coneccion/coneccion_obj.php");
                                       $updated_at=date("Y-m-d H:i:s");
                                        $inserta=$mysqli->query("update personas set foto='$foto',updated_at='$updated_at' where idPer='$idPer' ");
                                        if($inserta==true){
                                          ?>
                                            
                                                <div class="callout success small-6 column  small-offset-3 text-center">
                                                       <p> Este registro se modifico el <strong><?php  echo $updated_at; ?></strong> </p>
                                                </div>
                                           
                                            
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
                                      ?>
                                </div>
                          </div>
                          <?php
                        }else{
                          ?>
                          <div class="callout alert">
                                <div class="row">
                                
                                      <div class="small-6 columns">
                                       <p> hubo un error en la carga del archivo.</p>
                                      </div>
                                </div>
                          </div>
                          <?php
                        }
                      }else{
                        ?>

                       <div class="callout alert">
                              <div class="row">
                              
                                    <div class="small-6 columns">
                                     <p> La extension del archivo no es la correcta.</p>
                                    </div>
                              </div>
                        </div>
                      <?php
                      }
                      

                    }


        ?>

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