<?php
	include 'default/dbconnect.php';
	if(isset($_POST["a0"])){$ACTION = $_POST["a0"];}else{if(isset($_GET["a0"])){$ACTION = $_GET["a0"];}else{exit();};}
	switch($ACTION){
		case 1:	//LISTADO DE LABORATORIOS//
			echo json_encode($LABORATORIOS = read("SELECT lab.idlaboratorio,lab.nombre,lab.direccion,lab.telefono,lab.correo,lab.fkestado,estado.nombre as estado,municipio.nombre as municipio,municipio.idmunicipio,departamento.nombre as departamento,departamento.iddepartamento,lab.foto FROM laboratorio as lab join estado on estado.idestado=lab.fkestado join municipio on municipio.idmunicipio=lab.fkmunicipio join departamento on departamento.iddepartamento=municipio.fkdepartamento where lab.fkestado in(2)", $Safigdb));
			break;
			
		case 2:	//CARGAR DEPARTAMENTOS//
			echo json_encode($DEPARTAMENTOS = read("SELECT dep.iddepartamento,dep.nombre as departamento FROM departamento as dep where dep.fkestado in(2)", $Safigdb));
			break;
		
		case 3: //CARGAR MUNICIPIOS SEGUN DEPARTAMENTO SELECCIONADO//
			if(isset($_POST["ide"])){$ide = $_POST["ide"];}else{exit();}
			echo json_encode($MUNICIPIOS = read("SELECT mu.idmunicipio,mu.nombre as municipio FROM municipio as mu where mu.fkestado in(2) and mu.fkdepartamento=$ide", $Safigdb));
			break;
			
			
		case 4:	//ALMACENAR LABORATORIOS//
			if(isset($_POST["labotaorio"])){$labotaorio = $_POST["labotaorio"];}else{exit();}
			if(isset($_POST["telefono"])){$telefono = $_POST["telefono"];}else{exit();}
			if(isset($_POST["correo"])){$correo = $_POST["correo"];}else{exit();}
			if(isset($_POST["direccion"])){$direccion = $_POST["direccion"];}else{exit();}
			if(isset($_POST["Select_Municipio"])){$Select_Municipio = $_POST["Select_Municipio"];}else{exit();}
			$Estado_Laboratorio = 2;
			#INSERTAR NUEVO LABORATORIO
			$NEW_LABORATORIO = write_return("INSERT into laboratorio (nombre,direccion,telefono,correo,fkmunicipio,fkestado)values('$labotaorio','$direccion','$telefono','$correo',$Select_Municipio,$Estado_Laboratorio)", $Safigdb);
			echo $NEW_LABORATORIO;
			break;
			
		case 5: //CARGAR FOTO PARA EL LABORATORIO//
			if(isset($_POST["lasid"])){$lasid = $_POST["lasid"];}else{exit();}
			#CARGAR IMAGEN AL SERVIDOR
			$target_dir = '../img/laboratory/';
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
						$CargarImagen = write("update laboratorio set foto='$file_name' where idlaboratorio=$lasid", $Safigdb);	
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
		
		case 6: //DATOS PARA MODIFICAR  EL LABORATORIO//
			if(isset($_POST["id_laboratory"])){$id_laboratory = $_POST["id_laboratory"];}else{exit();}
			echo json_encode($DATOS_LABORATORIO = read("SELECT lab.idlaboratorio,lab.nombre,lab.direccion,lab.telefono,lab.correo,lab.fkestado,estado.nombre as estado,municipio.nombre as municipio,municipio.idmunicipio,departamento.nombre as departamento,departamento.iddepartamento,lab.foto FROM laboratorio as lab join estado on estado.idestado=lab.fkestado join municipio on municipio.idmunicipio=lab.fkmunicipio join departamento on departamento.iddepartamento=municipio.fkdepartamento where lab.fkestado in(2) and lab.idlaboratorio=$id_laboratory", $Safigdb));
			break;
		
		case 7: //ALMACENAR ,MODIFICACION DATOS FARMACIA//
			if(isset($_POST["labotaorio"])){$labotaorio = $_POST["labotaorio"];}else{exit();}
			if(isset($_POST["telefono"])){$telefono = $_POST["telefono"];}else{exit();}
			if(isset($_POST["correo"])){$correo = $_POST["correo"];}else{exit();}
			if(isset($_POST["direccion"])){$direccion = $_POST["direccion"];}else{exit();}
			if(isset($_POST["Select_Municipio"])){$Select_Municipio = $_POST["Select_Municipio"];}else{exit();}
			if(isset($_POST["id_laboratory"])){$id_laboratory = $_POST["id_laboratory"];}else{exit();}
			#UPDATE_FARMACIA
			$UPDATE_LABORATORIO = write("update laboratorio set nombre='$labotaorio',direccion='$direccion',telefono='$telefono',correo='$correo',fkmunicipio=$Select_Municipio where idlaboratorio=$id_laboratory", $Safigdb);
			break;
		
		case 8: //ELIMINAR LA  FARMACIA//
			if(isset($_POST["id_laboratory"])){$id_laboratory = $_POST["id_laboratory"];}else{exit();}
			$Estado_Laboraroio = 4;
			$UPDATE_LABORATORY = write("update laboratorio set fkestado=$Estado_Laboraroio where idlaboratorio=$id_laboratory", $Safigdb);
			break;
		
				
	}
?>