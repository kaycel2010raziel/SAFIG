<?php 
	include '../php/default/login_functions.php';
	include '_sidemenu.php';
	sec_session_start();
	if (isset($_SESSION['user_id'])){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$rol_id = get_rol_id();
		if($rol_id==1){
			$user_id = get_eid();
			$name_query = read("SELECT concat(us.nombre,' ',us.apellido) as usuario,us.foto,rol.nombre as rol FROM usuario as us join rol on rol.idrol=us.fkrol WHERE us.idusuario=$user_id",$Safigdb);
			$name = (sizeof($name_query) > 0 ? $name_query[0]['usuario'] : 'undefined');
			$rol = (sizeof($name_query) > 0 ? $name_query[0]['rol'] : 'undefined');
			$foto = (sizeof($name_query) > 0 ? "../img/user/".$name_query[0]['foto'] : 'img/logos/Avatar_Admin.jpg');
			//echo json_encode($user_id);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	   <?php echo header_style();?>
		<script type="text/javascript" src="../js/SAFIG_ADMIN_PHARMACY.js"></script>
		<script type="text/javascript" src="../js/login_sha512.js"></script>		
		<script type="text/javascript" src="../js/Timeout_login.js"></script>
	</head>
	<body class="hold-transition sidebar-mini">
		<div class="wrapper">
		  <!-- Navbar -->
		  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
			  <li class="nav-item-buttons">
				<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
			  </li>
			</ul>
			<ul class="navbar-nav">
			  <li class="nav-item-Button">
			  </li>
			</ul>
			<!-- Right navbar links -->
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
		  <!-- /.navbar -->
		  <!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-primary elevation-4">
				<!-- Brand Logo -->
				<a href="SAFIG_ADMIN.php" class="brand-link">
					<img src="../img/logos/SAFIG_LOGO.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
					<span class="brand-text font-weight-light">SAFIG | <span><?php echo $rol;?></span></span>
				</a>
				<!-- Sidebar -->
				<div class="sidebar">
					<!-- Sidebar user panel (optional) -->
					<div class="user-panel mt-3 pb-3 mb-3 d-flex">
						<div class="image">
							<img src="<?php echo $foto; ?>" class="img-circle elevation-2" alt="User Image">
						</div>
						<div class="info">
							<a href="#" class="d-block"><?php echo $name;?></a>
						</div>
					</div>
					<!-- Sidebar Menu -->
					<nav class="mt-2">
					<?php echo get_sidemenu_admin();?>
					</nav>
				</div>
			</aside>
		  <!-- Content Wrapper. Contains page content -->
		  <div class="content-wrapper">
			<div class="container-fluid" id="table_user">
				
			</div>
			
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
	}else{
		$rol_id = get_rol_id();
		switch ($rol_id){
			case 0:
					header("Location: ../index.php");
					exit();
					break;
			case 1: 
					header("Location: pages/SAFIG_ADMIN.php");
					exit();
					break;
			case 2:
					header("Location: ../index.php");
					exit();
					break;
			case 3:
					header("Location: ../index.php");
					exit();
					break;
			default:header("Location: ../index.php");
					exit();
			
		}
	}
}else{
	header("Location: ../index.php");
}

?>
