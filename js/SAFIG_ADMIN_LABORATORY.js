$(document).ready(function(){
	$(".nav-item-Button").append('<li class="nav-item d-none d-sm-inline-block"><button class="btn btn-info" id="new_laboratory" >Nuevo Laboratorio</button></li>');
	$(".nav-item-Button").append('<li class="nav-item d-none d-sm-inline-block"><button title="Generar PDF " class="btn btn-danger ml-2"  id="PDF" ><i class="fa fa-file-pdf-o">PDF</i></button></li>');
	$("#table_user").html("<div class='container-fluid'><div class='table-responsive h-100 ' id='listadoregistros2'><table id='tbllistado2' class='table table-hover table-bordered text-center'><thead class='thead-dark'><th>NO.</th><th>LABORATORIO</th><th>DIRECCION</th><th>TELEFONO</th><th>CORREO</th><th>DEPARTAMENTO</th><th>MUNICIPIO</th><th>ESTADO</th><th>ACCIONES</th></thead><tbody id='tbllistado_body2'></tbody></table></div></div>");
	$("#new_laboratory").click(function(){new_laboratory();});	
	$("#PDF").click(function(){PDF_LABORATORY();});	
	//TABLA DE USUARIOS
	$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_LABORATORY.php", async: true, data: {a0: 1}})
	.done(function(stream) {
		data = jQuery.parseJSON(stream);
		$("#listadoregistros2 tbody").empty();
		//console.log(data);
		data.forEach(function(element, index, array){
			switch(element['fkestado']){
				case '2': var EstadoClass1 = 'alert-info'; break;
				case '3': var EstadoClass1 = 'alert-warning';  break;
				case '4': var EstadoClass1 = 'alert-danger';  break;
			}
			$("#listadoregistros2 tbody").append("<tr id='listadoregistros2_tr_"+index+"'></tr>");
			$("#listadoregistros2_tr_"+index).append("<td>"+(index+1)+"</td>");
			$("#listadoregistros2_tr_"+index).append("<td>"+element['nombre']+"</td>");
			$("#listadoregistros2_tr_"+index).append("<td>"+element['direccion']+"</td>");
			$("#listadoregistros2_tr_"+index).append("<td>"+element['telefono']+"</td>");
			$("#listadoregistros2_tr_"+index).append("<td>"+element['correo']+"</td>");
			$("#listadoregistros2_tr_"+index).append("<td>"+element['departamento']+"</td>");
			$("#listadoregistros2_tr_"+index).append("<td>"+element['municipio']+"</td>");
			$("#listadoregistros2_tr_"+index).append("<td class="+EstadoClass1+">"+element['estado']+"</td>");
			
			if(element['fkestado']=='2'){
				$("#listadoregistros2_tr_"+index).append("<td>"+
					"<button title='Modificar' class='btn btn-info mr-2 mod_lab' id_laboratory='"+element['idlaboratorio']+"'><i class='fa fa-undo'></i></button>"+
					"<button title='eliminar' class='btn btn-danger mr-2 delite_lab' id_laboratory='"+element['idlaboratorio']+"'><i class='fa fa-trash'></i></button></td>");
			}
		});
		
		$("#tbllistado2").DataTable({
			iDisplayLength: -1,
			pageLength: 7,
			dom: 'Bfrtip',
				buttons: [
					//{extend: 'excelHtml5',"className":'btn-sm btn-success ml-5',title: 'LISTADO DE USUARIOS',orientation: 'landscape',},
					//{extend: 'pdfHtml5',"className":'btn-sm btn-danger ml-2',title: 'LISTADO DE USUARIOS',orientation: 'landscape',},
				],
				columnDefs: [
					{ 
					"targets": [ 0, 1,2,4],
					"className": "dt-head-center",
					"className": "text-center",
					//"width": "15%",
					}
				],				
			"language": {
				"search": "Buscar:",
				"paginate": {
				  "previous": "Anterior",
				  "next": "Siguiente"
				}
			},
			fnDrawCallback : function() {
				$(".mod_lab").click(function(){
					var id_laboratory = $(this).attr("id_laboratory");
					$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_LABORATORY.php", async: true, data: {a0: 6, id_laboratory:id_laboratory}})
					.done(function(stream) {
						data1 = jQuery.parseJSON(stream);
						console.log(data1);
						$("#lg_modal_title").html("Modificar Laboratorio");
						$("#lg_modal_apply_button").remove();
						$("#lg_modal_content").html(
						"	<div class='row'>"+
						"		<h4 class='w-100 text-center pt-2 pb-3'>Modificar Laboratorio</h4>"+
						"			<div class='col-12 ' id='User' >"+
						"				<div class='card card-secondary'>"+
						"					<div class='card-body'>"+
						"						<div class='row'>"+
						"							<div class='col-sm-6'>"+
						"								<div class='form-group'>"+
						"									<label><i class='fa fa-build'>&nbsp; </i> Nombre  :</label>"+
						"									<input class='form-control'  type='text'id='labotaorio'  placeholder='Ingrese nombre del laboratorio' value='"+data1[0]['nombre']+"' />"+
						"								</div>"+				
						"							</div>"+
						"							<div class='col-sm-6'>"+
						"								<div class='form-group'>"+
						"									<label> <i class='fa fa-list'>&nbsp; </i>Direccion: </label>"+
						"									<input  class='form-control' type='text'  placeholder='Ingrese la direccion' id='direccion' value='"+data1[0]['direccion']+"' />"+
						"								</div>"+				
						"							</div>"+
						"						</div>"+
						"						<div class='row'>"+
						"							<div class='col-sm-6'>"+
						"								<div class='form-group'>"+
						"									<label> <i class='fa fa-phone'>&nbsp; </i>Telefono: </label>"+
						"									<input  class='form-control' type='text'  placeholder=' (+502 )' id='telefono' value='"+data1[0]['telefono']+"' />"+
						"								</div>"+				
						"							</div>"+
						"							<div class='col-sm-6'>"+
						"								<div class='form-group'>"+
						"									<label> <i class='fa fa-mail'>&nbsp; </i>correo: </label>"+
						"									<input  class='form-control' type='text'  placeholder='@example.com' id='correo' value='"+data1[0]['correo']+"' />"+
						"								</div>"+				
						"							</div>"+
						"						</div>"+
						"						<div class='row'>"+		
						"							<div class='col-sm-6'>"+
						"								<div class='form-group'>"+
						"									<label> <i class='fa fa-list'>&nbsp; </i>Departamento: </label>"+
						"									<select class='form-control' type='text' id='Select_Departamento' ></select>"+
						"								</div>"+				
						"							</div>"+					
						"							<div class='col-sm-6'>"+
						"								<div class='form-group'>"+
						"									<label><i class='fa fa-map'>&nbsp; </i>Municipio</label>"+
						"									<select class='form-control' type='text' id='Select_Municipio' ></select>"+
						"								</div>"+				
						"							</div>"+
						/*"							<div class='col-sm-4'>"+
						"								<div class='form-group'>"+
						"									<label><i class='fa fa-user'>&nbsp; </i>foto</label>"+
						"									<input id='file-upload' type='file' name='file-upload' multiple />"+
						"								</div>"+				
						"							</div>"+
					*/	"						</div>"+
						"					<div class='row pt-4'>"+
						"						<div class='col-12'>"+ 
						"							<div class='form-group'>"+
						"								<div class='col-md-12 text-center'>"+
						"									<button type='submit'  id='GuardarData' class='btn btn-warning btn-lg btn-block'><i class='fa fa-save'>&nbsp;</i>Guardar</button>"+
						"								</div>"+
						"							</div>"+
						"						</div>"+
						"					</div>"+
						"				</div>"+
						"			</div>"+
						"		</div>"+
						"	</div>"
						);
						//CARGAR DEPARTAMENTO//
						$("#Select_Municipio").append('<option  value='+data1[0]['idmunicipio']+' selected="selected">'+data1[0]['municipio']+'</option>'); 
						$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_LABORATORY.php", async: true , data: {'a0': 2}})
						.done(function(stream) {	
							data = jQuery.parseJSON(stream);
							$("#Select_Departamento").append('<option  value='+data1[0]['iddepartamento']+' selected="selected">'+data1[0]['departamento']+'</option>'); 
							data.forEach(function(element, index, array){
								$("#Select_Departamento").append('<option  value="'+element['iddepartamento']+'">'+element['departamento']+'</option>');
							});
							$('#Select_Departamento').change(function(){
								var ide = $('#Select_Departamento option:selected').val();
								$("#Select_Municipio").empty();
								$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_LABORATORY.php", async: true , data: {'a0': 3,'ide':ide}})
								.done(function(otra) {
									data = jQuery.parseJSON(otra);
									$("#Select_Municipio").append('<option  value='+data1[0]['fkmunicipio']+' selected="selected">'+data1[0]['municipio']+'</option>'); 
									data.forEach(function(element, index, array){
										$("#Select_Municipio").append('<option  value="'+element['idmunicipio']+'">'+element['municipio']+'</option>');
									});
								}); 
							});
						}); 
								
						$('#lg_modal').modal({backdrop: 'static', keyboard: false})
						//GUARDAR FARMCIA//
						$('#GuardarData').off().click(function(){
							var info="Debe ingresar todos los datos";
							var labotaorio = $('#labotaorio').val(); if(labotaorio==""){alert(info); $("#labotaorio").css("borderColor", "red");slide().stop();}
							var telefono = $('#telefono').val(); if(telefono==""){alert(info); $("#telefono").css("borderColor", "red");slide().stop();}
							var correo = $('#correo').val(); if(correo==""){alert(info); $("#correo").css("borderColor", "red");slide().stop();}
							var direccion = $('#direccion').val(); if(direccion==""){alert(info); $("#direccion").css("borderColor", "red");slide().stop();}
							//var file_upload=$('#file-upload').val(); if(file_upload==""){alert(info); $("#file-upload").css("borderColor", "red");slide().stop();  }
							var Select_Departamento=$('#Select_Departamento').val(); if(Select_Departamento=="0"){alert(info); $("#Select_Departamento").css("borderColor", "red");slide().stop();  }
							var Select_Municipio=$('#Select_Municipio').val(); if(Select_Municipio=="0"){alert(info); $("#Select_Municipio").css("borderColor", "red");slide().stop();  }
							
							$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_LABORATORY.php", async: true , data: {a0: 7,labotaorio:labotaorio,telefono:telefono,correo:correo,direccion:direccion,Select_Municipio:Select_Municipio,id_laboratory:id_laboratory}})
							.done(function(stream) {
								var lasid = id_laboratory;
								//CARGAR FOTO LABORATORIO//
								/*
								if($("#file-upload").prop("files").length > 0){ 
									var form_data = new FormData();	
									var files = $("#file-upload").prop("files");
									for (var i = 0; i < files.length; i++) {
										form_data.append("file"+i, files.item(i));
									};
									form_data.append("a0", 5);
									form_data.append("lasid",lasid);
									$.ajax({
										url: "../php/SAFIG_ADMIN_LABORATORY.php",                         
										type: 'POST',
										cache: false,
										data: form_data,
										contentType: false,
										processData: false,
										success: function(d){
										}
									});				
								}
								*/
								Swal.fire({
								  //position: 'top-end',
								  icon: 'success',
								  title: 'laboratorio Modificado',
								  showConfirmButton: false,
								  timer: 2000
								}).then((result) => {
									location.reload();
								  });
							});
						}); 
					});
				});	
				//eliminar  usuario//
				$('.delite_lab').off().click(function(){
					var id_laboratory = $(this).attr("id_laboratory");
					ConfirmarEliminar(id_laboratory);
					
					function ConfirmarEliminar(id_laboratory){
						var respuesta = confirm("Estas seguro?, vas  a  eliminar el Laboratorio?");
						if(respuesta == false){
							location.reload();
						}else{
							$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_LABORATORY.php", async: true, data: {a0: 8, id_laboratory: id_laboratory}})
							.done(function(stream) {
								Swal.fire({
								  //position: 'top-end',
								  icon: 'success',
								  title: 'Laboratorio Eliminado',
								  showConfirmButton: false,
								  timer: 2000
								}).then((result) => {
									location.reload();
								  });
							});
						}
					}	
				}); 
			}
		});	
	});
});

	function new_laboratory(){
		$("#lg_modal_title").html("Agregar Laboratorio");
		$("#lg_modal_apply_button").remove();	
		$("#lg_modal_content").html(
		"	<div class='row'>"+
		"		<h4 class='w-100 text-center pt-2 pb-3'>Registrar Laboratorio</h4>"+
		"			<div class='col-12 ' id='User' >"+
		"				<div class='card card-secondary'>"+
		"					<div class='card-body'>"+
		"						<div class='row'>"+
		"							<div class='col-sm-6'>"+
		"								<div class='form-group'>"+
		"									<label><i class='fa fa-build'>&nbsp; </i> Nombre  :</label>"+
		"									<input class='form-control'  type='text'id='labotaorio'  placeholder='Ingrese nombre del laboratorio' />"+
		"								</div>"+				
		"							</div>"+
		"							<div class='col-sm-6'>"+
		"								<div class='form-group'>"+
		"									<label> <i class='fa fa-list'>&nbsp; </i>Direccion: </label>"+
		"									<input  class='form-control' type='text'  placeholder='Ingrese la direccion' id='direccion'  />"+
		"								</div>"+				
		"							</div>"+
		"						</div>"+	
		"						<div class='row'>"+
		"							<div class='col-sm-6'>"+
		"								<div class='form-group'>"+
		"									<label> <i class='fa fa-phone'>&nbsp; </i>Telefono: </label>"+
		"									<input  class='form-control' type='number'  placeholder=' (+502 )' id='telefono'  />"+
		"								</div>"+				
		"							</div>"+
		"							<div class='col-sm-6'>"+
		"								<div class='form-group'>"+
		"									<label> <i class='fa fa-mail'>&nbsp; </i>correo: </label>"+
		"									<input  class='form-control' type='text'  placeholder='@example.com' id='correo'  />"+
		"								</div>"+				
		"							</div>"+
		"						</div>"+
		"						<div class='row'>"+		
		"							<div class='col-sm-6'>"+
		"								<div class='form-group'>"+
		"									<label> <i class='fa fa-list'>&nbsp; </i>Departamento: </label>"+
		"									<select class='form-control' type='text' id='Select_Departamento' ></select>"+
		"								</div>"+				
		"							</div>"+					
		"							<div class='col-sm-6'>"+
		"								<div class='form-group'>"+
		"									<label><i class='fa fa-map'>&nbsp; </i>Municipio</label>"+
		"									<select class='form-control' type='text' id='Select_Municipio' ></select>"+
		"								</div>"+				
		"							</div>"+
		/*"							<div class='col-sm-4'>"+
		"								<div class='form-group'>"+
		"									<label><i class='fa fa-user'>&nbsp; </i>foto</label>"+
		"									<input id='file-upload' type='file' name='file-upload' multiple />"+
		"								</div>"+				
		"							</div>"+
	*/	"						</div>"+
		"					<div class='row pt-4'>"+
		"						<div class='col-12'>"+ 
		"							<div class='form-group'>"+
		"								<div class='col-md-12 text-center'>"+
		"									<button type='submit'  id='GuardarData' class='btn btn-info btn-lg btn-block'><i class='fa fa-save'>&nbsp;</i>Guardar</button>"+
		"								</div>"+
		"							</div>"+
		"						</div>"+
		"					</div>"+
		"				</div>"+
		"			</div>"+
		"		</div>"+
		"	</div>"
		);
		
		//CARGAR DEPARTAMENTO //
		$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_LABORATORY.php", async: true , data: {'a0': 2}})
		.done(function(stream) {	
			data = jQuery.parseJSON(stream);
			$("#Select_Departamento").append('<option  value="0" selected="selected">Seleccione  Departamento </option>'); 
			data.forEach(function(element, index, array){
				$("#Select_Departamento").append('<option  value="'+element['iddepartamento']+'">'+element['departamento']+'</option>');
			});
			$('#Select_Departamento').change(function(){
				var ide = $('#Select_Departamento option:selected').val();
				$("#Select_Municipio").empty();
				$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_LABORATORY.php", async: true , data: {'a0': 3,'ide':ide}})
				.done(function(otra) {
					data = jQuery.parseJSON(otra);
					$("#Select_Municipio").append('<option  value="0" selected="selected">Seleccione  Municipio </option>'); 
					data.forEach(function(element, index, array){
						$("#Select_Municipio").append('<option  value="'+element['idmunicipio']+'">'+element['municipio']+'</option>');
					});
				}); 
			});
		}); 
		
		$('#lg_modal').modal({backdrop: 'static', keyboard: false})

		//GUARDAR FARMCIA//
		$('#GuardarData').off().click(function(){
			var info="Debe ingresar todos los datos";
			var labotaorio = $('#labotaorio').val(); if(labotaorio==""){alert(info); $("#labotaorio").css("borderColor", "red");slide().stop();}
			var telefono = $('#telefono').val(); if(telefono==""){alert(info); $("#telefono").css("borderColor", "red");slide().stop();}
			var correo = $('#correo').val(); if(correo==""){alert(info); $("#correo").css("borderColor", "red");slide().stop();}
			var direccion = $('#direccion').val(); if(direccion==""){alert(info); $("#direccion").css("borderColor", "red");slide().stop();}
			//var file_upload=$('#file-upload').val(); if(file_upload==""){alert(info); $("#file-upload").css("borderColor", "red");slide().stop();  }
			var Select_Departamento=$('#Select_Departamento').val(); if(Select_Departamento=="0"){alert(info); $("#Select_Departamento").css("borderColor", "red");slide().stop();  }
			var Select_Municipio=$('#Select_Municipio').val(); if(Select_Municipio=="0"){alert(info); $("#Select_Municipio").css("borderColor", "red");slide().stop();  }
			
			$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_LABORATORY.php", async: true , data: {a0: 4,labotaorio:labotaorio,telefono:telefono,correo:correo,direccion:direccion,Select_Municipio:Select_Municipio}})
			.done(function(stream) {
				var lasid = stream;
				//CARGAR FOTO LABORATORIO//
				/*if($("#file-upload").prop("files").length > 0){ 
					var form_data = new FormData();	
					var files = $("#file-upload").prop("files");
					for (var i = 0; i < files.length; i++) {
						form_data.append("file"+i, files.item(i));
					};
					form_data.append("a0", 5);
					form_data.append("lasid",lasid);
					$.ajax({
						url: "../php/SAFIG_ADMIN_LABORATORY.php",                         
						type: 'POST',
						cache: false,
						data: form_data,
						contentType: false,
						processData: false,
						success: function(d){
						}
					});				
				}
				*/
				Swal.fire({
				  //position: 'top-end',
				  icon: 'success',
				  title: 'Laboratorio Agregado',
				  showConfirmButton: false,
				  timer: 2000
				}).then((result) => {
					location.reload();
				  });
			});
		}); 
	}
	
	function PDF_LABORATORY(){
		window.open('../print/SAFIG_REPORT_LABORATORY.php');
	}

	