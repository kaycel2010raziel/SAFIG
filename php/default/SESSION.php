<?php
include 'login_functions.php';
sec_session_start();

if(isset($_POST["p"])){$page = $_POST["p"];}else{exit();}

$active = login_check();
$authorized = authorization_check($page);
$pwd_change = pwd_change_check();

if($active == 1 && $authorized == 1 && $pwd_change == 0){
	echo true;
} else {
	echo false;
}