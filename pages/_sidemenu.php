<?php

function get_sidemenu_admin(){
	echo '
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		<!-- Add icons to the links using the .nav-icon class
		with font-awesome or any other icon font library -->
			<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="nav-icon fas fa-user-alt"></i>
					<p>ADMIN USUARIOS<i class="right fas fa-angle-left"></i></p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="SAFIG_ADMIN_USER.php" class="nav-link">
							<i class="far fa-user nav-icon"></i>
							<p>USUARIOS</p>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="nav-icon fas fa-home"></i>
					<p>FARMACIAS<i class="right fas fa-angle-left"></i></p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="nav-icon fas fa-check"></i>
							<p>REGISTAR</p>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="nav-icon fas fa-flask"></i>
					<p>LABORATORIOS<i class="right fas fa-angle-left"></i></p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="nav-icon fas fa-check"></i>
							<p>REGISTAR</p>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="nav-icon fas fa-file"></i>
					<p>REPORTES<i class="right fas fa-angle-left"></i></p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="fas fa-list nav-icon"></i>
							<p>LISTAR</p>
						</a>
					</li>
				</ul>
			</li>
		</ul>
	';
}
function get_sidemenu_operador(){
	echo '
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		<!-- Add icons to the links using the .nav-icon class
		with font-awesome or any other icon font library -->
			<li class="nav-item">
				<a href="TOWER_OPERADOR.php" class="nav-link">
					<i class="nav-icon fas fa-calendar"></i>
					<p>ADMIN EVENTOS<i class="right fas fa-angle-left"></i></p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="TOWER_OPERADOR_CALENDAR.php" class="nav-link">
							<i class="nav-icon fas fa-check"></i>
							<p>CREAR EVENTOS</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="TOWER_OPERADOR_MOSTRAR_EVENTOS.php" class="nav-link">
							<i class="nav-icon fas fa-eye"></i>
							<p>MOSTRAR EVENTOS</p>
						</a>
					</li>
				</ul>
			</li>
		</ul>
	';
}
function get_sidemenu_supersu(){
	echo '
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		<!-- Add icons to the links using the .nav-icon class
		with font-awesome or any other icon font library -->
			<li class="nav-item">
				<a href="TOWER_SUPERSU.php" class="nav-link">
					<i class="nav-icon fas fa-calendar"></i>
					<p>EVENTOS<i class="right fas fa-angle-left"></i></p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="TOWER_SUPERSU_CALENDAR_MULTI.php" class="nav-link">
							<i class="nav-icon fas fa-check"></i>
							<p>CALENDARIO</p>
						</a>
					</li>
				</ul>
			</li>
		</ul>
	';
}



function header_style(){
	echo '	<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>SAFIG | SALE</title>
			<!-- Font Awesome -->
			<link rel="icon" href="/img/logos/SAFIG_LOGO.ico" type="image/x-icon">
			<script src="../plugins/jquery/jquery_tower.min.js"></script>
			<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
			<link rel="stylesheet" href="../plugins/datatables/datatables.css">
			<!-- fullCalendar -->
			<link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
			<link rel="stylesheet" href="../plugins/timepicker/jquery.timepicker.css">
			<link rel="stylesheet" href="../plugins/fullcalendar/3.10.0/fullcalendar.css">
			<link rel="stylesheet" href="../plugins/select2/css/select2.css">
			<link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.css">
			<link rel="stylesheet" href="../plugins/fpdf/fpdf.css">
			<link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css">
			<!-- LEAFLET----->
			<link rel="stylesheet" href="../plugins/leaflet/leaflet.css">
			<!-- Theme style -->
			<link rel="stylesheet" href="../dist/css/adminlte.min.css">';
			
			
	
}
function Footer_style(){
	echo '<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
			  <b>Version</b> 1.0
			</div>
			<strong>Copyright &copy; 2021-2021 <a href="#">...</a>.</strong>
		  </footer>';
	
}

function library(){
	echo '	<!-- jQuery -->
			<script src="../plugins/jquery/jquery.min.js"></script>
			<script src="../plugins/html2canvas/html2canvas.min.js"></script>
			<script src="../plugins/html2canvas/html2canvas.js"></script>
			<script src="../plugins/daterangepicker/moment.min.js"></script>
			<script type="text/javascript" src="../plugins/datatables/datatables.min.js"></script>
			<!-- Bootstrap -->
			<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
			<!-- jQuery UI -->
			<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
			<!-- AdminLTE App -->
			<script src="../dist/js/adminlte.min.js"></script>
			<!-- fullCalendar 2.2.5 -->
			<script src="../plugins/select2/js/select2.js"></script>
			<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
			<script src="../plugins/daterangepicker/daterangepicker.js"></script>
			<script src="../plugins/timepicker/jquery.timepicker.js"></script>
			<script src="../plugins/fullcalendar/moment.min.js"></script>
			<script src="../plugins/fullcalendar/3.10.0/fullcalendar.js"></script>
			<script src="../plugins/fullcalendar/3.10.0/locale/es.js"></script>
			<script src="../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
			
			<!-- LEAFLET--->
			<script src="../plugins/leaflet/leaflet.js"></script>
			<script src="../plugins/leaflet/Control.Geocoder.js"></script>
			<script src="../plugins/leaflet/Polyline.encoded.js"></script>
			<!-- AdminLTE for demo purposes -->
			<script src="../dist/js/demo.js"></script>';
	
}

function Modals(){
	echo '<!-- GENERIC MODAL LG-->
			<div class="modal fade" id="lg_modal" tabindex="-1" role="dialog" aria-labelledby="lg_modal_title" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="lg_modal_title"></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body size-limit" id="lg_modal_content"></div>
						<div class="modal-footer" id="lg_modal_footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<button type="button" class="btn btn-success" id="lg_modal_apply_button" ></button>
						</div>
					</div>
				</div>
			</div>			
			<!-- GENERIC MODAL XL-->
			<div class="modal fade" id="xl_modal" tabindex="-1" role="dialog" aria-labelledby="xl_modal_title" aria-hidden="true">
				<div class="modal-dialog modal-xl" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="xl_modal_title"></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body" id="xl_modal_content"></div>
						<div class="modal-footer" id="xl_modal_footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<button type="button" class="btn btn-success" id="xl_modal_apply_button" ></button>
						</div>
					</div>
				</div>
			</div>
			<!-- GENERIC MODAL SM-->
			<div class="modal fade" id="sm_modal" tabindex="-1" role="dialog" aria-labelledby="sm_modal_title" aria-hidden="true">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="sm_modal_title"></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body size-limit" id="sm_modal_content"></div>
						<div class="modal-footer" id="sm_modal_footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<button type="button" class="btn btn-success" id="sm_modal_apply_button" ></button>
						</div>
					</div>
				</div>
			</div>
			';
}
function get_side_logout(){
	echo ' 
		<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
		<div class="dropdown-menu text-center" aria-labelledby="dropdownMenu2">
			<a style="display: block;" class="btn btn-primary m-1 px-1" href="../password_change.php">Cambiar Contraseña</a>
			<a style="display: block;" class="btn btn-danger m-1  px-1" href="../logout.php">Cerrar Sesión</a>
		</div>';
}