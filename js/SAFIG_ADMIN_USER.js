$(document).ready(function(){
	$(".nav-item-Button").append('<li class="nav-item d-none d-sm-inline-block"><button class="btn btn-info" id="new_user" >Nuevo Usuario</button></li>');
	$(".nav-item-Button").append('<li class="nav-item d-none d-sm-inline-block"><button title="Generar PDF " class="btn btn-danger ml-2"  id="PDF" ><i class="fa fa-file-pdf-o">PDF</i></button></li>');
	$("#table_user").html("<div class='container-fluid'><div class='table-responsive h-100 ' id='listadoregistros2'><table id='tbllistado2' class='table table-hover table-bordered text-center'><thead class='thead-dark'><th>NO.</th><th>NOMBRE</th><th>USUARIO</th><th>FOTO</th><th>ROL</th><th>ESTADO</th><th>ACCIONES</th></thead><tbody id='tbllistado_body2'></tbody></table></div></div>");
	$("#new_user").click(function(){New_User();});	
	$("#PDF").click(function(){PDF_USER();});	
	//TABLA DE USUARIOS
	$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_USER.php", async: true, data: {a0: 1}})
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
			$("#listadoregistros2_tr_"+index).append("<td>"+element['usuario']+"</td>");
			$("#listadoregistros2_tr_"+index).append("<td><img src='../img/user/" + element['foto'] + "'width='60' class='brand-image img-circle elevation-3' height='60'></td>");
			$("#listadoregistros2_tr_"+index).append("<td>"+element['rol']+"</td>");
			$("#listadoregistros2_tr_"+index).append("<td class="+EstadoClass1+">"+element['estado']+"</td>");
			
			if(element['fkestado']=='2'){
				$("#listadoregistros2_tr_"+index).append("<td>"+
					"<button title='Modificar' class='btn btn-info mr-2 mod_user' id_usuario='"+element['idusuario']+"'><i class='fa fa-undo'></i></button>"+
					"<button title='Cambiar Contraseña' class='btn btn-success mr-2 pass_change' id_usuario='"+element['idusuario']+"'><i class='fa fa-lock'></i></button>"+
					"<button title='Suspender usuario' class='btn btn-warning mr-2 user_down' id_usuario='"+element['idusuario']+"'><i class='fa fa-list'></i></button>"+
					"<button title='eliminar' class='btn btn-danger mr-2 delite_user' id_usuario='"+element['idusuario']+"'><i class='fa fa-trash'></i></button></td>");
			}
			if(element['fkestado']=='3'){
				$("#listadoregistros2_tr_"+index).append("<td>"+
					"<button title='Activar usuario' class='btn btn-info mr-2 user_active' id_usuario='"+element['idusuario']+"'><i class='fa fa-list'></i></button>"+
					"<button title='eliminar' class='btn btn-danger mr-2 delite_user' id_usuario='"+element['idusuario']+"'><i class='fa fa-trash'></i></button></td>");
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
				$(".mod_user").click(function(){
					var id_usuario = $(this).attr("id_usuario");
					$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_USER.php", async: true, data: {a0: 5, id_usuario:id_usuario}})
					.done(function(stream) {
						console.log(stream);
						data1 = jQuery.parseJSON(stream);
						$("#lg_modal_title").html("Modificar Usuario");
							$("#lg_modal_apply_button").remove();	
							$("#lg_modal_content").html(
							"	<div class='row'>"+
							"		<h4 class='w-100 text-center pt-2 pb-3'>Modificar Usuario</h4>"+
							"			<div class='col-12 ' id='User' >"+
							"			<div class='card card-secondary'>"+
							"				<div class='card-body'>"+
							"					<div class='row'>"+
							"						<div class='col-sm-4'>"+
							"							<div class='form-group'>"+
							"								<label><i class='fa fa-users'>&nbsp; </i> Nombre  :</label>"+
							"								<input class='form-control'  type='text'id='nombre'  placeholder='Ingrese nombre' value ='"+data1[0]['nombre']+"' />"+
							"							</div>"+				
							"						</div>"+
							"						<div class='col-sm-4'>"+
							"							<div class='form-group'>"+
							"								<label> <i class='fa fa-users'>&nbsp; </i>Apellido: </label>"+
							"								<input   class='form-control' type='text'  placeholder='Ingrese apellido' id='apellido' value ='"+data1[0]['apellido']+"' />"+
							"							</div>"+				
							"						</div>"+
							"						<div class='col-sm-4'>"+
							"							<div class='form-group'>"+
							"								<label> <i class='fa fa-list'>&nbsp; </i>DPI: </label>"+
							"								<input   class='form-control' type='text'  placeholder='ingrese DPI' id='dpi' value ='"+data1[0]['dpi']+"' />"+
							"							</div>"+				
							"						</div>"+
							"					</div>"+
							"					<div class='row'>"+		
							"						<div class='col-sm-6'>"+
							"							<div class='form-group'>"+
							"								<label> <i class='fa fa-list'>&nbsp; </i>Nit: </label>"+
							"								<input   class='form-control' type='text'  placeholder='ingrese Numero de NIT' id='nit' value ='"+data1[0]['nit']+"' />"+
							"							</div>"+				
							"						</div>"+					
							"						<div class='col-sm-6'>"+
							"							<div class='form-group'>"+
							"								<label><i class='fa fa-calendar'>&nbsp; </i> Fecha de Nacimiento</label>"+
							"								<input class='form-control'  type='date'  id='nacimiento' value ='"+data1[0]['fecha_nacimiento']+"'  />"+
							"							</div>"+				
							"						</div>"+
							"					</div>"+
							"					<div class='progress'>"+
							"						<div class='progress-bar bg-warning' role='progressbar' style='width: 100%' aria-valuenow='75' aria-valuemin='0' aria-valuemax='100'></div>"+
							"					</div>"+
							"					<div class='row pt-6'>"+
							"						<div class='col-sm-4'>"+
							"							<div class='form-group'>"+
							"								<label> <i class='fa fa-user'>&nbsp; </i> Usuario: </label>"+
							"								<input class='form-control'  type='text' placeholder='carlos@safig.com'  id='usuario' value ='"+data1[0]['usuario']+"' />"+
							"							</div>"+				
							"						</div>"+
							"						<div class='col-sm-6'>"+
							"							<div class='form-group'>"+
							"								<label> <i class='fa fa-img'>&nbsp; </i> Foto: </label>"+
							"								<input id='file-upload' type='file' name='file-upload' multiple />"+
							"							</div>"+				
							"						</div>"+		
							"					</div>"+
							"					<div class='row'>"+
							"						<div class='col-sm-12'>"+
							"							<div class='form-group'>"+
							"								<label> <i class='fa fa-img'>&nbsp; </i> Rol: </label>"+
							"								<select class='form-control' type='text' id='Select_Rol' ></select>"+
							"							</div>"+				
							"						</div>"+		
							"					</div>"+
							"				</div>"+
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
							"	</div>"+
							"	</div>");
						
						$('#lg_modal').modal({backdrop: 'static', keyboard: false})
						//CARGAR ROLES//
						$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_USER.php", async: true , data: {'a0': 2}})
						.done(function(stream) {	
							data = jQuery.parseJSON(stream);
							$("#Select_Rol").append('<option  value="'+data1[0]['idrol']+'" selected="selected">'+data1[0]['rol']+'</option>');
							data.forEach(function(element, index, array){
								$("#Select_Rol").append('<option  value="'+element['idrol']+'">'+element['rol']+'</option>');
							});
						}); 
						//MODIFICAR DATOS USUARIOS//
						$('#GuardarData').off().click(function(){
							var info="Debe ingresar todos los datos";
							var nombre = $('#nombre').val(); if(nombre==""){alert(info); $("#nombre").css("borderColor", "red");slide().stop();}
							var apellido = $('#apellido').val(); if(apellido==""){alert(info); $("#apellido").css("borderColor", "red"); slide().stop(); }
							var nit = $('#nit').val(); if(nit==""){alert(info); $("#nit").css("borderColor", "red");slide().stop();}
							var dpi = $('#dpi').val(); if(dpi==""){alert(info); $("#dpi").css("borderColor", "red");slide().stop();}
							var nacimiento = $('#nacimiento').val(); if(nacimiento==""){alert(info); $("#nacimiento").css("borderColor", "red");slide().stop();}
							var usuario=$('#usuario').val(); if(usuario==""){alert(info); $("#usuario").css("borderColor", "red");slide().stop();}
							var file_upload=$('#file-upload').val(); 
							var Select_Rol=$('#Select_Rol').val(); if(Select_Rol=="0"){alert(info); $("#Select_Rol").css("borderColor", "red");slide().stop();  }
							
							$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_USER.php", async: true , data: {a0: 6,nombre:nombre,apellido:apellido,dpi:dpi,nit:nit,nacimiento:nacimiento,usuario:usuario,Select_Rol:Select_Rol,id_usuario:id_usuario}})
							.done(function(stream) {
								var lasid = id_usuario;
								//CARGAR FOTO USUARIO//
								if($("#file-upload").prop("files").length > 0){ 
									var form_data = new FormData();	
									var files = $("#file-upload").prop("files");
									for (var i = 0; i < files.length; i++) {
										form_data.append("file"+i, files.item(i));
									};
									form_data.append("a0", 4);
									form_data.append("lasid",lasid);
									$.ajax({
										url: "../php/SAFIG_ADMIN_USER.php",                         
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
								  title: 'Usuario Modificado',
								  showConfirmButton: false,
								  timer: 2000
								}).then((result) => {
									location.reload();
								  });
							});
							
						}); 
					});
				});	
				//CAMBIAR CONTRASENA//
				$('.pass_change').off().click(function(){
					var id_usuario = $(this).attr("id_usuario");
					$("#sm_modal_title").remove();
					$("#sm_modal_apply_button").html("Cambiar");	
					$("#sm_modal_content").html(
					"	<div class='row'>"+
					"		<div class='col-12 ' id='change' >"+
					"			<div class='card card-secondary'>"+
					"				<div class='card-body'>"+
					"					<div class='row'>"+
					"						<div class='col-sm-12'>"+
					"							<div class='form-group'>"+
					"								<label><i class='fa fa-users'>&nbsp; </i>  Cambio de Contraseña  :</label>"+
					"								<input class='form-control'  type='pass' id='pass_mod'  value='Password1.' placeholder='*******' />"+
					"							</div>"+				
					"						</div>"+
					"					</div>"+
					"				</div>"+
					"			</div>"+
					"		</div>"+
					"	</div>");
					
					function generatePasswordRand(Longitud) {
						characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789+-*/";
						var pass = "";
						for (i=0; i < Longitud; i++){
							//pass += String.fromCharCode((Math.floor((Math.random() * 100)) % 94) + 33);
							pass += characters.charAt(Math.floor(Math.random()*characters.length));
						}
						return pass;
					}
					var result = generatePasswordRand(5);
					//$('#pass_mod').val(result);
					$('#pass_mod').attr('readonly', true);
					$('#sm_modal').modal({backdrop: 'static', keyboard: false})
					
					$("#sm_modal_apply_button").off().click(function(){
						var Pass_Change = $('#pass_mod').val();
						var CodeSha = hex_sha512(Pass_Change);
						
						$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_USER.php", async: true, data: {a0: 7, id_usuario: id_usuario,CodeSha:CodeSha}})
						.done(function(stream) {
							Swal.fire({
							  //position: 'top-end',
							  icon: 'success',
							  title: 'Contraseña Modificada',
							  showConfirmButton: false,
							  timer: 2000
							}).then((result) => {
								location.reload();
							  });
							
						});
					}); 	
				});
				//deshabilitar usuario//
				$('.user_down').off().click(function(){
					var id_usuario = $(this).attr("id_usuario");
					ConfirmarEliminar(id_usuario);
					
					function ConfirmarEliminar(id_usuario){
						var respuesta = confirm("Estas seguro?, vas  a  deshabilitar al usuario?");
						if(respuesta == false){
							location.reload();
						}else{
							$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_USER.php", async: true, data: {a0: 8, id_usuario: id_usuario}})
							.done(function(stream) {
								Swal.fire({
								  //position: 'top-end',
								  icon: 'success',
								  title: 'Usuario Deshabilitado',
								  showConfirmButton: false,
								  timer: 2000
								}).then((result) => {
									location.reload();
								  });
							});
						}
					}	
				}); 
				//eliminar  usuario//
				$('.delite_user').off().click(function(){
					var id_usuario = $(this).attr("id_usuario");
					ConfirmarEliminar(id_usuario);
					
					function ConfirmarEliminar(id_usuario){
						var respuesta = confirm("Estas seguro?, vas  a  eliminar al usuario?");
						if(respuesta == false){
							location.reload();
						}else{
							$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_USER.php", async: true, data: {a0: 9, id_usuario: id_usuario}})
							.done(function(stream) {
								Swal.fire({
								  //position: 'top-end',
								  icon: 'success',
								  title: 'Usuario Eliminado',
								  showConfirmButton: false,
								  timer: 2000
								}).then((result) => {
									location.reload();
								  });
							});
						}
					}	
				}); 
				//activar  usuario//
				$('.user_active').off().click(function(){
					var id_usuario = $(this).attr("id_usuario");
					ConfirmarEliminar(id_usuario);
					
					function ConfirmarEliminar(id_usuario){
						var respuesta = confirm("Estas seguro?, vas  a  Activar  al usuario?");
						if(respuesta == false){
							location.reload();
						}else{
							$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_USER.php", async: true, data: {a0: 10, id_usuario: id_usuario}})
							.done(function(stream) {
								Swal.fire({
								  //position: 'top-end',
								  icon: 'success',
								  title: 'Usuario Activado',
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

	function New_User(){
		$("#lg_modal_title").html("Crear Usuario");
		$("#lg_modal_apply_button").remove();	
		$("#lg_modal_content").html(
		"	<div class='row'>"+
		"		<h4 class='w-100 text-center pt-2 pb-3'>Registrar Usuario</h4>"+
		"			<div class='col-12 ' id='User' >"+
		"			<div class='card card-secondary'>"+
		"				<div class='card-body'>"+
		"					<div class='row'>"+
		"						<div class='col-sm-4'>"+
		"							<div class='form-group'>"+
		"								<label><i class='fa fa-users'>&nbsp; </i> Nombre  :</label>"+
		"								<input class='form-control'  type='text'id='nombre'  placeholder='Ingrese nombre' />"+
		"							</div>"+				
		"						</div>"+
		"						<div class='col-sm-4'>"+
		"							<div class='form-group'>"+
		"								<label> <i class='fa fa-users'>&nbsp; </i>Apellido: </label>"+
		"								<input   class='form-control' type='text'  placeholder='Ingrese apellido' id='apellido'  />"+
		"							</div>"+				
		"						</div>"+
		"						<div class='col-sm-4'>"+
		"							<div class='form-group'>"+
		"								<label> <i class='fa fa-list'>&nbsp; </i>DPI: </label>"+
		"								<input   class='form-control' type='text'  placeholder='ingrese DPI' id='dpi'/>"+
		"							</div>"+				
		"						</div>"+
		"					</div>"+
		"					<div class='row'>"+		
		"						<div class='col-sm-6'>"+
		"							<div class='form-group'>"+
		"								<label> <i class='fa fa-list'>&nbsp; </i>Nit: </label>"+
		"								<input   class='form-control' type='text'  placeholder='ingrese Numero de NIT' id='nit'/>"+
		"							</div>"+				
		"						</div>"+					
		"						<div class='col-sm-6'>"+
		"							<div class='form-group'>"+
		"								<label><i class='fa fa-calendar'>&nbsp; </i> Fecha de Nacimiento</label>"+
		"								<input class='form-control'  type='date'  id='nacimiento' />"+
		"							</div>"+				
		"						</div>"+
		"					</div>"+
		"					<div class='progress'>"+
		"						<div class='progress-bar bg-info' role='progressbar' style='width: 100%' aria-valuenow='75' aria-valuemin='0' aria-valuemax='100'></div>"+
		"					</div>"+
		"					<div class='row pt-4'>"+
		"						<div class='col-sm-4'>"+
		"							<div class='form-group'>"+
		"								<label> <i class='fa fa-user'>&nbsp; </i> Usuario: </label>"+
		"								<input class='form-control'  type='text' placeholder='carlos@safig.com'  id='usuario' />"+
		"							</div>"+				
		"						</div>"+
		"						<div class='col-sm-4'>"+
		"							<div class='form-group'>"+
		"								<label> <i class='fa fa-photo'>&nbsp; </i> Password: </label>"+
		"								<input class='form-control'  type='password' value='Password1.'  id='Password' />"+
		"							</div>"+				
		"						</div>"+
		"						<div class='col-sm-4'>"+
		"							<div class='form-group'>"+
		"								<label> <i class='fa fa-img'>&nbsp; </i> Foto: </label>"+
		"								<input id='file-upload' type='file' name='file-upload' multiple />"+
		"							</div>"+				
		"						</div>"+		
		"					</div>"+
		"					<div class='row'>"+
		"						<div class='col-sm-12'>"+
		"							<div class='form-group'>"+
		"								<label> <i class='fa fa-img'>&nbsp; </i> Rol: </label>"+
		"								<select class='form-control' type='text' id='Select_Rol' ></select>"+
		"							</div>"+				
		"						</div>"+		
		"					</div>"+
		"				</div>"+
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
		"	</div>"+
		"	</div>"
			
		);
		//CARGAR ROLES//
		$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_USER.php", async: true , data: {'a0': 2}})
		.done(function(stream) {	
			data = jQuery.parseJSON(stream);
			$("#Select_Rol").append('<option  value="0" selected="selected">Seleccione el rol que tendra</option>');
			data.forEach(function(element, index, array){
				$("#Select_Rol").append('<option  value="'+element['idrol']+'">'+element['rol']+'</option>');
			});
		}); 
		
		$('#lg_modal').modal({backdrop: 'static', keyboard: false})

		//GUARDAR USUARIO//
		$('#GuardarData').off().click(function(){
			var info="Debe ingresar todos los datos";
			var nombre = $('#nombre').val(); if(nombre==""){alert(info); $("#nombre").css("borderColor", "red");slide().stop();}
			var apellido = $('#apellido').val(); if(apellido==""){alert(info); $("#apellido").css("borderColor", "red"); slide().stop(); }
			var nit = $('#nit').val(); if(nit==""){alert(info); $("#nit").css("borderColor", "red");slide().stop();}
			var dpi = $('#dpi').val(); if(dpi==""){alert(info); $("#dpi").css("borderColor", "red");slide().stop();}
			var nacimiento = $('#nacimiento').val(); if(nacimiento==""){alert(info); $("#nacimiento").css("borderColor", "red");slide().stop();}
			var usuario=$('#usuario').val(); if(usuario==""){alert(info); $("#usuario").css("borderColor", "red");slide().stop();}
			var Password=$('#Password').val(); if(Password==""){alert(info); $("#Password").css("borderColor", "red");slide().stop();  }
			var file_upload=$('#file-upload').val(); if(file_upload==""){alert(info); $("#file-upload").css("borderColor", "red");slide().stop();  }
			var Select_Rol=$('#Select_Rol').val(); if(Select_Rol=="0"){alert(info); $("#Select_Rol").css("borderColor", "red");slide().stop();  }
			var CodeSha = hex_sha512(Password);
			
			$.ajax({type: "POST", url: "../php/SAFIG_ADMIN_USER.php", async: true , data: {a0: 3,nombre:nombre,apellido:apellido,dpi:dpi,nit:nit,nacimiento:nacimiento,usuario:usuario,Select_Rol:Select_Rol,CodeSha:CodeSha}})
			.done(function(stream) {
				var lasid = stream;
				//CARGAR FOTO USUARIO//
				if($("#file-upload").prop("files").length > 0){ 
					var form_data = new FormData();	
					var files = $("#file-upload").prop("files");
					for (var i = 0; i < files.length; i++) {
						form_data.append("file"+i, files.item(i));
					};
					form_data.append("a0", 4);
					form_data.append("lasid",lasid);
					$.ajax({
						url: "../php/SAFIG_ADMIN_USER.php",                         
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
				  title: 'Usuario Creado',
				  showConfirmButton: false,
				  timer: 2000
				}).then((result) => {
					location.reload();
				  });
			});
		}); 
	}
	
	function PDF_USER(){
		window.open('../print/SAFIG_REPORT_USER.php');
	}

	