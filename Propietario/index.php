<?php
    /*session_start();

    if(isset($_SESSION['usuario'])){
        if($_SESSION['usuario']['TIPO'] != 'Propietario'){
            header('Location: ../');
        }
    }else{
        header('Location: ../');
    }*/
 ?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Gestión Estanco</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

		<?php include_once("../includes/links.php") ?>
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Main -->
					<div id="main">
						<div class="inner">
							<!-- Header -->
								<header id="header">
									<a href="index.html" class="logo"><strong>Propietario</strong> NOMBRE </a>
								</header>

							<!-- Banner -->
								<section id="banner">
									<div class="content">
										<header>
											<h1>Hola, NOMBRE<br /></h1>
											<p>Esta es la interfaz de Propietario.</p>
										</header>
										<p>Tendrá libre acceso a toda la base de datos y no tendrá restricción en hacer ninguna operación.</p>
										<ul class="actions">
											<li><a href="albaran.php" class="button big">Mirar Albarán</a></li>
										</ul>
									</div>
									<span class="image object">
									</span>
								</section>

						</div>
					</div>

					<?php include_once("../includes/sidebar_P.php") ?>

			</div>

	</body>
</html>
