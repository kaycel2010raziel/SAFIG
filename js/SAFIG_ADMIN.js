$(document).ready(function(){
	$.ajax({type: "POST", url: "../php/SAFIG_ADMIN.php", async: true , data: {'a0': 1}})
	.done(function(stream) {	
		data = jQuery.parseJSON(stream);
		$('#Usuarios').html("<h3>"+data[0]['USUARIOS']+"</h3>");
		$('#FARMACIAS').html("<h3>"+data[0]['FARMACIAS']+"</h3>");
		$('#LABORATORIOS').html("<h3>"+data[0]['LABORATORIOS']+"</h3>");
		$('#PEDIDOS').html("<h3>"+data[0]['PEDIDOS']+"</h3>");
	}); 
});

	