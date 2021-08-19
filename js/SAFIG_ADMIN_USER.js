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
		console.log(data);
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
			$("#listadoregistros2_tr_"+index).append("<td><img src='../img/user/" + element['foto'] + "'width='60' height='60'></td>");
			$("#listadoregistros2_tr_"+index).append("<td>"+element['rol']+"</td>");
			$("#listadoregistros2_tr_"+index).append("<td class="+EstadoClass1+">"+element['estado']+"</td>");
			$("#listadoregistros2_tr_"+index).append("<td>"+
				"<button title='Modificar' class='btn btn-info mr-2 mod_user' id_usuario='"+element['ID_USUARIO']+"'><i class='fa fa-undo'></i></button>"+
				"<button title='Generar Token' class='btn btn-success mr-2 gen_auth_code' id_usuario='"+element['ID_USUARIO']+"'><i class='fa fa-lock'></i></button>"+
				"<button title='eliminar' class='btn btn-danger mr-2 delite_user' id_usuario='"+element['ID_USUARIO']+"'><i class='fa fa-trash'></i></button></td>");
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
					$.ajax({type: "POST", url: "../php/TOWER_ADMIN_USER.php", async: true, data: {a0: 5, id_usuario:id_usuario}})
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
						"						<div class='col-sm-6'>"+
						"							<div class='form-group'>"+
						"								<label><i class='fa fa-users'>&nbsp; </i> Nombre  :</label>"+
						"								<input class='form-control'  type='text'id='Usuario'  value="+data1[0]['USUARIO']+" placeholder='Ingrese nombre del usuario' />"+
						"							</div>"+				
						"						</div>"+
						"						<div class='col-sm-6'>"+
						"							<div class='form-group'>"+
						"								<label> <i class='fa fa-mail'>&nbsp; </i>Correo: </label>"+
						"								<input class='form-control' type='text'  placeholder='carlos@...'  value="+data1[0]['CORREO']+" id='Correo'/>"+
						"							</div>"+				
						"						</div>"+	
						"					</div>"+
						"					<div class='row'>"+
						"						<div class='col-sm-6'>"+
						"							<div class='form-group'>"+
						"								<label><i class='fa fa-num'>&nbsp; </i> Password</label>"+
						"								<input class='form-control' type='password' value="+data1[0]['PASSWORD']+" id='password1' placeholder='****' />"+
						"							</div>"+				
						"						</div>"+
						"						<div class='col-sm-6'>"+
						"							<div class='form-group'>"+
						"								<label> <i class='fa fa-user'>&nbsp; </i> Institucion: </label>"+
						"								<select class='form-control' type='text'  id='Select_Institucion' ></select>"+
						"							</div>"+				
						"						</div>"+	
						"					</div>"+
						"					<div class='row'>"+
						"						<div class='col-sm-6'>"+
						"							<div class='form-group'>"+
						"								<label> <i class='fa fa-list'>&nbsp; </i>  Rol:  </label>"+
						"								<select class='form-control' type='text' id='Select_Rol' ></select>"+
						"							</div>"+
						"						</div>"+
						"						<div class='col-sm-6'>"+
						"							<div class='form-group'>"+
						"								<label> <i class='fa fa-check'>&nbsp; </i>  Estado:  </label>"+
						"								<select class='form-control' type='text' id='Select_Estado' ></select>"+
						"							</div>"+
						"						</div>"+
						"					</div>"+
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
						//CARGAR LISTADO INSITUCIONES//
						$.ajax({type: "POST", url: "../php/TOWER_ADMIN_USER.php", async: true , data: {'a0': 6,id_usuario:id_usuario}})
						.done(function(stream) {	
							data = jQuery.parseJSON(stream);
							$("#Select_Institucion").append('<option  value='+data1[0]['ID_INSTITUCION']+' selected="selected">'+data1[0]['INSTITUCION']+'</option>');
							data.forEach(function(element, index, array){
								$("#Select_Institucion").append('<option  value="'+element['ID_INSTITUCION']+'">'+element['NOMBRE']+'</option>');
							});
						}); 
						//CARGAR ROLES//
						$.ajax({type: "POST", url: "../php/TOWER_ADMIN_USER.php", async: true , data: {'a0': 7}})
						.done(function(stream) {	
							data = jQuery.parseJSON(stream);
							$("#Select_Rol").append('<option  value='+data1[0]['ID_ROL']+' selected="selected">'+data1[0]['ROL']+'</option>');
							data.forEach(function(element, index, array){
								$("#Select_Rol").append('<option  value="'+element['ID_ROL']+'">'+element['NOMBRE']+'</option>');
							});
						}); 
						
						//CARGAR ESTADOS//
						$.ajax({type: "POST", url: "../php/TOWER_ADMIN_USER.php", async: true , data: {'a0': 10}})
						.done(function(stream) {	
							data = jQuery.parseJSON(stream);
							$("#Select_Estado").append('<option  value='+data1[0]['ID_ESTADO']+' selected="selected">'+data1[0]['ESTADO']+'</option>');
							data.forEach(function(element, index, array){
								$("#Select_Estado").append('<option  value="'+element['ID_ESTADO']+'">'+element['NOMBRE']+'</option>');
							});
						}); 
						
						$('#lg_modal').modal({backdrop: 'static', keyboard: false})
						//GUARDAR MODIFICACION//
						$('#GuardarData').off().click(function(){
							var info = "Debe ingresar todos los datos";
							var Usuario = $('#Usuario').val(); if(Usuario==""){alert(info); $("#Usuario").css("borderColor", "red");slide().stop();}
							var Correo = $('#Correo').val(); if(Correo==""){alert(info); $("#Correo").css("borderColor", "red"); slide().stop(); }
							var password1 = $('#password1').val(); if(password1==""){alert(info); $("#password1").css("borderColor", "red");slide().stop();}
							var Select_Institucion = $('#Select_Institucion').val(); if(Select_Institucion==""){alert(info); $("#Select_Institucion").css("borderColor", "red");slide().stop();}
							var Select_Rol=$('#Select_Rol').val(); if(Select_Rol==""){alert(info); $("#Select_Rol").css("borderColor", "red");slide().stop();  }
							console.log(Usuario);
							
							$.ajax({type: "POST", url: "../php/TOWER_ADMIN_USER.php", async: true , data: {a0: 8,Usuario:Usuario,Correo:Correo,password1:password1,Select_Institucion:Select_Institucion,Select_Rol:Select_Rol,id_usuario:id_usuario}})
							.done(function(stream) {
								console.log(stream);
								alert('Usuario Modificado');
								location.reload();
							});		
						}); 
						
						
					});
				});	
				$('.delite_user').off().click(function(){
					var id_usuario = $(this).attr("id_usuario");
					ConfirmarEliminar(id_usuario);
					
					function ConfirmarEliminar(id_usuario){
						var respuesta = confirm("Estas seguro?, vas  a eliminar al usuario");
						if(respuesta == false){
							location.reload();
						}else{
							$.ajax({type: "POST", url: "../php/TOWER_ADMIN_USER.php", async: true, data: {a0: 9, id_usuario: id_usuario}})
							.done(function(stream) {
								console.log(stream);
								location.reload();
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
		"						<div class='col-sm-6'>"+
		"							<div class='form-group'>"+
		"								<label><i class='fa fa-users'>&nbsp; </i> Nombre  :</label>"+
		"								<input class='form-control'  type='text'id='Usuario'  placeholder='Ingrese nombre del usuario' />"+
		"							</div>"+				
		"						</div>"+
		"						<div class='col-sm-6'>"+
		"							<div class='form-group'>"+
		"								<label> <i class='fa fa-mail'>&nbsp; </i>Correo: </label>"+
		"								<input   class='form-control' type='text'  placeholder='carlos@...' id='Correo' name='Correo' />"+
		"							</div>"+				
		"						</div>"+	
		"					</div>"+
		"					<div class='row'>"+
		"						<div class='col-sm-6'>"+
		"							<div class='form-group'>"+
		"								<label><i class='fa fa-num'>&nbsp; </i> Password</label>"+
		"								<input class='form-control' id='password1' placeholder='****' />"+
		"							</div>"+				
		"						</div>"+
		"						<div class='col-sm-6'>"+
		"							<div class='form-group'>"+
		"								<label> <i class='fa fa-user'>&nbsp; </i> Institucion: </label>"+
		"								<select class='form-control' type='text' id='Select_Institucion' ></select>"+
		"							</div>"+				
		"						</div>"+	
		"					</div>"+
		"					<div class='row'>"+
		"						<div class='col-sm-12'>"+
		"							<div class='form-group'>"+
		"								<label> <i class='fa fa-list'>&nbsp; </i>  Rol:  </label>"+
		"								<select class='form-control' type='text' id='Select_Rol' ></select>"+
		"							</div>"+
		"						</div>"+
		"					</div>"+
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
		//CARGAR LISTADO INSITUCIONES//
		$.ajax({type: "POST", url: "../php/TOWER_ADMIN_USER.php", async: true , data: {'a0': 2}})
		.done(function(stream) {	
			data = jQuery.parseJSON(stream);
			$("#Select_Institucion").append('<option  value="0" selected="selected">Seleccione Institucion</option>');
			data.forEach(function(element, index, array){
				$("#Select_Institucion").append('<option  value="'+element['ID_INSTITUCION']+'">'+element['NOMBRE']+'</option>');
			});
		}); 
		
		$('#lg_modal').modal({backdrop: 'static', keyboard: false})

		//GUARDAR USUARIO//
		$('#GuardarData').off().click(function(){
			var info="Debe ingresar todos los datos";
			var Usuario = $('#Usuario').val(); if(Usuario==""){alert(info); $("#Usuario").css("borderColor", "red");slide().stop();}
			var Correo = $('#Correo').val(); if(Correo==""){alert(info); $("#Correo").css("borderColor", "red"); slide().stop(); }
			var password1 = $('#password1').val(); if(password1==""){alert(info); $("#password1").css("borderColor", "red");slide().stop();}
			var Select_Institucion = $('#Select_Institucion').val(); if(Select_Institucion==""){alert(info); $("#Select_Institucion").css("borderColor", "red");slide().stop();}
			var Select_Rol=$('#Select_Rol').val(); if(Select_Rol==""){alert(info); $("#Select_Rol").css("borderColor", "red");slide().stop();  }
			
			$.ajax({type: "POST", url: "../php/TOWER_ADMIN_USER.php", async: true , data: {a0: 4,Usuario:Usuario,Correo:Correo,password1:password1,Select_Institucion:Select_Institucion,Select_Rol:Select_Rol}})
			.done(function(stream) {
				console.log(stream);
				alert('Usuario Creado');
				location.reload();
			});			
		}); 
		
	}
	
	function PDF_USER(){
		window.open('../print/TOWER_REPORT_USERT.php');
	}

	