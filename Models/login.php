<?php

 var_dump($_POST);
	if(isset($_POST["enviar"])) {
		require("../coneccion/coneccion_obj.php");
 			
			$loginNombre = $_POST["usuario"];
			$loginPassword = $_POST["password"];
 
			$consulta = "SELECT * FROM personas WHERE idPer='$loginNombre' AND password='$loginPassword'";
 
			if($resultado = $mysqli->query($consulta)) {
				while($row = $resultado->fetch_array()) {
 
					$userok = $row["idPer"];
					$passok = $row["password"];
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
                                        $_SESSION["idPer"]=$loginNombre;
                                        if($rol==="Administrador"){
                                          $_SESSION["rol"]=TRUE;  
                                        }else{
                                          $_SESSION["rol"]=FALSE;
                                        }
                                        
                    if(isset($_POST["camFot"])){
                    	header("Location: subFotPer.php?idPer=$loginNombre");
                    }elseif(isset($_POST["camIfe"])){
                    	header("Location: subFotIfe.php?idPer=$loginNombre");
                    }elseif(isset($_POST["camLic"])){
                    	header("Location: subFotLicCon.php?idPer=$loginNombre");
                    }else{
                    	header("Location: modificaPersonas.php?idPer=$loginNombre");
                    }
                    
                                       
					
 
				}else {
					echo "aaahhh";
                                   Header("Location: index.php?error=login&idPer=$loginNombre");
				}
 
			}
 
		} else {
                 
			header("Location: index.php");
		}
 
 ?>