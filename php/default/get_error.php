<?php

function getError($code){
	switch($code){
		case 2:
			return "Por favor revise su correo electronico.";
		case 3:
		case 4:
			return "Token expirado, solicite el cambio de contraseña nuevamente.";
		case -1:
		case -20:
			return "El usuario no esta habilitado.";
		case -2:
			return "La contraseña es incorrecta";
		case -3:
			return "El usuario no existe";
		case -4:
			return "Error del sistema";
		case -10:
		case -30:
		case -40:
		case -50:
			return "La sesión expiro";
	}
}

function getAuthorization($code){
}