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


						<div class="row">
							<section class="8u 12u(mobile) special">
								<header id="Titulo"> <h1>¡Contacta con nosotros! </h1> </header>
								<form id="contact-form" method="post" action="php/procesar_contacto.php">
									<div class="field half first form-group">
										<input type="text" id="fname" name="fname" class="form-control" placeholder="Nombre" required></div>
									<div class="field half first form-group">
										<input type="text" id="lname" name="lname" class="form-control" placeholder="Apellidos" required>
									</div>
									<div class="field half form-group">
										<input type="text" id="emailcon" name="email" class="form-control" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$" placeholder="Email" required>
									</div>
									<div class="field form-group">
										<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Escriba aquí su mensaje. Le responderemos lo antes posible. Gracias :)" required></textarea>
									</div>
									<!-- CAMBIAR ESTO A UN DIV CON LAS MISMAS CLASES -->
									<ul class="actions form-group">
										<!-- CAMBIAR ESTO A INPUT TIPO BOTON CON LAS MISMAS CLASES -->
										<li><input type="submit" class="button submit" value="Enviar"></li>
									</ul>
								</form>
							</section>

							<section class="3u 12u(mobile) special">
								<header id="Titulo2"> <h1>¿Hablamos? </h1> </header>
								<ul class="contact">
									<li>
										<h3>Email</h3>
										<a href="mailto:gestanco@protonmail.com">gestanco@protonmail.com</a>
									</li>
									<li>
										<br>
										<h3>Teléfono</h3>
										<span>953 76 60 94</span>
									</li>
								</ul>
							</section>
				</div>
			</article>
		  </div>
		  </div>

			<?php include_once("includes/footer.php"); ?>


	</body>
</html>
