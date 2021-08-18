<?php 
	include 'php/default/dbconnect.php';
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="description" content="">
	  <meta name="author" content="">
	  <title>SAFIG | SALE </title>
	  <script src="plugins/jquery/jquery.min.js"></script>
	  <script type="text/javascript" src="js/login_sha512.js"></script>
	  <script type="text/javascript" src="js/login_forms.js"></script>
	  <script type="text/javascript" src="js/CONSULTAS.js"></script>	
	  <!-- Bootstrap core CSS -->
	  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	  <!-- Custom fonts for this template -->
	  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
	  <!-- Custom styles for this template -->
	  <link href="css/agency.min.css" rel="stylesheet">
	</head>

	<body id="page-top">
	  <!-- Navigation -->
	  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
		<div class="container">
			<img src="img/logos/SAFIG_LOGO.png" style="height:8%; width:8%;border-radius:50%;border: black 2px solid;" alt="First slide">
			<a class="navbar-brand js-scroll-trigger" href="#page-top">SAGIF</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				Menu
				<i class="fas fa-bars"></i>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav text-uppercase ml-auto">
			  <li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="#services">Servicios</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="#Consultas">Consultas</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="#team">Conocenos</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="#contact" data-toggle="modal" data-target="#loginModal">Login</a>
			  </li>
			</ul>
		  </div>
		</div>
	  </nav>
	  <!-- Header -->
	  <header class="masthead">
		<div class="container">
		  <div class="intro-text">
			<div class="intro-lead-in" style=''>SAFIG SALE!</div>
			<div class="intro-heading text-uppercase">Tu medicina en segundos</div>
			<a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#Consultas">Consultas</a>
		  </div>
		</div>
	  </header>
	  <!-- Services -->
	  <section id="services">
		<div class="container">
		  <div class="row">
			<div class="col-lg-12 text-center">
			  <h2 class="section-heading text-uppercase">Servicios</h2>
			  <h3 class="section-subheading text-muted">Gestiona tus pedidos On-Line.</h3>
			</div>
		  </div>
		  <div class="row">
			<div class="col-lg-12 text-center">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				  <ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				  </ol>
				  <div class="carousel-inner col-12">
					<div class="carousel-item active">
					  <img class="d-block w-100" src="img/carrousel/promo1.JFIF " style="height:400px; border-radius: 2%;border: black 2px solid;" alt="First slide">
					</div>
					<div class="carousel-item">
					  <img class="d-block w-100" src="img/carrousel/promo2.JPG" style="height:400px; border-radius: 2%;border: black 2px solid;" alt="First slide">
					</div>
					<div class="carousel-item">
					   <img class="d-block w-100" src="img/carrousel/promo3.PNG" style="height:400px; border-radius: 2%;border: black 2px solid;" alt="First slide">
					</div>
				  </div>
				  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Anterior</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Siguiente</span>
				  </a>
			   </div>
			</div>
		 </div>
		  <div class="row text-center p-3">
			<div class="col-md-4">
			  <span class="fa-stack fa-4x">
				<i class="fas fa-circle fa-stack-2x text-primary"></i>
				<i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
			  </span>
			  <h4 class="service-heading">Compras On-Line</h4>
			  <p class="text-muted">Gestiona tus pedidos desde la comodidad de tu hogar.</p>
			</div>
			<div class="col-md-4">
			  <span class="fa-stack fa-4x">
				<i class="fas fa-circle fa-stack-2x text-primary"></i>
				<i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
			  </span>
			  <h4 class="service-heading">Catalogo  de precios</h4>
			  <p class="text-muted">Busca entre las diferentes casas farmaceuticas el precio y producto que mas te convenga.</p>
			</div>
			<div class="col-md-4">
			  <span class="fa-stack fa-4x">
				<i class="fas fa-circle fa-stack-2x text-primary"></i>
				<i class="fas fa-motorcycle fa-stack-1x fa-inverse"></i>
			  </span>
			  <h4 class="service-heading">Envios a Domicilio</h4>
			  <p class="text-muted">Tu pedido llegara a la puerta de tu casa.</p>
			</div>
		  </div>
		</div>
	  </section>
	  <!-- Consultas Grid -->
	  <section class="bg-light" id="Consultas">
		<div class="container">
		  <div class="row">
			<div class="col-lg-12 text-center">
			  <h2 class="section-heading text-uppercase">Consultas</h2>
			  <h3 class="section-subheading text-muted">Busca el producto que necesitas.</h3>
			</div>
		  </div>
		  <div class="row">
			
		  </div>
		  <div class="row" id="CasasFarmaceuticas">
			<div class='col-sm-3'>
				<div class='form-group'>
					<!--<label> <i class='fa fa-mail'>&nbsp; </i>Elige un color: </label>-->
					<img src="img/logos/GalenoImagen.png" alt="Gal" style="width:250px;height:250px; border-radius: 50%;border: black 2px solid;">
				</div>		
			</div>
			<div class='col-sm-3'>
				<div class='form-group'>
					<!--<label> <i class='fa fa-mail'>&nbsp; </i>Elige un color: </label>-->
					<img src="img/logos/BatresImagen.jpg" alt="Batr" style="width:250px;height:250px; border-radius: 50%;border: black 2px solid;">
				</div>		
			</div>
			<div class='col-sm-3'>
				<div class='form-group'>
					<!--<label> <i class='fa fa-mail'>&nbsp; </i>Elige un color: </label>-->
					<img src="img/logos/CruzVerdeImagen.png" alt="Cruz" style="width:250px;height:250px; border-radius: 50%;border: black 2px solid;">
				</div>		
			</div>
			<div class='col-sm-3'>
				<div class='form-group'>
					<!--<label> <i class='fa fa-mail'>&nbsp; </i>Elige un color: </label>-->
					<img src="img/logos/FarmaciasComunidadImagen.png" alt="Comunidad" style="width:250px;height:250px; border-radius: 50%;border: black 2px solid;">
				</div>		
			</div>
		  </div>
		</div>
	  </section>
	  <!-- Team -->
	  <section class="bg-light" id="team">
		<div class="container">
		  <div class="row">
			<div class="col-lg-12 text-center">
			  <h2 class="section-heading text-uppercase">Nuestro Equipo de Trabajo</h2>
			  <h3 class="section-subheading text-muted">Soñar más que otros es práctico.</h3>
			</div>
		  </div>
		  <div class="row">
			<div class="col-sm-4">
			  <div class="team-member">
				<img class="mx-auto rounded-circle" src="img/team/1.jpg" alt="">
				<h4>Kay Garland</h4>
				<p class="text-muted">Lead Designer</p>
				<ul class="list-inline social-buttons">
				  <li class="list-inline-item">
					<a href="#">
					  <i class="fab fa-twitter"></i>
					</a>
				  </li>
				  <li class="list-inline-item">
					<a href="#">
					  <i class="fab fa-facebook-f"></i>
					</a>
				  </li>
				  <li class="list-inline-item">
					<a href="#">
					  <i class="fab fa-linkedin-in"></i>
					</a>
				  </li>
				</ul>
			  </div>
			</div>
			<div class="col-sm-4">
			  <div class="team-member">
				<img class="mx-auto rounded-circle" src="img/team/2.jpg" alt="">
				<h4>Larry Parker</h4>
				<p class="text-muted">Lead Marketer</p>
				<ul class="list-inline social-buttons">
				  <li class="list-inline-item">
					<a href="#">
					  <i class="fab fa-twitter"></i>
					</a>
				  </li>
				  <li class="list-inline-item">
					<a href="#">
					  <i class="fab fa-facebook-f"></i>
					</a>
				  </li>
				  <li class="list-inline-item">
					<a href="#">
					  <i class="fab fa-linkedin-in"></i>
					</a>
				  </li>
				</ul>
			  </div>
			</div>
			<div class="col-sm-4">
			  <div class="team-member">
				<img class="mx-auto rounded-circle" src="img/team/3.jpg" alt="">
				<h4>Diana Pertersen</h4>
				<p class="text-muted">Lead Developer</p>
				<ul class="list-inline social-buttons">
				  <li class="list-inline-item">
					<a href="#">
					  <i class="fab fa-twitter"></i>
					</a>
				  </li>
				  <li class="list-inline-item">
					<a href="#">
					  <i class="fab fa-facebook-f"></i>
					</a>
				  </li>
				  <li class="list-inline-item">
					<a href="#">
					  <i class="fab fa-linkedin-in"></i>
					</a>
				  </li>
				</ul>
			  </div>
			</div>
		  </div>
		  <div class="row">
			<div class="col-lg-8 mx-auto text-center">
			  <p class="large text-muted">Sueña en grande y atrévete a fallar.</p>
			</div>
		  </div>
		</div>
	  </section>
	  
	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header border-bottom-0">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">  <!--style="background-image: url('img/logos/hexagono.png');"-->
					<div class="form-title text-center">
						<img src="img/logos/SAFIG_LOGO_TRANS.png" alt="SAG" style="width:30%;height:30%; border-radius: 50%;">
						<h4>Login | SAFIG </h4>
					</div>
					<div class="d-flex flex-column text-center">
						<form action="php\default\login_process.php" method="post">
							<div class="form-group has-feedback">
								<input name= "email" type="email" class="form-control" placeholder="Email" >
								<span class="fa fa-envelope form-control-feedback"></span>
							</div>
							<div class="form-group has-feedback">
								<input name = "password" type="password" class="form-control" placeholder="Password">
								<span class="fa fa-lock form-control-feedback"></span>
							</div>
							<div class="row">
								<div class="col-12">
									<button type="submit" onclick="formhash(this.form, this.form.password);" class="btn btn-info btn-block btn-flat">Ingresar</button>
								</div>
							</div>
						</form>
						<div class="text-center text-muted delimiter">Siguenos ...</div>
						<div class="d-flex justify-content-center social-buttons">
							<button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Twitter">
								<i class="fab fa-twitter"></i>
							</button>
							<button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Facebook">
								<i class="fab fa-facebook"></i>
							</button>
							<button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Linkedin">
								<i class="fab fa-linkedin"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	  <!-- Footer -->
	  <footer>
		<div class="container">
		  <div class="row">
			<div class="col-md-4">
			  <span class="copyright">Copyright &copy;  UMG 2021</span>
			</div>
			<div class="col-md-4">
			  <ul class="list-inline social-buttons">
				<li class="list-inline-item">
				  <a href="#">
					<i class="fab fa-twitter"></i>
				  </a>
				</li>
				<li class="list-inline-item">
				  <a href="#">
					<i class="fab fa-facebook-f"></i>
				  </a>
				</li>
				<li class="list-inline-item">
				  <a href="#">
					<i class="fab fa-linkedin-in"></i>
				  </a>
				</li>
			  </ul>
			</div>
			<div class="col-md-4">
			  <ul class="list-inline quicklinks">
				<li class="list-inline-item">
				  <a href="#">.</a>
				</li>
				<li class="list-inline-item">
				  <a href="#">.</a>
				</li>
			  </ul>
			</div>
		  </div>
		</div>
	  </footer>
	  <!-- Bootstrap core JavaScript -->
	  <script src="vendor/jquery/jquery.min.js"></script>
	  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
	  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	  <script src="js/modal.js"></script>
	  <script type="text/javascript" src="js/login_sha512.js"></script>
	  <script type="text/javascript" src="js/login_forms.js"></script>	
	  <!-- Plugin JavaScript -->
	  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
	  <!-- Contact form JavaScript -->
	  <script src="js/jqBootstrapValidation.js"></script>
	  <!-- Custom scripts for this template -->
	  <script src="js/agency.min.js"></script>
	</body>
</html>
