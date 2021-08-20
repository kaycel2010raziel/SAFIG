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

	  <!-- Custom fonts for this theme -->
	  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
		
	  <script src="plugins/jquery/jquery.min.js"></script>
	  <script type="text/javascript" src="js/login_sha512.js"></script>
	  <script type="text/javascript" src="js/login_forms.js"></script>
	  <script type="text/javascript" src="js/CONSULTAS.js"></script>
	  <!-- Theme CSS -->
	  <link href="css/freelancer.min.css" rel="stylesheet">
	</head>
	<body id="page-top">
		<!-- Navigation -->
		<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
			<div class="container">
				<a class="navbar-brand js-scroll-trigger" href="#page-top">SAFIG</a>
				<button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					Menu
					<i class="fas fa-bars"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item mx-0 mx-lg-1">
							<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#services">SERVICIOS</a>
						</li>
						<li class="nav-item mx-0 mx-lg-1">
							<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#consultas">consultas</a>
						</li>
						<li class="nav-item mx-0 mx-lg-1">
							<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">conocenos</a>
						</li>
						<li class="nav-item mx-0 mx-lg-1">
							<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"data-toggle="modal" data-target="#loginModal" >login</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- Masthead -->
		<header class="masthead bg-info text-white text-center">
			<div class="container d-flex align-items-center flex-column">
				<!-- Masthead Avatar Image -->
				<img class="masthead-avatar mb-5" src="img/logos/LOGO_SAFIG.png" alt="">
				<!-- Masthead Heading -->
				<h1 class="masthead-heading text-uppercase mb-0">SAFIG SALE</h1>
				<!-- Icon Divider -->
				<div class="divider-custom divider-light">
					<div class="divider-custom-line"></div>
					<div class="divider-custom-icon">
						<i class="fas fa-star"></i>
					</div>
					<div class="divider-custom-line"></div>
				</div>
				<!-- Masthead Subheading -->
				<p class="masthead-subheading font-weight-light mb-0">Medicina en Segundos</p>
			</div>
		</header>
		<!-- services section -->
		<section class="page-section services" id="services">
			<div class="container">
				<!-- Portfolio Section Heading -->
				<h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">servicios</h2>
				<!-- Icon Divider -->
				<div class="divider-custom">
					<div class="divider-custom-line"></div>
					<div class="divider-custom-icon">
						<i class="fas fa-star"></i>
					</div>
					<div class="divider-custom-line"></div>
				</div>
				<!-- services Grid Items -->
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
			<!-- /.row -->
			</div>
		</section>
		<!-- consultas section -->
		<section class="page-section services" id="consultas">
			<div class="container">
				<!-- Portfolio Section Heading -->
				<h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">consultas</h2>
				<!-- Icon Divider -->
				<div class="divider-custom">
					<div class="divider-custom-line"></div>
					<div class="divider-custom-icon">
						<i class="fas fa-star"></i>
					</div>
					<div class="divider-custom-line"></div>
				</div>
				<!-- consultas Grid Items -->
				<div class="row">
				
				</div>
			<!-- /.row -->
			</div>
		</section>
		<!-- Portfolio Section -->
		<section class="page-section portfolio" id="portfolio">
			<div class="container">
				<!-- Portfolio Section Heading -->
				<h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">conocenos</h2>
				<!-- Icon Divider -->
				<div class="divider-custom">
					<div class="divider-custom-line"></div>
						<div class="divider-custom-icon">
							<i class="fas fa-star"></i>
						</div>
					<div class="divider-custom-line"></div>
				</div>
			  <!-- Portfolio Grid Items -->
			  <div class="row">
					<!-- Portfolio Item 1 -->
					<div class="col-md-6 col-lg-4">
					  <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
						<div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
						  <div class="portfolio-item-caption-content text-center text-white">
							<i class="fas fa-plus fa-3x"></i>
						  </div>
						</div>
						<img class="img-fluid" src="img/portfolio/cabin.png" alt="">
					  </div>
					</div>

					<!-- Portfolio Item 2 -->
					<div class="col-md-6 col-lg-4">
					  <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal2">
						<div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
						  <div class="portfolio-item-caption-content text-center text-white">
							<i class="fas fa-plus fa-3x"></i>
						  </div>
						</div>
						<img class="img-fluid" src="img/portfolio/cake.png" alt="">
					  </div>
					</div>

					<!-- Portfolio Item 3 -->
					<div class="col-md-6 col-lg-4">
					  <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal3">
						<div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
						  <div class="portfolio-item-caption-content text-center text-white">
							<i class="fas fa-plus fa-3x"></i>
						  </div>
						</div>
						<img class="img-fluid" src="img/portfolio/circus.png" alt="">
					  </div>
					</div>

					<!-- Portfolio Item 4 -->
					<div class="col-md-6 col-lg-4">
					  <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal4">
						<div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
						  <div class="portfolio-item-caption-content text-center text-white">
							<i class="fas fa-plus fa-3x"></i>
						  </div>
						</div>
						<img class="img-fluid" src="img/portfolio/game.png" alt="">
					  </div>
					</div>

					<!-- Portfolio Item 5 -->
					<div class="col-md-6 col-lg-4">
					  <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal5">
						<div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
						  <div class="portfolio-item-caption-content text-center text-white">
							<i class="fas fa-plus fa-3x"></i>
						  </div>
						</div>
						<img class="img-fluid" src="img/portfolio/safe.png" alt="">
					  </div>
					</div>

					<!-- Portfolio Item 6 -->
					<div class="col-md-6 col-lg-4">
					  <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal6">
						<div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
						  <div class="portfolio-item-caption-content text-center text-white">
							<i class="fas fa-plus fa-3x"></i>
						  </div>
						</div>
						<img class="img-fluid" src="img/portfolio/submarine.png" alt="">
					  </div>
					</div>
				</div>
		  <!-- /.row -->
			</div>
		</section>

		 <!-- Footer -->
		<footer class="footer text-center">
			<div class="container">
			  <div class="row">
				<!-- Footer Location -->
				<div class="col-lg-4 mb-5 mb-lg-0">
				  <h4 class="text-uppercase mb-4">Location</h4>
				  <p class="lead mb-0">2215 John Daniel Drive
					<br>Clark, MO 65243</p>
				</div>
				<!-- Footer Social Icons -->
				<div class="col-lg-4 mb-5 mb-lg-0">
				  <h4 class="text-uppercase mb-4">Around the Web</h4>
				  <a class="btn btn-outline-light btn-social mx-1" href="#">
					<i class="fab fa-fw fa-facebook-f"></i>
				  </a>
				  <a class="btn btn-outline-light btn-social mx-1" href="#">
					<i class="fab fa-fw fa-twitter"></i>
				  </a>
				  <a class="btn btn-outline-light btn-social mx-1" href="#">
					<i class="fab fa-fw fa-linkedin-in"></i>
				  </a>
				  <a class="btn btn-outline-light btn-social mx-1" href="#">
					<i class="fab fa-fw fa-dribbble"></i>
				  </a>
				</div>
				<!-- Footer About Text -->
				<div class="col-lg-4">
				  <h4 class="text-uppercase mb-4">About Freelancer</h4>
				  <p class="lead mb-0">Freelance is a free to use, MIT licensed Bootstrap theme created by
					<a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
				</div>
			  </div>
			</div>
		 </footer>

	  <!-- Copyright Section -->
	  <section class="copyright py-4 text-center text-white">
		<div class="container">
		  <small>Copyright &copy; UMG 2021</small>
		</div>
	  </section>

	  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
	  <div class="scroll-to-top d-lg-none position-fixed ">
		<a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
		  <i class="fa fa-chevron-up"></i>
		</a>
	  </div>
		<!-- Portfolio Modals -->
	  <!-- Portfolio Modal 1 -->
	  <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
		  <div class="modal-content">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">
				<i class="fas fa-times"></i>
			  </span>
			</button>
			<div class="modal-body text-center">
			  <div class="container">
				<div class="row justify-content-center">
				  <div class="col-lg-8">
					<!-- Portfolio Modal - Title -->
					<h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Log Cabin</h2>
					<!-- Icon Divider -->
					<div class="divider-custom">
					  <div class="divider-custom-line"></div>
					  <div class="divider-custom-icon">
						<i class="fas fa-star"></i>
					  </div>
					  <div class="divider-custom-line"></div>
					</div>
					<!-- Portfolio Modal - Image -->
					<img class="img-fluid rounded mb-5" src="img/portfolio/cabin.png" alt="">
					<!-- Portfolio Modal - Text -->
					<p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
					<button class="btn btn-primary" href="#" data-dismiss="modal">
					  <i class="fas fa-times fa-fw"></i>
					  Close Window
					</button>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>

	  <!-- Portfolio Modal 2 -->
	  <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-labelledby="portfolioModal2Label" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
		  <div class="modal-content">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">
				<i class="fas fa-times"></i>
			  </span>
			</button>
			<div class="modal-body text-center">
			  <div class="container">
				<div class="row justify-content-center">
				  <div class="col-lg-8">
					<!-- Portfolio Modal - Title -->
					<h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Tasty Cake</h2>
					<!-- Icon Divider -->
					<div class="divider-custom">
					  <div class="divider-custom-line"></div>
					  <div class="divider-custom-icon">
						<i class="fas fa-star"></i>
					  </div>
					  <div class="divider-custom-line"></div>
					</div>
					<!-- Portfolio Modal - Image -->
					<img class="img-fluid rounded mb-5" src="img/portfolio/cake.png" alt="">
					<!-- Portfolio Modal - Text -->
					<p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
					<button class="btn btn-primary" href="#" data-dismiss="modal">
					  <i class="fas fa-times fa-fw"></i>
					  Close Window
					</button>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>

	  <!-- Portfolio Modal 3 -->
	  <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-labelledby="portfolioModal3Label" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
		  <div class="modal-content">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">
				<i class="fas fa-times"></i>
			  </span>
			</button>
			<div class="modal-body text-center">
			  <div class="container">
				<div class="row justify-content-center">
				  <div class="col-lg-8">
					<!-- Portfolio Modal - Title -->
					<h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Circus Tent</h2>
					<!-- Icon Divider -->
					<div class="divider-custom">
					  <div class="divider-custom-line"></div>
					  <div class="divider-custom-icon">
						<i class="fas fa-star"></i>
					  </div>
					  <div class="divider-custom-line"></div>
					</div>
					<!-- Portfolio Modal - Image -->
					<img class="img-fluid rounded mb-5" src="img/portfolio/circus.png" alt="">
					<!-- Portfolio Modal - Text -->
					<p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
					<button class="btn btn-primary" href="#" data-dismiss="modal">
					  <i class="fas fa-times fa-fw"></i>
					  Close Window
					</button>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>

	  <!-- Portfolio Modal 4 -->
	  <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-labelledby="portfolioModal4Label" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
		  <div class="modal-content">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">
				<i class="fas fa-times"></i>
			  </span>
			</button>
			<div class="modal-body text-center">
			  <div class="container">
				<div class="row justify-content-center">
				  <div class="col-lg-8">
					<!-- Portfolio Modal - Title -->
					<h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Controller</h2>
					<!-- Icon Divider -->
					<div class="divider-custom">
					  <div class="divider-custom-line"></div>
					  <div class="divider-custom-icon">
						<i class="fas fa-star"></i>
					  </div>
					  <div class="divider-custom-line"></div>
					</div>
					<!-- Portfolio Modal - Image -->
					<img class="img-fluid rounded mb-5" src="img/portfolio/game.png" alt="">
					<!-- Portfolio Modal - Text -->
					<p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
					<button class="btn btn-primary" href="#" data-dismiss="modal">
					  <i class="fas fa-times fa-fw"></i>
					  Close Window
					</button>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>

	  <!-- Portfolio Modal 5 -->
	  <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-labelledby="portfolioModal5Label" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
		  <div class="modal-content">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">
				<i class="fas fa-times"></i>
			  </span>
			</button>
			<div class="modal-body text-center">
			  <div class="container">
				<div class="row justify-content-center">
				  <div class="col-lg-8">
					<!-- Portfolio Modal - Title -->
					<h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Locked Safe</h2>
					<!-- Icon Divider -->
					<div class="divider-custom">
					  <div class="divider-custom-line"></div>
					  <div class="divider-custom-icon">
						<i class="fas fa-star"></i>
					  </div>
					  <div class="divider-custom-line"></div>
					</div>
					<!-- Portfolio Modal - Image -->
					<img class="img-fluid rounded mb-5" src="img/portfolio/safe.png" alt="">
					<!-- Portfolio Modal - Text -->
					<p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
					<button class="btn btn-primary" href="#" data-dismiss="modal">
					  <i class="fas fa-times fa-fw"></i>
					  Close Window
					</button>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>

	  <!-- Portfolio Modal 6 -->
	  <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-labelledby="portfolioModal6Label" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
		  <div class="modal-content">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">
				<i class="fas fa-times"></i>
			  </span>
			</button>
			<div class="modal-body text-center">
			  <div class="container">
				<div class="row justify-content-center">
				  <div class="col-lg-8">
					<!-- Portfolio Modal - Title -->
					<h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Submarine</h2>
					<!-- Icon Divider -->
					<div class="divider-custom">
					  <div class="divider-custom-line"></div>
					  <div class="divider-custom-icon">
						<i class="fas fa-star"></i>
					  </div>
					  <div class="divider-custom-line"></div>
					</div>
					<!-- Portfolio Modal - Image -->
					<img class="img-fluid rounded mb-5" src="img/portfolio/submarine.png" alt="">
					<!-- Portfolio Modal - Text -->
					<p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
					<button class="btn btn-primary" href="#" data-dismiss="modal">
					  <i class="fas fa-times fa-fw"></i>
					  Close Window
					</button>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
		<!-- Modal Login -->
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
	  <!-- Bootstrap core JavaScript -->
	  <script src="vendor/jquery/jquery.min.js"></script>
	  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	  <!-- Plugin JavaScript -->
	  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
	  <!-- Contact Form JavaScript -->
	  <script src="js/jqBootstrapValidation.js"></script>
	  <script src="js/contact_me.js"></script>
	  <!-- Custom scripts for this template -->
	  <script src="js/freelancer.min.js"></script>
	</body>
</html>
