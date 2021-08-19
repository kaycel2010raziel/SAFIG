<?php
	include 'default/dbconnect.php';
	if(isset($_POST["a0"])){$ACTION = $_POST["a0"];}else{if(isset($_GET["a0"])){$ACTION = $_GET["a0"];}else{exit();};}
	switch($ACTION){
		case 1:	//LISTADO DE USUARIOS//
			echo json_encode($USUARIOS = read("SELECT US.idusuario,concat(US.nombre,' ',US.apellido) as nombre,US.usuario,US.dpi,US.nit,US.genero,US.foto,US.fecha_nacimiento,rol.nombre as rol, estado.nombre as estado,US.fkestado FROM usuario as US join rol on rol.idrol=US.fkrol join estado on estado.idestado=US.fkestado WHERE US.fkestado IN(1,2)", $Safigdb));
			break;
			
	}
?>