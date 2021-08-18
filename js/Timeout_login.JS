$(document).ready(function(){
	
	TiempoActividad();
});
	function TiempoActividad(){
		setTimeout("DestruirSesion()", 6000000);
	}
	function DestruirSesion(){
		location.href = "../logout.php";
	}