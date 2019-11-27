<?php
 
	session_start();
	if($_SESSION["logueado"] == TRUE) {
            if($_SESSION["rol"]){
                $verdadero=TRUE;
            }else{
            $verdadero=FALSE;
            }

            //Conectamos a la base de datos
            require('coneccion/coneccion_obj.php');

            //Evitamos que salgan errores por variables vacías
            error_reporting(E_ALL ^ E_NOTICE);
            //Cantidad de resultados por página (debe ser INT, no string/varchar)
            $cantidad_resultados_por_pagina = 10;
            
            //Comprueba si está seteado el GET de HTTP
                    if (isset($_GET["pagina"])) {

                            //Si el GET de HTTP S�? es una string / cadena, procede
                            if (is_string($_GET["pagina"])) {

                                    //Si la string es numérica, define la variable 'pagina'
                                     if (is_numeric($_GET["pagina"])) {

                                             //Si la petición desde la paginación es la página uno
                                             //en lugar de ir a 'index.php?pagina=1' se iría directamente a 'index.php'
                                             if ($_GET["pagina"] == 1) {
                                                     header("Location: listaPersonas.php");
                                                     die();
                                             } else { //Si la petición desde la paginación no es para ir a la pagina 1, va a la que sea
                                                     $pagina = $_GET["pagina"];
                                            };

                                     } else { //Si la string no es numérica, redirige al index (por ejemplo: index.php?pagina=AAA)
                                             header("Location: listaPersonas.php");
                                            die();
                                     };
                            };

                    } else { //Si el GET de HTTP no está seteado, lleva a la primera página (puede ser cambiado al index.php o lo que sea)
                            $pagina = 1;
                    };

                    //Define el número 0 para empezar a paginar multiplicado por la cantidad de resultados por página
                    $empezar_desde = ($pagina-1) * $cantidad_resultados_por_pagina;
?>  
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Personas</title>
    <link rel="stylesheet" type="text/css" href="css/icons/foundation-icons.css">
    <link rel="stylesheet" href="css/foundation_flex.css">
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
                    Listado Personas
                </div>
                <div class="column small-6">
                    Bienvenido <?php echo $_SESSION["nombre"]." ".$_SESSION["apellido"];?> 
                </div>
            </div>
        </section>
	         <!-- menu header -->
        <section id="menu-container-logo">
            <ul class="menu dropdown align-left small-3 medium-offset-1" data-dropdown-menu>
               
                <li>
                  <a href="admin.php">Regresar</a>  
                </li>
            </ul>
  	</section>
  	<!-- /menu header --> 
        <!-- panza -->
        <section id="cuerpoPrincipal">
            <section>
                <div class="row">
                    <div class="column">
                        <strong>ID Persona</strong> 
                    </div>
                    <div class="column">
                        <strong>Nombre</strong> 
                    </div>
                    <div class="column">
                        <strong>Contacto de Emergencia</strong>
                    </div>
                    <div class="column">
                        <strong>Celular de Emergencia</strong>
                    </div>
                    
                </div>
          <?php
                    //Obtiene TODO de la tabla
                    $obtener_todo_BD = "SELECT * FROM personas order by id";

                    //Realiza la consulta
                    $consulta_todo = mysqli_query($mysqli, $obtener_todo_BD);

                    //Cuenta el número total de registros
                    $total_registros = mysqli_num_rows($consulta_todo);

                    //Obtiene el total de páginas existentes
                    $total_paginas = ceil($total_registros / $cantidad_resultados_por_pagina); 

                    //Realiza la consulta en el orden de ID ascendente 
                    //Limitada por la cantidad de cantidad por página
                    $consulta_resultados = mysqli_query($mysqli, "
                    SELECT * FROM personas order by id LIMIT $empezar_desde, $cantidad_resultados_por_pagina");

                    //Crea un bluce 'while' y define a la variable 'datos' ($datos) como clave del array
                    //que mostrará los resultados por nombre
                    while($datos = mysqli_fetch_array($consulta_resultados)) {
                    ?>

            
                
                
                <div class="row">
                    <div class="column">
                        <strong><?php echo $datos['idPer']; ?></strong> 
                    </div>
                    
                    <div class="column">
                        <?php echo $datos['nombre']." ".$datos['apellidos'];?> 
                    </div>
                    <div class="column">
                        <?php echo $datos['conEme1'];?> 
                    </div>
                     <div class="column">
                        <?php echo $datos['celEme1'];?> 
                    </div>
                </div>
               
            </section>
                    
                   
        <?php
                    };
        ?>
            
            <hr><!--------------------------------------------- -->
            <section>
                <div class="row">
                    <div class="column small-3 small-offset-5">
                        
                    
            | <?php
            //Crea un bucle donde $i es igual 1, y hasta que $i sea menor o igual a X, a sumar (1, 2, 3, etc.)
            //Nota: X = $total_paginas
            for ($i=1; $i<=$total_paginas; $i++) {
                    //En el bucle, muestra la paginación
                    echo "<a href='?pagina=".$i."'>".$i."</a> | ";
            }; ?>
                    </div>
                </div>
            </section>
        </section>
        <!-- fin panza -->
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