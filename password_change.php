<?php 
	include 'php/default/login_functions.php';
	sec_session_start();
	if(!isset($_SESSION['user_id'])){header("Location: logout.php");}
	//if(pwd_change_check() != 1){header("Location: logout.php");}	
?>	

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Torre Control | Cambio de Contraseña</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="js/login_sha512.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
	  <div class="login-logo">
		<a href="#"><strong>Torre</strong>Cambio de Contraseña</a>
	  </div>
	  <!-- /.login-logo -->
	  <div class="card">
		<div class="card-body login-card-body">
		  <p class="login-box-msg">Ingrese Nueva Contraseña </p>

		  <form action="php\default\password_change.php" method="post">
			<div class="form-group has-feedback">
			  <input name="password1" id="new_Password" type="password" class="form-control" placeholder="Nueva Contraseña">
			</div>
			<div class="form-group has-feedback">
			  <input name="password2" id="new_Password_Comfirm" type="password" class="form-control" placeholder="Ingrese Nuevamente">
			</div>
			<div class="row">
			  <div class="col-12">
				<button type="submit"  onclick="validatePassword(this.form)" class="btn btn-primary btn-block btn-flat">Cambiar Contraseña</button>
			  </div>
			  <!-- /.col -->
			</div>
		  </form>
		</div>
		<!-- /.login-card-body -->
	  </div>
	</div>
<!-- /.login-box -->
<script>
	
	
	function validatePassword(form) {
		var p1 = document.getElementById('new_Password').value;
		var p2 = document.getElementById('new_Password_Comfirm').value;
		var errors = [];
		if(p1 == p2){
			if (p1.length >= 8) {
				var min = (p1.match(/[a-z]/g) || []).length;
				var may = (p1.match(/[A-Z]/g) || []).length;
				var num = (p1.match(/[0-9]/g) || []).length;
				var esp = (p1.match(/[\.!#%&@~\|]/g) || []).length;
				
				if(min == 0){errors.push("Su contraseña debe contener al menos 1 letra minúscula");}
				if(may == 0){errors.push("Su contraseña debe contener al menos 1 letra mayúscula");}
				if(num == 0){errors.push("Su contraseña debe contener al menos 1 número");}
				if(esp == 0){errors.push("Su contraseña debe contener al menos 1 caracter especial .!@#%&~|");}
				
			} else {
				errors.push("Su contraseña debe tener al menos 8 caracteres");
			}
		} else {
			errors.push("Las contraseñas no son iguales");
		}
			

		if (errors.length > 0) {
			alert(errors.join("\n"));
			return false;
		}
		var p = document.createElement("input");
		form.appendChild(p);
		p.name = "p";
		p.type = "hidden";	
		p.value = hex_sha512(p1);
		document.getElementById('new_Password').value = "";
		document.getElementById('new_Password_Comfirm').value = "";

		form.submit();
	}
</script>
	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
