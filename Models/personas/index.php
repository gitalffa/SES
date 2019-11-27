<?php
$idPer=$_GET["idPer"];



if(isset($_GET["error"]) && $_GET["error"] != "login") {
    header("Location: index.php");
  }
 
 ?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../../css/icons/foundation-icons.css">
    <link rel="stylesheet" href="../../css/foundation_flex.css">
    <link rel="stylesheet" href="../../css/app.css">

  </head>
<body>
 
  <div class="login">
    <h5 align="center">Siempre Estoy Seguro</h5>
    <h5 align="center">Sistema de Codificacion <strong>QR</strong></h5>
    <?php
 
      if(isset($_GET["error"])) {
                            ?>
                            <section id="login" class="callout alert" align="center">
                                Usuario y / o Contraseña erroneos.<br> Intentelo de nuevo.
                            </section>
                           <?php    
      }
 
     ?>
  <div class="column medium-offset-4 medium-4" >     
  <section id="login" class="callout secundary">
   
    <form action="login.php" method="POST" enctype="multipart/form-data" data-abide novalidate>
      <?php
      if(isset($_GET["camFot"])){
          $camFot=$_GET["camFot"];
          ?>
           <input type="hidden" name="camFot">
          <?php
        }
        if(isset($_GET["camIfe"])){
          $camFot=$_GET["camIfe"];
          ?>
           <input type="hidden" name="camIfe">
          <?php
        }
        if(isset($_GET["camLic"])){
          $camLic=$_GET["camLic"];
          ?>
           <input type="hidden" name="camLic">
          <?php
        }
      ?>
     
      <div data-abide-error class="alert callout" style="display: none;">
         <p><i class="fi-alert"></i> Existen algunos errores en tu formulario, por favor llena los campos que faltan.</p>
      </div>

      <div>
        <label>Usuario
          <input type="hidden" name="usuario" value="<?php echo $idPer; ?>">
          <input type="text"  name="usuario" value="<?php echo $idPer; ?>" placeholder="Usuario" size="8" disabled="TRUE"  pattern="text">
        
        <span class="form-error">
                            Por favor teclea tu usuario.
        </span>
        </label>
                        <p class="help-text" id="helpNombre">Usuario</p>
      </div>
      
        <input type="password" class="form-control" name="password" placeholder="Password" size="8">
        <span class="form-error">
                            Por favor teclea tu pass.
        </span>
        </label>
                        <p class="help-text" id="helpNombre">Password Personal</p>
      <button type="submit" name="enviar">Entrar</button>
    </form>
  
  </section>
</div>
  </div>
 
    <footer class="footer align-left small-5 medium-offset-1">
          <h6>Contacto</h6>
          <a href="tel:+013111916868"><strong>Telefono</strong> <span>3111916868</span></a>
          <a href="mailto:westrup@gmail.com"><strong>E-mail</strong> <span>westrup@gmail.com</span></a>
    </footer>
    <!-- /contacto -->
    <script src="../../js/vendor/jquery.js"></script>
        <script src="../../js/vendor/what-input.js"></script>
        <script src="../../js/vendor/foundation.js"></script>
        <script src=".//../js/app.js"></script>
  </body>
</html>