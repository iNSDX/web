<?php
    /*session_start();

    if(isset($_SESSION['usuario'])){
        if($_SESSION['usuario']['TIPO'] != 'Gerente'){
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
									<a href="index.html" class="logo"><strong>Gerente</strong> NOMBRE </a>
								</header>

							<!-- Banner -->
								<section id="banner">
									<div class="content">
										<header>
											<h1>Hola, NOMBRE<br /></h1>
											<p>Esta es la interfaz de gerente.</p>
										</header>
										<p>Con esta interfaz usted podrá hacer una nueva venta, acceder al historial de las mismas, hacer una factura, acceder al historial de las mismas, realizar el arqueo de caja, así como acceder al inventario al completo y de las máquinas expendedoras, entre otras cosas...</p>
										<ul class="actions">
											<li><a href="albaran.php" class="button big">Mirar Albarán</a></li>
										</ul>
									</div>
									<span class="image object">
									</span>
								</section>

						</div>
					</div>

					<?php include_once("../includes/sidebar_g.php") ?>

			</div>

	</body>
</html>
