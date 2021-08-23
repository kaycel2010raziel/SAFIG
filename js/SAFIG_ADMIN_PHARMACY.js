$(document).ready(function(){
	$(".nav-item-Button").append('<li class="nav-item d-none d-sm-inline-block"><button class="btn btn-info" id="new_pharmacy" >Nueva Farmacia</button></li>');
	$(".nav-item-Button").append('<li class="nav-item d-none d-sm-inline-block"><button title="Generar PDF " class="btn btn-danger ml-2"  id="PDF" ><i class="fa fa-file-pdf-o">PDF</i></button></li>');
	$("#table_user").html("<div class='container-fluid'><div class='table-responsive h-100 ' id='listadoregistros2'><table id='tbllistado2' class='table table-hover table-bordered text-center'><thead class='thead-dark'><th>NO.</th><th>FARMACIA</th><th>DIRECCION</th><th>LOGO</th><th>DEPARTAMENTO</th><th>MUNICIPIO</th><th>ESTADO</th><th>ACCIONES</th></thead><tbody id='tbllistado_body2'></tbody></table></div></div>");
	$("#new_pharmacy").click(function(){new_pharmacy();});	
	$("#PDF").click(function(){PDF_PHARMACY();});	
	//TABLA DE USUARIOS
	$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_PHARMACY.php", async: true, data: {a0: 1}})
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
			$("#listadoregistros2_tr_"+index).append("<td><img src='../img/pharmacy/" + element['foto'] + "'width='60' class='brand-image img-circle elevation-3' height='60'></td>");
			$("#listadoregistros2_tr_"+index).append("<td>"+element['departamento']+"</td>");
			$("#listadoregistros2_tr_"+index).append("<td>"+element['municipio']+"</td>");
			$("#listadoregistros2_tr_"+index).append("<td class="+EstadoClass1+">"+element['estado']+"</td>");
			
			if(element['fkestado']=='2'){
				$("#listadoregistros2_tr_"+index).append("<td>"+
					"<button title='Modificar' class='btn btn-info mr-2 mod_pharmacy' id_pharmacy='"+element['idfarmacia']+"'><i class='fa fa-undo'></i></button>"+
					"<button title='eliminar' class='btn btn-danger mr-2 delite_pharmacy' id_pharmacy='"+element['idfarmacia']+"'><i class='fa fa-trash'></i></button></td>");
			}
		});
		
		$("#tbllistado2").DataTable({
			iDisplayLength: -1,
			pageLength: 10,
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
				$(".mod_pharmacy").click(function(){
					var id_pharmacy = $(this).attr("id_pharmacy");
					$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_PHARMACY.php", async: true, data: {a0: 6, id_pharmacy:id_pharmacy}})
					.done(function(stream) {
						data1 = jQuery.parseJSON(stream);
						console.log(data1);
						$("#lg_modal_title").html("Modificar Farmacia");
						$("#lg_modal_apply_button").remove();	
						$("#lg_modal_content").html(
						"	<div class='row'>"+
						"		<h4 class='w-100 text-center pt-2 pb-3'>Modificar Farmacia</h4>"+
						"			<div class='col-12 ' id='User' >"+
						"				<div class='card card-secondary'>"+
						"					<div class='card-body'>"+
						"						<div class='row'>"+
						"							<div class='col-sm-6'>"+
						"								<div class='form-group'>"+
						"									<label><i class='fa fa-build'>&nbsp; </i> Nombre  :</label>"+
						"									<input class='form-control'  type='text'id='farmacia'  placeholder='Ingrese nombre de la Farmacia' value='"+data1[0]['nombre']+"' />"+
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
						"						</div>"+
						"						<div class='row'>"+
						"							<div class='col-sm-12'>"+
						"								<div class='form-group'>"+
						"									<label> <i class='fa fa-user'>&nbsp; </i> foto: </label>"+
						"									<input id='file-upload' type='file' name='file-upload' multiple />"+
						"								</div>"+				
						"							</div>"+
						"						</div>"+
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
						$("#Select_Municipio").append('<option  value='+data1[0]['fkmunicipio']+' selected="selected">'+data1[0]['municipio']+'</option>'); 
						$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_PHARMACY.php", async: true , data: {'a0': 2}})
						.done(function(stream) {	
							data = jQuery.parseJSON(stream);
							$("#Select_Departamento").append('<option  value='+data1[0]['iddepartamento']+' selected="selected">'+data1[0]['departamento']+'</option>'); 
							data.forEach(function(element, index, array){
								$("#Select_Departamento").append('<option  value="'+element['iddepartamento']+'">'+element['departamento']+'</option>');
							});
							$('#Select_Departamento').change(function(){
								var ide = $('#Select_Departamento option:selected').val();
								$("#Select_Municipio").empty();
								$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_PHARMACY.php", async: true , data: {'a0': 3,'ide':ide}})
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
							var farmacia = $('#farmacia').val(); if(farmacia==""){alert(info); $("#farmacia").css("borderColor", "red");slide().stop();}
							var direccion = $('#direccion').val(); if(direccion==""){alert(info); $("#direccion").css("borderColor", "red");slide().stop();}
							var Select_Departamento=$('#Select_Departamento').val(); if(Select_Departamento=="0"){alert(info); $("#Select_Departamento").css("borderColor", "red");slide().stop();  }
							var Select_Municipio=$('#Select_Municipio').val(); if(Select_Municipio=="0"){alert(info); $("#Select_Municipio").css("borderColor", "red");slide().stop();  }
							
							$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_PHARMACY.php", async: true , data: {a0: 7,farmacia:farmacia,direccion:direccion,Select_Municipio:Select_Municipio,id_pharmacy:id_pharmacy}})
							.done(function(stream) {
								var lasid = id_pharmacy;
								//CARGAR FOTO USUARIO//
								if($("#file-upload").prop("files").length > 0){ 
									var form_data = new FormData();	
									var files = $("#file-upload").prop("files");
									for (var i = 0; i < files.length; i++) {
										form_data.append("file"+i, files.item(i));
									};
									form_data.append("a0", 5);
									form_data.append("lasid",lasid);
									$.ajax({
										url: "../php/SAFIG_ADMIN_PHARMACY.php",                         
										type: 'POST',
										cache: false,
										data: form_data,
										contentType: false,
										processData: false,
										success: function(d){
										}
									});				
								}
								Swal.fire({
								  //position: 'top-end',
								  icon: 'success',
								  title: 'Farmacia Modificada',
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
				$('.delite_pharmacy').off().click(function(){
					var id_pharmacy = $(this).attr("id_pharmacy");
					ConfirmarEliminar(id_pharmacy);
					
					function ConfirmarEliminar(id_pharmacy){
						var respuesta = confirm("Estas seguro?, vas  a  eliminar la Farmacia?");
						if(respuesta == false){
							location.reload();
						}else{
							$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_PHARMACY.php", async: true, data: {a0: 8, id_pharmacy: id_pharmacy}})
							.done(function(stream) {
								Swal.fire({
								  //position: 'top-end',
								  icon: 'success',
								  title: 'Farmacia Eliminada',
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

	function new_pharmacy(){
		$("#lg_modal_title").html("Crear Farmacia");
		$("#lg_modal_apply_button").remove();	
		$("#lg_modal_content").html(
		"	<div class='row'>"+
		"		<h4 class='w-100 text-center pt-2 pb-3'>Registrar Farmacia</h4>"+
		"			<div class='col-12 ' id='User' >"+
		"				<div class='card card-secondary'>"+
		"					<div class='card-body'>"+
		"						<div class='row'>"+
		"							<div class='col-sm-6'>"+
		"								<div class='form-group'>"+
		"									<label><i class='fa fa-build'>&nbsp; </i> Nombre  :</label>"+
		"									<input class='form-control'  type='text'id='farmacia'  placeholder='Ingrese nombre de la Farmacia' />"+
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
		"						</div>"+
		"						<div class='row'>"+
		"							<div class='col-sm-12'>"+
		"								<div class='form-group'>"+
		"									<label> <i class='fa fa-user'>&nbsp; </i> foto: </label>"+
		"									<input id='file-upload' type='file' name='file-upload' multiple />"+
		"								</div>"+				
		"							</div>"+
		"						</div>"+
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
		$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_PHARMACY.php", async: true , data: {'a0': 2}})
		.done(function(stream) {	
			data = jQuery.parseJSON(stream);
			$("#Select_Departamento").append('<option  value="0" selected="selected">Seleccione  Departamento </option>'); 
			data.forEach(function(element, index, array){
				$("#Select_Departamento").append('<option  value="'+element['iddepartamento']+'">'+element['departamento']+'</option>');
			});
			$('#Select_Departamento').change(function(){
				var ide = $('#Select_Departamento option:selected').val();
				$("#Select_Municipio").empty();
				$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_PHARMACY.php", async: true , data: {'a0': 3,'ide':ide}})
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
			var farmacia = $('#farmacia').val(); if(farmacia==""){alert(info); $("#farmacia").css("borderColor", "red");slide().stop();}
			var direccion = $('#direccion').val(); if(direccion==""){alert(info); $("#direccion").css("borderColor", "red");slide().stop();}
			var file_upload=$('#file-upload').val(); if(file_upload==""){alert(info); $("#file-upload").css("borderColor", "red");slide().stop();  }
			var Select_Departamento=$('#Select_Departamento').val(); if(Select_Departamento=="0"){alert(info); $("#Select_Departamento").css("borderColor", "red");slide().stop();  }
			var Select_Municipio=$('#Select_Municipio').val(); if(Select_Municipio=="0"){alert(info); $("#Select_Municipio").css("borderColor", "red");slide().stop();  }
			
			$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_PHARMACY.php", async: true , data: {a0: 4,farmacia:farmacia,direccion:direccion,Select_Municipio:Select_Municipio}})
			.done(function(stream) {
				var lasid = stream;
				//CARGAR FOTO USUARIO//
				if($("#file-upload").prop("files").length > 0){ 
					var form_data = new FormData();	
					var files = $("#file-upload").prop("files");
					for (var i = 0; i < files.length; i++) {
						form_data.append("file"+i, files.item(i));
					};
					form_data.append("a0", 5);
					form_data.append("lasid",lasid);
					$.ajax({
						url: "../php/SAFIG_ADMIN_PHARMACY.php",                         
						type: 'POST',
						cache: false,
						data: form_data,
						contentType: false,
						processData: false,
						success: function(d){
						}
					});				
				}
				Swal.fire({
				  //position: 'top-end',
				  icon: 'success',
				  title: 'Farmacia Creada',
				  showConfirmButton: false,
				  timer: 2000
				}).then((result) => {
					location.reload();
				  });
			});
		}); 
	}
	
	function PDF_PHARMACY(){
		window.open('../print/SAFIG_REPORT_PHARMACY.php');
	}

	