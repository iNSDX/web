<?php

session_start();

if(isset($_SESSION['usuario'])){
	if($_SESSION['usuario']['TIPO'] == 'Cliente'){
		header('Location: index.php');
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
		<?php include_once("includes/links.php") ?>
	    <script src="js/busquedafactura.js"></script>

	</head>
	<body>
    <div class="artdeleted"><span>Factura borrada correctamente</span></div>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<!-- Header -->
								<header id="header">
									<a href="index.php" class="logo"><strong><?php echo $_SESSION['usuario']['TIPO']; ?></strong> <?php echo $_SESSION['usuario']['NOMBRE']; ?></a>

								</header>

							<!-- Banner -->
								<section id="banner">
									<div class="content">
										<header>
											<h1>HISTORIAL DE FACTURAS<br /></h1>
                      <!-- Search -->
        								<section id="search" class="alt">
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

				<?php include_once("includes/sidebar.php") ?>

			</div>



	</body>
</html>
