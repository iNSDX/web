<?php

session_start();

if(!isset($_SESSION['usuario'])){

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
	</head>
	<body>

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
											<h1>Hola, <?php echo $_SESSION['usuario']['NOMBRE']; ?><br /></h1>
										<!-- PONER AQUI TEXTO DEPENDIENDO DE TIPO USUARIO	<p>Esta es la interfaz de Propietario.</p>-->
										</header>
										<!-- PONER AQUI TEXTO DEPENDIENDO DE TIPO USUARIO
                                        <p>Tendrá libre acceso a toda la base de datos y no tendrá restricción en hacer ninguna operación.</p>
										<ul class="actions">
											<li><a href="albaran.php" class="button big">Mirar Albarán</a></li>
										</ul>-->
									</div>
									<span class="image object">
									</span>
								</section>

						</div>
					</div>

					<?php include_once("includes/sidebar.php"); ?>

			</div>

	</body>
</html>
