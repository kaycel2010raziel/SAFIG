<?php 
	include '../php/default/login_functions.php';
	include '_sidemenu.php';
	sec_session_start();
	/*ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	*/
	$rol_id = get_rol_id();
	if($rol_id==2)
	{
	$user_id = get_uid();
	$name_query = read("SELECT USUARIO.NOMBRE AS USUARIO,INSTITUCION.SIGLAS FROM USUARIO JOIN INSTITUCION ON INSTITUCION.ID_INSTITUCION=USUARIO.FK_INSTITUCION WHERE USUARIO.ID_USUARIO=$user_id", $Towerdb);
	$name = (sizeof($name_query) > 0 ? $name_query[0]['USUARIO'] : 'undefined');
	$siglas = (sizeof($name_query) > 0 ? $name_query[0]['SIGLAS'] : 'undefined');
	
	//$foto_query = read("SELECT FOTO FROM GENERAL_EMPLEADO WHERE USERID = '$user_id'", $siedb);
	//$foto = (sizeof($foto_query) > 0 ? "lib/img/empleados/".$foto_query[0]['FOTO'] : 'lib/img/avatar.png');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	  <?php echo header_style();?>
	  <script type="text/javascript" src="../js/TOWER_ADMIN_USER.js"></script>
	  <script type="text/javascript" src="../js/Timeout_login.js"></script>
	</head>
	<body class="hold-transition sidebar-mini">
		<div class="wrapper">
		  <!-- Navbar -->
		  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<ul class="navbar-nav">
			  <li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
			  </li>
			</ul>
			<ul class="navbar-nav">
			  <li class="nav-item-Button">
			  </li>
			</ul>
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item">
				<a class="nav-link" data-widget="fullscreen" href="#" role="button">
				  <i class="fas fa-expand-arrows-alt"></i>
				</a>
			  </li>
			  <div class="dropdown">
				<?php echo get_side_logout();?>
			  </div>
			</ul>
		  </nav>
		  <!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-primary elevation-4">
				<!-- Brand Logo -->
				<a href="TOWER_ADMIN.php" class="brand-link">
					<img src="../img/LogoTorre.jpg" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
					<span class="brand-text font-weight-light">Torre <span><?php echo $siglas;?></span></span>
				</a>
				<!-- Sidebar -->
				<div class="sidebar">
					<!-- Sidebar user panel (optional) -->
					<div class="user-panel mt-3 pb-3 mb-3 d-flex">
						<div class="image">
							<img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
						</div>
						<div class="info">
							<a href="#" class="d-block"><?php echo $name;?></a>
						</div>
					</div>
					<!-- Sidebar Menu -->
					<nav class="mt-2">
					<?php echo get_sidemenu();?>
					</nav>
				</div>
			</aside>
		  <!-- Content Wrapper. Contains page content -->
		  <div class="content-wrapper">
			<!-- Main content -->
				<div class='row' id='Crear_Tabla'></div>
			
			<!-- /.content -->
		  </div>
		 
		   <!-- /.content-wrapper -->
		  <?php echo Footer_style();?>
		  <!-- /.control-sidebar -->
		  <?php echo Modals();?>
		</div>
		<!-- ./wrapper -->
		<?php echo library();?>
	</body>
</html>
<?php 

	}else
	{
		$rol_id = get_rol_id();
		switch ($rol_id){
		case 0:
				header("Location: /index.html");
				exit();
				break;
		case 1: 
				header("Location: /pages/TOWER_OPERADOR.php");
				exit();
				break;
		case 2:
				header("Location: /pages/TOWER_ADMIN.php");
				exit();
				break;
		case 3:
				header("Location: /pages/TOWER_SUPERSU.php");
				exit();
				break;
		default:header("Location: /index.html");
				exit();
		
	}
	}

?>