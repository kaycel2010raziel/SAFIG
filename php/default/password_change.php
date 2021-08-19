<?php
include 'login_functions.php';

sec_session_start();

if(isset($_POST['p'])) {
	$p1 = $_POST['p'];
	$uid = get_uid($Towerdb);	
	$pf = password_hash($p1, PASSWORD_BCRYPT);	
	write("UPDATE USUARIO SET PASSWORD = '$pf', PASSWORD_CHANGE=0 WHERE ID_USUARIO = '$uid'", $Towerdb);
	header("Location: /index.html");
}

?>