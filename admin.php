<?php
	session_start();
	if($_SESSION["logueado"] == TRUE) {
		?>
 
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Siempre Seguro</title>
    <link rel="stylesheet" type="text/css" href="css/icons/foundation-icons.css">
    <link rel="stylesheet" href="css/foundation_flex.css">
    <link rel="stylesheet" href="css/app.css">
    <?php
           //         include 'favicon.php';
    ?>
  </head>
    <body>
        <section id="encabezado">
            <div class="row">
                <div class="column small-12">
                    <h5 align="center">Página de Administración</h5> 
                </div>
            </div>
            <div class="row">
                <div class="column small-6 small-offset-6 text-right">
                    Bienvenido <?php echo $_SESSION["nombre"]." ".$_SESSION["apellido"];?> 
                </div>
            </div>
        </section>
	         <!-- menu header -->
  	
          <section id="menu-container-logo">
            <ul class="menu dropdown align-left small-3 medium-offset-1" data-dropdown-menu>
                <li>
                  <a href="#">Admon</a>
                  <ul id="submenu-container" class="menu">
                     <li><a href="#">Idem's</a> 
                          <ul id="submenu-container" class="menu">
                              <li><a href="#">Taxistas</a>
                                  <ul id="submenu-container" class="menu">
                                      <li><a href="#">Altas</a></li>
                                      <li><a href="#">Bajas</a></li>
                                  </ul>
                              </li>
                              <li><a href="#">Taxis</a>
                                  <ul id="submenu-container" class="menu">
                                      <li><a href="#">Altas</a>
                                      <li><a href="#">bajas</a>
                                  </ul>
                              </li>
                              <li><a href="#">Mascotas</a>
                                  <ul id="submenu-container" class="menu">
                                      <li><a href="altasMascotas.php">Altas</a>
                                      <li><a href="#">bajas</a>
                                      <li><a href="listaMascotas.php">Listado de Personas</a>
                                  </ul>
                              </li>
                               <li><a href="#">Personas</a>
                                  <ul id="submenu-container" class="menu">
                                      <li><a href="altasPersonas.php">Altas</a>
                                      <li><a href="bajasPersonas.php">bajas</a>
                                      <li><a href="listaPersonas.php">Listado de Personas</a>
                                  </ul>
                              </li>
                              <li><a href="#">Vehiculos</a>
                                  <ul id="submenu-container" class="menu">
                                      <li><a href="#">Altas</a>
                                      <li><a href="#">bajas</a>
                                  </ul>
                              </li>
                          </ul>  
                      </li>

                  </ul>
                </li>
                <li>
                  <a href="#">Generacion QR</a> 
                      <ul id="submenu-container" class="menu">
                        <li><a href="#">Personas</a>
                          <ul id="submenu-container" class="menu">
                            <li><a href="generaQrIndividual.php">Individual</a></li>
                            <li><a href="#">General</a></li>
                          </ul>
                        </li>
                        <li><a href="#">Mascotas</a>
                          <ul id="submenu-container" class="menu">
                            <li><a href="generaQrIndividualMas.php">Individual</a></li>
                            <li><a href="#">General</a></li>
                          </ul>
                        </li>
                      </ul>
                </li>
                <li><a href="salir.php">Salir</a>
                           
                </li>
            </ul>
  	</section>
  	<!-- /menu header --> 
            <!-- carrusel imagenes AGM -->

            <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
              <ul class="orbit-container">
                <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
                <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
                <li class="is-active orbit-slide">
                  <img class="orbit-image" src="images/carrusel_1.jpg" alt="Space">
                  <figcaption class="orbit-caption">Taxistas Unidos de Nayarit</figcaption>
                </li>
                <li class="orbit-slide">
                  <img class="orbit-image" src="images/carrusel_2.jpg" alt="Space">
                  <figcaption class="orbit-caption">Taxistas Unidos de Nayarit</figcaption>
                </li>
                <li class="orbit-slide">
                  <img class="orbit-image" src="images/carrusel_3.jpg" alt="Space">
                  <figcaption class="orbit-caption">Taxistas Unidos de Nayarit</figcaption>
                </li>
              </ul>
              <nav class="orbit-bullets">
                <button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
                <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
                <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
              </nav>
            </div>

    <hr>
    <!-- /carrusel imagenes AGM -->
        <footer class="footer align-left small-12 medium-offset-1">
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
		header("Location: indexapp.php");
	}
 
 ?>