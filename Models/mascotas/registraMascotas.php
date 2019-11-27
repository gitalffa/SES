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
   $idMas=$_POST['idMas'];
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
                    Bienvenido <?php echo $_SESSION["idMas"]." ".$_SESSION["nombre"];?> 
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
        <?php
        
        $pass=$_POST['idMas'];
        $nombre=$_POST['nombre'];
        $direccion=$_POST['direccion'];
        $conEme1=$_POST['conEme1'];
        $celEme1=$_POST['celEme1'];
        $corEme1=$_POST['corEme1'];
        $conEme2=$_POST['conEme2'];
        $celEme2=$_POST['celEme2'];
        $corEme2=$_POST['corEme2'];
        $conEme3=$_POST['conEme3'];
        $celEme3=$_POST['celEme3'];
        $corEme3=$_POST['corEme3'];
        $propietario=$_POST['propietario'];
        $raza=$_POST['raza'];
        $color=$_POST['color'];
        $edad=$_POST['edad'];
        $talla=$_POST['talla'];
        $medVete=$_POST['medVete'];
        $celMedVete=$_POST['celMedVete'];
        $padecimientos=$_POST['padecimientos'];
        $peso=$_POST['peso'];
        $observaciones=$_POST['observaciones'];
        
        
        $observaciones=$_POST['observaciones'];

       
       
        
       
        $updated_at=date("Y-m-d H:i:s");
        require("../../coneccion/coneccion_obj.php");
         
              
            $inserta=$mysqli->query("update mascotas set nombre='$nombre',direccion='$direccion',conEme1='$conEme1',celEme1='$celEme1',corEme1='$corEme1',conEme2='$conEme2',celEme2='$celEme2',corEme2='$corEme2',conEme3='$conEme3',celEme3='$celEme3',corEme3='$corEme3',propietario='$propietario',raza='$raza',color='$color',edad='$edad',talla='$talla',medVete='$medVete', celMedVete='$celMedVete',padecimientos='$padecimientos',peso='$peso', observaciones='$observaciones',updated_at='$updated_at' where idMas='$idMas'");
                if($inserta==true){
                   ?>
                    <section >
                        <div class="callout success small-6 column  small-offset-3 text-center">
                                SE actualizaron tus datos con exito.  
                        </div>
                    </section>
                    
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