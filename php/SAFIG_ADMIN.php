<?php
	include 'default/dbconnect.php';
	if(isset($_POST["a0"])){$ACTION = $_POST["a0"];}else{if(isset($_GET["a0"])){$ACTION = $_GET["a0"];}else{exit();};}
	switch($ACTION){
		case 1:	//CONTEO DE DATOS //
			$USUARIOS = read("SELECT count(idusuario) as conteo FROM usuario where fkestado in(2);", $Safigdb);
			$FARMACIAS = read("SELECT count(idfarmacia) as conteo FROM farmacia where fkestado in(2);", $Safigdb);
			$LABORATORIOS = read("SELECT count(idlaboratorio) as conteo FROM laboratorio where fkestado in(2)", $Safigdb);
			$PEDIDOS = read("SELECT count(idpedido) as conteo FROM pedido where fkestado in(2);", $Safigdb);
			
			$DATA[] = array(
				'USUARIOS'=> $USUARIOS[0]['conteo'],
				'FARMACIAS'=>$FARMACIAS[0]['conteo'],
				'LABORATORIOS'=>$LABORATORIOS[0]['conteo'],
				'PEDIDOS'=>$PEDIDOS[0]['conteo'],
			);
			echo json_encode($DATA);
			break;
			
	}
?>