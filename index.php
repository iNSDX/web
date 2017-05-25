<?php
    session_start();
 ?>

 <!DOCTYPE HTML>
 <html>
   <head>

    <?php include_once("includes/meta.php"); ?>

     </head>

	  <body>
					<?php
					 include_once("includes/header.php");
					?>

					<!-- Nuestros productos -->
					<div class="wrapper style1">
						<div class="container">
							<article id="main" class="special">
								<header>
									<h2><a href="#">Expendeduría Nº1 de Ibros</a></h2>
									<p>
										Jaén
									</p>
									</header>

							<a href="#" id="first-image" class="image featured"><img src="images/estanco.jpg" alt="" /></a>
						<hr />

						<div class="row">
							<article class="3u 12u(mobile) special">
								<a href="tabaco.php" class="image featured"><img src="images/tabaco.jpg" alt="tabaco" /></a>
								<header>
									<h3><a href="tabaco.php">Tabaco</a></h3>
								</header>
							</article>

							<article class="3u 12u(mobile) special">
								<a href="comestibles.php" class="image featured"><img src="images/comestibles.jpg" alt="comida" /></a>
								<header>
									<h3><a href="comestibles.php">Comestibles</a></h3>
								</header>

							</article>
							<article class="3u 12u(mobile) special">
								<a href="papeleria.php" class="image featured"><img src="images/papeleria.jpg" alt="papeleria" /></a>
								<header>
									<h3><a href="papeleria.php">Papelería</a></h3>
								</header>

							</article>
							<article class="3u 12u(mobile) special">
								<a href="otros.php" class="image featured"><img src="images/otros.jpg" alt="others" /></a>
								<header>
									<h3><a href="otros.php">Otros</a></h3>
								</header>

							</article>


				</div>

			<?php include_once("includes/footer.php"); ?>


	</body>
</html>
