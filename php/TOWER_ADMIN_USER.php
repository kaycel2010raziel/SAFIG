<?php
	include 'default/dbconnect.php';
	if(isset($_POST["a0"])){$ACTION = $_POST["a0"];}else{if(isset($_GET["a0"])){$ACTION = $_GET["a0"];}else{exit();};}
	
	switch($ACTION){
		case 1:	//LISTADO DE USUARIOS ACTIVOS//
			echo json_encode($USUARIOS = read("SELECT USUARIO.FK_ROL,USUARIO.ID_USUARIO,USUARIO.NOMBRE,USUARIO.CORREO,USUARIO.PASSWORD,USUARIO.FK_ESTADO,ROL.NOMBRE AS ROL,ESTADO.NOMBRE AS ESTADO,INSTITUCION.NOMBRE AS INSTITUCION FROM USUARIO JOIN ROL ON ROL.ID_ROL=USUARIO.FK_ROL JOIN ESTADO ON ESTADO.ID_ESTADO=USUARIO.FK_ESTADO JOIN INSTITUCION ON INSTITUCION.ID_INSTITUCION=USUARIO.FK_INSTITUCION", $Towerdb));
			break;
			
		case 2:	//LISTADO DE INSITUCIONES//
			echo json_encode($INSITUCIONES = read("SELECT INSTITUCION.ID_INSTITUCION,INSTITUCION.NOMBRE,INSTITUCION.SIGLAS FROM INSTITUCION WHERE FK_ESTADO NOT IN(2)", $Towerdb));
			break;
			
		case 3:	//LISTADO DE  ROLES//
			echo json_encode($ROLES = read("SELECT ROL.ID_ROL,ROL.NOMBRE,ROL.DESCRIPCION FROM ROL WHERE ROL.FK_ESTADO NOT IN(2)", $Towerdb));
			break;
		
		case 4:	//GUARDAR NUEVO USUARIO//
			if(isset($_POST["Usuario"])){$Usuario = $_POST["Usuario"];}else{exit();}
			if(isset($_POST["Correo"])){$Correo = $_POST["Correo"];}else{exit();}
			if(isset($_POST["password1"])){$password1 = $_POST["password1"];}else{exit();}
			if(isset($_POST["Select_Institucion"])){$Select_Institucion = $_POST["Select_Institucion"];}else{exit();}
			if(isset($_POST["Select_Rol"])){$Select_Rol = $_POST["Select_Rol"];}else{exit();}
			
			$final_password = hash('sha512', $password1);
			$pass = password_hash($final_password, PASSWORD_BCRYPT);
			$Estado = 1;
			$INSERT_USUARIO = write("INSERT INTO USUARIO (NOMBRE,CORREO,PASSWORD,FK_ROL,FK_INSTITUCION,FK_ESTADO)VALUES('$Usuario','$Correo','$pass',$Select_Rol,$Select_Institucion,$Estado)", $Towerdb);
			break;
			
		case 5:	//MOSTRAR USUARIO PARA MODIFICAR//
			if(isset($_POST["id_usuario"])){$id_usuario = $_POST["id_usuario"];}else{exit();}
			echo json_encode($USUARIO = read("SELECT USUARIO.ID_USUARIO,USUARIO.NOMBRE AS USUARIO,USUARIO.FK_ESTADO,ESTADO.NOMBRE AS ESTADO,USUARIO.CORREO,USUARIO.PASSWORD, ROL.ID_ROL,ROL.NOMBRE AS ROL,INSTITUCION.ID_INSTITUCION,INSTITUCION.NOMBRE AS INSTITUCION FROM USUARIO JOIN ROL ON ROL.ID_ROL=USUARIO.FK_ROL JOIN INSTITUCION ON INSTITUCION.ID_INSTITUCION=USUARIO.FK_INSTITUCION JOIN ESTADO ON ESTADO.ID_ESTADO=USUARIO.FK_ESTADO WHERE USUARIO.ID_USUARIO=$id_usuario", $Towerdb));
			break;
		
		case 6: //CARGAR LA INSITUCION Y EL DROP//
			echo json_encode($INSITUCIONES = read("SELECT INSTITUCION.ID_INSTITUCION,INSTITUCION.NOMBRE,INSTITUCION.SIGLAS FROM INSTITUCION WHERE FK_ESTADO NOT IN(2)", $Towerdb));
			break;
		
		case 7: //CARGAR ROL//
			echo json_encode($ROLES = read("SELECT ROL.ID_ROL,ROL.NOMBRE,ROL.DESCRIPCION FROM ROL WHERE ROL.FK_ESTADO NOT IN(2)", $Towerdb));
			break;
		
		case 8:	//GUARDAR MODIFICACION//
			if(isset($_POST["Usuario"])){$Usuario = $_POST["Usuario"];}else{exit();}
			if(isset($_POST["Correo"])){$Correo = $_POST["Correo"];}else{exit();}
			if(isset($_POST["password1"])){$password1 = $_POST["password1"];}else{exit();}
			if(isset($_POST["Select_Institucion"])){$Select_Institucion = $_POST["Select_Institucion"];}else{exit();}
			if(isset($_POST["Select_Rol"])){$Select_Rol = $_POST["Select_Rol"];}else{exit();}
			if(isset($_POST["id_usuario"])){$id_usuario = $_POST["id_usuario"];}else{exit();}
			
			$final_password = hash('sha512', $password1);
			$pass = password_hash($final_password, PASSWORD_BCRYPT);
			$Estado = 1;
			$UPDATE_USUARIO = write("UPDATE USUARIO SET NOMBRE='$Usuario',CORREO='$Correo',PASSWORD='$pass',FK_ROL=$Select_Rol,FK_INSTITUCION=$Select_Institucion WHERE ID_USUARIO=$id_usuario", $Towerdb);
			break;
		
		case 9 : //ELIMINAR USUARIO//
			if(isset($_POST["id_usuario"])){$id_usuario = $_POST["id_usuario"];}else{exit();}
			$Estado = 2;
			$UPDATE_USUARIO = write("UPDATE USUARIO SET FK_ESTADO=$Estado WHERE USUARIO.ID_USUARIO=$id_usuario", $Towerdb);
			break;
		
		case 10: //CARGAR ESTADO PARA LOS  USUARIOS//			
			echo json_encode($UPDATE_USUARIO = read("SELECT ESTADO.ID_ESTADO,ESTADO.NOMBRE FROM ESTADO", $Towerdb));
			break;
		case 11:	//REGENERAR EL TOKEN
			if(isset($_POST["id_usuario"])){$id_usuario = $_POST["id_usuario"];}else{exit();}
			$q = read("SELECT CORREO FROM USUARIO WHERE ID_USUARIO = $id_usuario", $Towerdb);
			if(sizeof($q) == 0){exit();}
			$username = $q[0]['CORREO'];
			
			require_once("default/GAlib/token.php");
			require_once("../plugins/phpqrcode/qrlib.php");
			
			$myGA = new myGA();
			
			$myGA->setUser($username, "TOTP");
			$url = urlencode($myGA->createURL($username));
			
			echo $url;
			break;
	}
?>