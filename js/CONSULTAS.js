$(document).ready(function(){
	console.log('conected');
	$('#loginModal').modal('show');
	
	/*
	$.ajax({type: "POST", url: "../php/TOWER_ADMIN.php", async: true , data: {'a0': 1}})
	.done(function(stream) {	
		data = jQuery.parseJSON(stream);
		console.log(data);
		$('#Usuarios').html("<h3>"+data[0]['USUARIOS']+"</h3>");
		$('#Instituciones').html("<h3>"+data[0]['INSTITUCION']+"</h3>");
		$('#Eventos').html("<h3>"+data[0]['EVENTOS']+"</h3>");
	}); 
	*/
});

	