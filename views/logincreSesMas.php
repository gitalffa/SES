<?php
 
	if(isset($_POST["enviar"])) {
		require("../coneccion/coneccion_obj.php");
 
			 $loginNombre = $_POST["usuario"];
			 $loginPassword = $_POST["password"];
 
			$consulta = "SELECT * FROM mascotas WHERE idMas='$loginNombre' AND passcollar='$loginPassword'";
 
			if($resultado = $mysqli->query($consulta)) {
				while($row = $resultado->fetch_array()) {
 
					$userok = $row["idMas"];
					$passok = $row["passcollar"];
                                        $nombre = $row["nombre"];
                                        
                                        $rol=$row["rol"];
				}
				$resultado->close();
			}
			$mysqli->close();
 
 
			if(isset($loginNombre) && isset($loginPassword)) {
                               
				if($loginNombre == $userok && $loginPassword == $passok) {
 
					session_start();
					$_SESSION["logueado"] = TRUE;
                                        $_SESSION["nombre"]=$nombre;
                                        
                                        if($rol==="Administrador"){
                                          $_SESSION["rol"]=TRUE;  
                                        }else{
                                          $_SESSION["rol"]=FALSE;
                                        }
                                    
                    //$idPer=rtrim($idPer);                   
					header("Location:creSesMas.php?idMas=$loginNombre");
 
				}else {
					
                                   Header("Location: creSesPassMas.php?error=login&idMas=$loginNombre");
				}
 
			}
 
		} else {
                 
			header("Location: mi404.php");
		}
 
 ?>