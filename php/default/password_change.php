<?php
include 'login_functions.php';

sec_session_start();

if(isset($_POST['p'])) {
	$p1 = $_POST['p'];
	$uid = get_eid($Safigdb);	
	$pf = password_hash($p1, PASSWORD_BCRYPT);	
	$MOD_PASSWORD = write("update usuario as us set us.password='$pf',us.password_change=0 where idusuario=$uid", $Safigdb);
	header("Location: ../../index.php");
}

?>