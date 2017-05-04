<?php
    session_start();

    if(isset($_SESSION['usuario'])){
        if($_SESSION['usuario']['TIPO'] == 'Propietario'){
            header('Location: Propietario/');
        }else if($_SESSION['usuario']['TIPO'] == 'Gerente'){
            header('Location: Gerente/');
        }else if($_SESSION['usuario']['TIPO'] == 'Empleado'){
            header('Location: Empleado/');
        }else if($_SESSION['usuario']['TIPO'] == 'Cliente'){
            header('Location: Cliente/');
        }
    }
 ?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Estanco Nº1 &mdash; Ibros (Jaén)</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">



	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Pricing -->
	<link rel="stylesheet" href="css/pricing.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Count Down -->
	<script src="js/simplyCountdown.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>

	<!-- Login -->
  	<link href="css/bootstrap.css" rel="stylesheet" />
    <!--<link href="https://bootswatch.com/yeti/bootstrap.min.css" rel="stylesheet">-->
	<link href="css/login-register.css" rel="stylesheet" />
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
	<script src="js/login.js"></script>
    <script src="js/login-register.js"></script>
    <!-- Register -->
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/additional-methods.min.js"></script>
    <script src="js/validacionRegistro.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link href="css/register.css" rel="stylesheet">

	</head>

    <body>
			<?php
					include_once("includes/cabecera.php");
					include_once("login_register_modal.php");
			?>

	<aside id="fh5co-hero">
		<div class="flexslider">
			<ul class="slides">
		   	<li style="background-image: url(images/img_bg_1.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1>¡Bienvenidos!</h1>
									<h2>Expendeduría Nº1 de Ibros</h2>


			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(images/img_bg_2.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1>Oferta 1</h1>
									<h2>aaaaaaaaa <a target="_blank">aaaaaaaaa</a></h2>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(images/img_bg_2.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1>Oferta 1</h1>
									<h2>aaaaaaaaa <a target="_blank">aaaaaaaaa</a></h2>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>

		  	</ul>
	  	</div>
	</aside>

	<div id="fh5co-course-categories">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>Nuestros Productos</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-box"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Tabaco</a></h3>
							<p>Descripción</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-pen2"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Papelería</a></h3>
							<p>Descripción</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-food"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Comestibles</a></h3>
							<p>Descripción</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-th-list"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Otros</a></h3>
							<p>Descripción</p>
						</div>
					</div>
				</div>

					</div>
				</div>
			</div>
		</div>


<?php include_once("includes/pie.php") ?>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	</body>
</html>
