<?php
	session_start();

	require_once("php/conexionesBD.php");
	require_once("php/gestionarArticulos.php");
	require_once("php/paginacion_consulta.php");


	if (isset($_SESSION["paginacion"])) $paginacion = $_SESSION["paginacion"];
	$pagina_seleccionada = isset($_GET["PAG_NUM"])? (int)$_GET["PAG_NUM"]:
												(isset($paginacion)? (int)$paginacion["PAG_NUM"]: 1);
	$pag_tam = isset($_GET["PAG_TAM"])? (int)$_GET["PAG_TAM"]:
										(isset($paginacion)? (int)$paginacion["PAG_TAM"]: 5);
	if ($pagina_seleccionada < 1) $pagina_seleccionada = 1;
	if ($pag_tam < 1) $pag_tam = 5;

	unset($_SESSION["paginacion"]);

	$conexion = crearConexionBD();

	$palabra = 'otros';

	$query = "SELECT * FROM ARTICULOS WHERE NOMBREFAMILIA='".$palabra."' OR NOMBRESUBFAMILIA='".$palabra."'";


	$total_registros = total_consulta_elementos($conexion,$query);
	$total_paginas = (int) ($total_registros / $pag_tam);
	if ($total_registros % $pag_tam > 0) $total_paginas++;
	if ($pagina_seleccionada > $total_paginas) $pagina_seleccionada = $total_paginas;


	$paginacion["PAG_NUM"] = $pagina_seleccionada;
	$paginacion["PAG_TAM"] = $pag_tam;
	$_SESSION["paginacion"] = $paginacion;

	$filas = consulta_paginada($conexion,$query,$pagina_seleccionada,$pag_tam);

	cerrarConexionBD($conexion);
?>

<!DOCTYPE HTML>
<html>
	<head>

	 <?php include_once("includes/meta.php"); ?>


		</head>
		<body class="no-sidebar Site">
	 			 <?php
	 				include_once("includes/header.php");
	 			 ?>

	 				<!-- Nuestros productos -->
	 				<div class="wrapper style1 Site-content">					 <div class="container">
						 <article id="main" class="special">
							 <header>
								 <h2><a href="otros.php">Otros</a></h2>
								 </header>
							 </article>
							 <nav>
								<form method="get" action="otros.php">
									<input id="PAG_NUM" name="PAG_NUM" type="hidden" value="<?php echo $pagina_seleccionada?>"/>
									Mostrando
									<input id="PAG_TAM" name="PAG_TAM" type="number"
										min="1" max="<?php echo $total_registros;?>"
										value="<?php echo $pag_tam;?>" autofocus="autofocus" />
									artículos de <?php echo $total_registros;?>
									<button type="submit" name="changepag" id="changepag" class="button small">Cambiar</button>
								</form>
							</nav>
					</div>
				 </div>



								<div class="w3-row-padding">
									<?php
										foreach($filas as $fila) {
									?>
										<div class="w3-quarter w3-container w3-margin-bottom">
									  	<img src="images/articulos/<?php echo $fila['IDARTICULO']; ?>.jpg" alt="<?php echo $fila['NOMBRE']; ?>" class="img-pequeña">
									  	<div class="w3-container w3-white">
											<p><b><?php echo $fila['NOMBRE']; ?></b></p>
											<p><?php echo $fila['PRECIOVENTA']; ?> €</p>
									  	</div>
										</div>
									<?php } ?>
								</div>



						   <!-- Pagination -->
						   <div class="w3-center w3-padding-32">
						     <div class="w3-bar">
									 <?php
										 for( $pagina = 1; $pagina <= $total_paginas; $pagina++ )
											 if ( $pagina == $pagina_seleccionada) { 	?>
												 <a href="#" class="w3-bar-item w3-black w3-button"><?php echo $pagina; ?></a>
									 <?php }	else { ?>
												 <a href="otros.php?PAG_NUM=<?php echo $pagina; ?>&PAG_TAM=<?php echo $pag_tam; ?>" class="w3-bar-item w3-button w3-hover-black"><?php echo $pagina; ?></a>
									 <?php } ?>
						     </div>
						   </div>

			<?php include_once("includes/footer.php"); ?>
</body>

</html>
