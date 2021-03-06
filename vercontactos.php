<?php

session_start();

if(isset($_SESSION['usuario'])){
	if($_SESSION['usuario']['TIPO'] == 'Cliente'){
		header('Location: indexinterno.php');
	}
}else{
	header('Location: index.php');
}

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Gestión Estanco</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<?php include_once("includes/links.php"); ?>
		<script src="js/busquedacontacto.js"></script>

	</head>
	<body>

	    <div class="artdeleted"><span>Contacto borrado correctamente</span></div>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<!-- Header -->
								<header id="header">
									<a href="indexinterno.php" class="logo"><strong><?php echo $_SESSION['usuario']['TIPO']; ?></strong> <?php echo $_SESSION['usuario']['NOMBRE']; ?></a>
								</header>

							<!-- Banner -->
								<section id="banner">
									<div class="content">
										<header>
											<h1>CONTACTOS<br /></h1>
                      <!-- Search -->
        								<section id="search" class="alt principal">
											<div class="form-1-2">
												<label for="caja_busqueda">Buscar:</label>
												<input type="text" name="caja_busqueda" id="caja_busqueda"/>
											</div>
        								</section>
										</header>
										<p></p>
									</div>
									<span class="image object">
									</span>
								</section>

                                <div id="datos">

                                </div>

						</div>
					</div>

				<?php include_once("includes/sidebar.php"); ?>

			</div>

	</body>
</html>
