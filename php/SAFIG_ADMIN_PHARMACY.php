<?php
	include 'default/dbconnect.php';
	if(isset($_POST["a0"])){$ACTION = $_POST["a0"];}else{if(isset($_GET["a0"])){$ACTION = $_GET["a0"];}else{exit();};}
	switch($ACTION){
		case 1:	//LISTADO DE FARMACIAS//
			echo json_encode($FARMACIAS = read("SELECT fa.idfarmacia,fa.foto,fa.nombre,fa.direccion,fa.fkmunicipio,fa.fkestado,estado.nombre as estado, municipio.nombre as municipio,departamento.nombre as departamento FROM farmacia as fa join estado on estado.idestado=fa.fkestado join municipio on municipio.idmunicipio=fa.fkmunicipio join departamento on departamento.iddepartamento=municipio.fkdepartamento where fa.fkestado in(2)", $Safigdb));
			break;
			
		case 2:	//CARGAR DEPARTAMENTOS//
			echo json_encode($DEPARTAMENTOS = read("SELECT dep.iddepartamento,dep.nombre as departamento FROM departamento as dep where dep.fkestado in(2)", $Safigdb));
			break;
		
		case 3: //CARGAR MUNICIPIOS SEGUN DEPARTAMENTO SELECCIONADO//
			if(isset($_POST["ide"])){$ide = $_POST["ide"];}else{exit();}
			echo json_encode($MUNICIPIOS = read("SELECT mu.idmunicipio,mu.nombre as municipio FROM municipio as mu where mu.fkestado in(2) and mu.fkdepartamento=$ide", $Safigdb));
			break;
			
			
		case 4:	//ALMACENAR FARMACIA//
			if(isset($_POST["farmacia"])){$farmacia = $_POST["farmacia"];}else{exit();}
			if(isset($_POST["Select_Municipio"])){$Select_Municipio = $_POST["Select_Municipio"];}else{exit();}
			if(isset($_POST["direccion"])){$direccion = $_POST["direccion"];}else{exit();}
			
			$Estado_Farmacia = 2;
			#INSERTAR NUEVA FARMACIA
			$NEW_PHARMACY = write_return("INSERT into farmacia(nombre,direccion,fkmunicipio,fkestado)VALUES('$farmacia','$direccion',$Select_Municipio,$Estado_Farmacia)", $Safigdb);
			echo $NEW_PHARMACY;
			break;
			
		case 5: //CARGAR FOTO PARA EL USUARIO//
			if(isset($_POST["lasid"])){$lasid = $_POST["lasid"];}else{exit();}
			#CARGAR IMAGEN AL SERVIDOR
			$target_dir = '../img/pharmacy/';
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
						$CargarImagen = write("update farmacia set foto='$file_name' where idfarmacia=$lasid", $Safigdb);	
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
		
		case 6: //DATOS PARA MODIFICAR LA FARMACIA//
			if(isset($_POST["id_pharmacy"])){$id_pharmacy = $_POST["id_pharmacy"];}else{exit();}
			echo json_encode($DATOS_FARMACIA = read("SELECT fa.idfarmacia,fa.foto,fa.nombre,fa.direccion,fa.fkmunicipio,fa.fkestado,estado.nombre as estado, municipio.nombre as municipio,departamento.nombre as departamento,departamento.iddepartamento FROM farmacia as fa join estado on estado.idestado=fa.fkestado join municipio on municipio.idmunicipio=fa.fkmunicipio join departamento on departamento.iddepartamento=municipio.fkdepartamento where fa.fkestado in(2) and fa.idfarmacia=$id_pharmacy;", $Safigdb));
			break;
		
		case 7: //ALMACENAR ,MODIFICACION DATOS FARMACIA//
			if(isset($_POST["farmacia"])){$farmacia = $_POST["farmacia"];}else{exit();}
			if(isset($_POST["Select_Municipio"])){$Select_Municipio = $_POST["Select_Municipio"];}else{exit();}
			if(isset($_POST["direccion"])){$direccion = $_POST["direccion"];}else{exit();}
			if(isset($_POST["id_pharmacy"])){$id_pharmacy = $_POST["id_pharmacy"];}else{exit();}
			#UPDATE_FARMACIA
			$UPDATE_FARMACIA = write("update farmacia set nombre='$farmacia',direccion='$direccion',fkmunicipio=$Select_Municipio where idfarmacia=$id_pharmacy", $Safigdb);
			break;
		
		case 8: //ELIMINAR LA  FARMACIA//
			if(isset($_POST["id_pharmacy"])){$id_pharmacy = $_POST["id_pharmacy"];}else{exit();}
			$Estado_Farmacia = 4;
			$UPDATE_PHARMACY = write("update farmacia set fkestado=$Estado_Farmacia where idfarmacia=$id_pharmacy", $Safigdb);
			break;
		
				
	}
?>