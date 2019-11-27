<?php
 
	if(isset($_POST["enviar"])) {
		require("coneccion/coneccion_obj.php");
 
			$loginNombre = $_POST["usuario"];
			$loginPassword = $_POST["password"];
 
			$consulta = "SELECT * FROM usuarios WHERE usuario='$loginNombre' AND pass='$loginPassword'";
 
			if($resultado = $mysqli->query($consulta)) {
				while($row = $resultado->fetch_array()) {
 
					$userok = $row["usuario"];
					$passok = $row["pass"];
                                        $nombre = $row["nombre"];
                                        $apellido = $row["apellido"];
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
                                        
                                       
					header("Location: admin.php");
 
				}else {
                                   Header("Location: indexapp.php?error=login");
				}
 
			}
 
		} else {
                 
			header("Location: indexapp.php");
		}
 
 ?>