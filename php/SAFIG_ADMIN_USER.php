<?php
	include 'default/dbconnect.php';
	if(isset($_POST["a0"])){$ACTION = $_POST["a0"];}else{if(isset($_GET["a0"])){$ACTION = $_GET["a0"];}else{exit();};}
	switch($ACTION){
		case 1:	//LISTADO DE USUARIOS//
			echo json_encode($USUARIOS = read("SELECT US.idusuario,concat(US.nombre,' ',US.apellido) as nombre,US.usuario,US.dpi,US.nit,US.genero,US.foto,US.fecha_nacimiento,rol.nombre as rol, estado.nombre as estado,US.fkestado FROM usuario as US join rol on rol.idrol=US.fkrol join estado on estado.idestado=US.fkestado WHERE US.fkestado IN(1,2)", $Safigdb));
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
			if(isset($_POST["file_upload"])){$file_upload = $_POST["file_upload"];}else{exit();}
			if(isset($_POST["Select_Rol"])){$Select_Rol = $_POST["Select_Rol"];}else{exit();}
			if(isset($_POST["CodeSha"])){$CodeSha = $_POST["CodeSha"];}else{exit();}
			
			$Estado_Usuario = 2;
			#INSERTAR USUARIO
			$NEW_USER = write("INSERT INTO usuario (nombre,apellido,usuario,password,dpi,nit,fecha_nacimiento,fkrol,fkestado)values('$nombre','$apellido','$usuario','$CodeSha','$dpi','$nit','$nacimiento',$Select_Rol,$Estado_Usuario)", $Safigdb);
			#CARGAR IMAGEN AL SERVIDOR
			/*
			$allowed_extensions = array(
					'jpg',
					'jpeg',
					'png',
					'bmp',
				);
				$target_dir = '/var/www/html/uploads/archivo/licencias/'.$username.'/';
				foreach ($_FILES as $file) {
					$token = bin2hex(openssl_random_pseudo_bytes(32));
					$file_name = basename($file["name"]);
					$target_file = $target_dir;
					$uploadOk = 1;
					$fileType = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
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
					}
					if(!in_array($fileType, $allowed_extensions)) {
						$uploadOk = 4;
					}
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk != 1) {
						$upload_status = $uploadOk;
						// if everything is ok, try to upload file
					} else {
						
						if (move_uploaded_file($file["tmp_name"], $target_file)) {
							$Path_Data = substr($target_file,13);
							
							$CargarImagen = write("UPDATE DAIS_ARMA_REGISTRO_EMPLEADO SET FOTO_LICENCIA='$Path_Data' WHERE IDDAIS_ARMA_REGISTRO_EMPLEADO=$IDREGISTRO", $siedb);			
							$upload_status = 1;
						} else {
							echo "Error del Sistema. Comunicarse con DTI.";
							$upload_status = 0;
						}
						
					}
				}
				*/
			
			break;
			
	}
?>