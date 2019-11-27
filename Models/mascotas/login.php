<?php

 var_dump($_POST);
	if(isset($_POST["enviar"])) {
		require("../../coneccion/coneccion_obj.php");
 			
			$loginNombre = $_POST["usuario"];
			$loginPassword = $_POST["password"];
 
			$consulta = "SELECT * FROM mascotas WHERE idMas='$loginNombre' AND password='$loginPassword'";
 
			if($resultado = $mysqli->query($consulta)) {
				while($row = $resultado->fetch_array()) {
 
					$userok = $row["idMas"];
					$passok = $row["password"];
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
                                        
                                        $_SESSION["idMas"]=$loginNombre;
                                        if($rol==="Administrador"){
                                          $_SESSION["rol"]=TRUE;  
                                        }else{
                                          $_SESSION["rol"]=FALSE;
                                        }
                                        
                    if(isset($_POST["camFot"])){
                    	header("Location: subFotMas.php?idMas=$loginNombre");
                    }else{
                    	header("Location: modificaMascota.php?idMas=$loginNombre");
                    }
                    
                                       
					
 
				}else {
					echo "aaahhh";
                                   Header("Location: index.php?error=login&idMas=$loginNombre");
				}
 
			}
 
		} else {
                 
			header("Location: index.php");
		}
 
 ?>