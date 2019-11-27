<?php
 
	if(isset($_POST["enviar"])) {
		require("../coneccion/coneccion_obj.php");
 
			 $loginNombre = $_POST["usuario"];
			 $loginPassword = $_POST["password"];
 
			$consulta = "SELECT * FROM personas WHERE idper='$loginNombre' AND passcred='$loginPassword'";
 
			if($resultado = $mysqli->query($consulta)) {
				while($row = $resultado->fetch_array()) {
 
					$userok = $row["idPer"];
					$passok = $row["passcred"];
                                        $nombre = $row["nombre"];
                                        $apellido = $row["apellidos"];
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
                                        $_SESSION["apellido"]=$apellido;
                                        if($rol==="Administrador"){
                                          $_SESSION["rol"]=TRUE;  
                                        }else{
                                          $_SESSION["rol"]=FALSE;
                                        }
                                    
                    //$idPer=rtrim($idPer);                   
					header("Location:creSes.php?idPer=$loginNombre");
 
				}else {
					
                                   Header("Location: creSesPass.php?error=login&idPer=$loginNombre");
				}
 
			}
 
		} else {
                 
			header("Location: creSesPass.php?idPer=P1001");
		}
 
 ?>