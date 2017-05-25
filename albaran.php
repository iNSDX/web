<?php
session_start();
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Gestión Estanco</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

			<?php include_once("includes/links.php") ?>
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
											<h1>ALBARANES<br /></h1>
                      <!-- Search -->
        								<section id="search" class="alt">
        									<form method="post" action="#">
        										<input type="text" name="query" id="query" placeholder="Buscar albarán..." />
        									</form>
        								</section>

										</header>
										<p></p>
									</div>
									<span class="image object">
									</span>
								</section>

						</div>
					</div>

				<?php include_once("includes/sidebar.php") ?>

			</div>



	</body>
</html>
