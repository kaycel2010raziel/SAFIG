<?php
	include 'default/dbconnect.php';
	if(isset($_POST["a0"])){$ACTION = $_POST["a0"];}else{if(isset($_GET["a0"])){$ACTION = $_GET["a0"];}else{exit();};}
	switch($ACTION){
		case 1:	//LISTADO DE USUARIOS//
			echo json_encode($USUARIOS = read("SELECT US.idusuario,concat(US.nombre,' ',US.apellido) as nombre,US.usuario,US.dpi,US.nit,US.genero,US.foto,US.fecha_nacimiento,rol.nombre as rol, estado.nombre as estado,US.fkestado FROM usuario as US join rol on rol.idrol=US.fkrol join estado on estado.idestado=US.fkestado WHERE US.fkestado IN(2,3)", $Safigdb));
			break;
			
		case 2:	//LISTADO DE ROLES//
			echo json_encode($ROLES = read("SELECT idrol,nombre as rol FROM rol WHERE fkestado in(2);", $Safigdb));
			break;
			
		case 3:	//ALMACENAR USUARIO//
			if(isset($_POST["nombre"])){$nombre = $_POST["nombre"];}else{exit();}
			if(isset($_POST["apellido"])){$apellido = $_POST["apellido"];}else{exit();}
			if(isset($_POST["nit"])){$nit = $_POST["nit"];}else{exit();}
			if(isset($_POST["nacimiento"])){$nacimiento = $_POST["nacimiento"];}else{exit();}
			if(isset($_POST["dpi"])){$dpi = $_POST["dpi"];}else{exit();}
			if(isset($_POST["usuario"])){$usuario = $_POST["usuario"];}else{exit();}
			if(isset($_POST["Select_Rol"])){$Select_Rol = $_POST["Select_Rol"];}else{exit();}
			if(isset($_POST["CodeSha"])){$CodeSha = $_POST["CodeSha"];}else{exit();}
			
			$pass = password_hash($CodeSha, PASSWORD_BCRYPT);
			$Estado_Usuario = 2;
			#INSERTAR USUARIO
			$NEW_USER = write_return("INSERT INTO usuario(nombre,apellido,usuario,password,dpi,nit,fecha_nacimiento,fkrol,fkestado)values('$nombre','$apellido','$usuario','$pass','$dpi','$nit','$nacimiento',$Select_Rol,$Estado_Usuario)", $Safigdb);
			$FIRST_LOGIN = write("UPDATE usuario set password_change=1 where idusuario=$NEW_USER", $Safigdb);
			echo $NEW_USER;
			break;
			
		case 4: //CARGAR FOTO PARA EL USUARIO//
			if(isset($_POST["lasid"])){$lasid = $_POST["lasid"];}else{exit();}
			#CARGAR IMAGEN AL SERVIDOR
			$target_dir = '../img/user/';
			foreach ($_FILES as $file) {
				$errors= array();
				$file_name = basename($file["name"]);
				$target_file = $target_dir;
				$uploadOk = 1;
				$fileType = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
				$expensions= array("jpeg","jpg","png");
				// Check if file already exists
				if (file_exists($target_file)) {
					$uploadOk = 1;
					$target_file = $target_file. $file_name;
				}
				if (!file_exists($target_dir)) {
					mkdir($target_file, 0777, true);
					$uploadOk = 1;
					$target_file = $target_dir. $file_name;
				}
				if ($file["size"] > 10485760) {
					$uploadOk = 3;
					$errors[]='File size must be excately 2 MB';
					
				}
				if(!in_array($fileType, $expensions)) {
					$uploadOk = 4;
					$errors[]="extension not allowed, please choose a JPEG or PNG file.";
					
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk != 1) {
					$upload_status = $uploadOk;
					// if everything is ok, try to upload file
				} else {
					
					if (move_uploaded_file($file["tmp_name"], $target_file)) {
						//$Path_Data = substr($target_file,13);
						$CargarImagen = write("update usuario set foto='$file_name' where idusuario=$lasid", $Safigdb);	
						$upload_status = 1;
					} else {
						echo "Error del Sistema. Comunicarse con DTI.";
						$upload_status = 0;
						$errors[]='Imagen Cargada';
					}
				}
			}
			print_r($errors);
			break;
		
		case 5: //DATOS PARA MODIFICAR AL USUARIO//
			if(isset($_POST["id_usuario"])){$id_usuario = $_POST["id_usuario"];}else{exit();}
			echo json_encode($DATOS_USUARIO = read("SELECT US.idusuario,US.nombre,US.apellido,US.usuario,US.dpi,US.nit,US.genero,US.foto,US.fecha_nacimiento,rol.nombre as rol,rol.idrol,estado.nombre as estado,US.fkestado FROM usuario as US join rol on rol.idrol=US.fkrol join estado on estado.idestado=US.fkestado WHERE US.idusuario=$id_usuario", $Safigdb));
			break;
		
		case 6: //ALMACENAR ,MODIFICACION DATOS USUARIOS//
			if(isset($_POST["id_usuario"])){$id_usuario = $_POST["id_usuario"];}else{exit();}
			if(isset($_POST["nombre"])){$nombre = $_POST["nombre"];}else{exit();}
			if(isset($_POST["apellido"])){$apellido = $_POST["apellido"];}else{exit();}
			if(isset($_POST["nit"])){$nit = $_POST["nit"];}else{exit();}
			if(isset($_POST["nacimiento"])){$nacimiento = $_POST["nacimiento"];}else{exit();}
			if(isset($_POST["dpi"])){$dpi = $_POST["dpi"];}else{exit();}
			if(isset($_POST["usuario"])){$usuario = $_POST["usuario"];}else{exit();}
			if(isset($_POST["Select_Rol"])){$Select_Rol = $_POST["Select_Rol"];}else{exit();}
			
			#UPDATE DATOS USUARIOS
			$DATOS_USUARIO = write("update usuario set nombre='$nombre',apellido='$apellido',usuario='$usuario',dpi='$dpi',nit='$nit',fecha_nacimiento='$nacimiento',fkrol=$Select_Rol where idusuario=$id_usuario", $Safigdb);
			break;
			
		case 7: //MODIFICAR CONTRASENA//
			if(isset($_POST["id_usuario"])){$id_usuario = $_POST["id_usuario"];}else{exit();}
			if(isset($_POST["CodeSha"])){$CodeSha = $_POST["CodeSha"];}else{exit();}
			//$final_password = hash('sha512', $CodeSha);
			$pass = password_hash($CodeSha, PASSWORD_BCRYPT);
			$Estado = 1;
			$UPDATE_USUARIO = write("update usuario as us set us.password='$pass',us.password_change=1 where us.idusuario=$id_usuario", $Safigdb);
			break;
		
		case 8: //DESHABILITAR USUARIO//
			if(isset($_POST["id_usuario"])){$id_usuario = $_POST["id_usuario"];}else{exit();}
			$Estado_Usuario = 3;
			$UPDATE_USUARIO = write("update usuario set fkestado=$Estado_Usuario where idusuario=$id_usuario", $Safigdb);
			break;
		
		case 9: //ELIMINAR USUARIO//
			if(isset($_POST["id_usuario"])){$id_usuario = $_POST["id_usuario"];}else{exit();}
			$Estado_Usuario = 4;
			$UPDATE_USUARIO = write("update usuario set fkestado=$Estado_Usuario where idusuario=$id_usuario", $Safigdb);
			break;
			
		case 10: //ACTIVAR USUARIO//
			if(isset($_POST["id_usuario"])){$id_usuario = $_POST["id_usuario"];}else{exit();}
			$Estado_Usuario = 2;
			$UPDATE_USUARIO = write("update usuario set fkestado=$Estado_Usuario where idusuario=$id_usuario", $Safigdb);
			break;
			
		
				
	}
?>