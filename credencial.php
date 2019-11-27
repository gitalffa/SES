<?php
require_once('coneccion/coneccion_obj.php');

  $resultadoTrabajador=$mysqli->query("select * from personas where idPer='p1001'");
                        if(!$resultadoTrabajador){
                          printf("Errormessage: $\n",$mysqli->error);
                        }else{
                        while($renglon=$resultadoTrabajador->fetch_assoc()){
                         $nombre=$renglon['nombre'];
                         $apellidos=$renglon['apellidos'];
                         echo $urlFot=$renglon['foto'];
                     }
                        }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Taxista</title>
    <link rel="stylesheet" type="text/css" href="css/icons/foundation-icons.css">
    <link rel="stylesheet" href="css/foundation_flex.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
<body>
<h1>Registro Único de Taxista Unidos</h1>
<div class="column small-12 medium-9">
<div class="media-object">
  <div class="media-object-section">
    <div class="thumbnail">
      <img src="<?php echo $urlFot; ?>" height="150" width="150">
    </div>
  </div>
  
</div>
</div>
<div class="media-object-section">
    <h4>Taxista Unidos de Nayarit.</h4>
    <lu>
      <li>id del Trabajador : <strong><?php echo $trabajadores[0]->getId(); ?></strong>
    	<li>Nombre del Trabajado : <strong><?php echo $trabajadores[0]->nombre; ?></strong> </li>
    	<li>Numero de Vehiculo : <strong><?php echo $trabajadores[0]->numVehiculo; ?></strong></li>
    	<li>Placas Vehiculo : <strong><?php echo $trabajadores[0]->placasVehiculo; ?></strong></li>
    	<li>Horario : <strong><?php echo $trabajadores[0]->horaInicio; ?> a <?php echo $trabajadores[0]->horaFin; ?></strong></li>

    </lu>
  </div>
<script src="js/vendor/jquery.js"></script>
<script src="js/vendor/what-input.js"></script>
<script src="js/vendor/foundation.js"></script>
</body>
</html>