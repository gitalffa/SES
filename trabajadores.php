<?php
require_once ('Models/Trabajador.php');
require_once ('coneccion/coneccion_obj.php');

$idTrabajador=$_GET['idTrabajador'];

if(!$resulIdTrabajadores = $mysqli->query("select * from trabajadores where id = '$idTrabajador' ")){
                echo "Falló la seleccion: (" . $mysqli->errno . ") " . $mysqli->error;                         
            }else{
                $row=mysqli_fetch_array($resulIdTrabajadores);
               	$trabajador = new Trabajador();
               	$trabajador-> setId($row[0]);
				$trabajador-> nombre=$row[1];
				$trabajador-> urlFoto=$row[3];
				$trabajador-> numVehiculo=$row[4];
				$trabajador-> placasVehiculo=$row[5];
				$trabajador-> horaInicio=$row[6];
				
            }


$trabajadores=[
	$trabajador
];