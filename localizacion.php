<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<!--Validacion Contacto-->
		<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/jquery.validate.min.js"></script>
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/additional-methods.min.js"></script>
		<script src="js/validacionContacto.js"></script>

		 <?php include_once("includes/meta.php"); ?>

	  </head>

		<body>
				 <?php
					include_once("includes/header.php");
				 ?>

					<div class="wrapper style1">
				    <div class="container">
				      <article id="main" class="special">
				        <header>
				          <h2><a href="#">Expendeduría Nº1 de Ibros</a></h2>
				          <p>
				            Jaén
				          </p>
				          </header>


				<!--	<div class="row">
						<section class="container">
							<div id="map" class="fh5co-map"></div>
						</section>
					</div>-->

						<div class="row">
							<section class="8u 12u(mobile) special">
								<header id="Titulo"> <h1>¡Estamos aquí! </h1> </header>
                <iframe
        width="600"
        height="450"
        frameborder="0" style="border:0"
        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDx0fnG-FnCLrIV6sSWcsEZjuD7q4H3sik&q=Expendeduría+Nº1,Ibros+Jaén" allowfullscreen>
        </iframe>
							</section>

							<section class="3u 12u(mobile) special">
                <header id="Titulo1"> <h1>¡Ven a visitarnos! </h1> </header>
        <ul class="contact">
            <li>
                <h3>Dirección</h3>
                <span>Calle Virgen de los Remedios Nº50,<br />
                Ibros (Jaén) 23450<br />
                España</span>
            </li>
        </ul>
							</section>
				</div>


			<?php include_once("includes/footer.php"); ?>


	</body>
</html>