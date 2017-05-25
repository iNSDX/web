<<<<<<< HEAD
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

	$palabra = 'papeleria';

	$query = "SELECT * FROM ARTICULOS WHERE NOMBRESUBFAMILIA='".$palabra."'";


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

	 <body>
				 <?php
					include_once("includes/header.php");
				 ?>

				 <!-- Nuestros productos -->
				 <div class="wrapper style1">
					 <div class="container">
						 <article id="main" class="special">
							 <header>
								 <h2><a href="papeleria.php">Papelería</a></h2>
								 </header>
							 </article>
						 </div>
						  </div>

								 <nav>
									<form method="get" action="papeleria.php">
										<input id="PAG_NUM" name="PAG_NUM" type="hidden" value="<?php echo $pagina_seleccionada?>"/>
										Mostrando
										<input id="PAG_TAM" name="PAG_TAM" type="number"
											min="1" max="<?php echo $total_registros;?>"
											value="<?php echo $pag_tam;?>" autofocus="autofocus" />
										artículos de <?php echo $total_registros;?>
										<button type="button" name="add" id="add" data-toggle="modal"
										 data-target="#add_data_Modal" class="button small">Cambiar</button>
									</form>
								</nav>


								<div class="w3-row-padding">
									<?php
										foreach($filas as $fila) {
									?>
										<div class="w3-third w3-container w3-margin-bottom">
									  	<img src="images/articulos/<?php echo $fila['IDARTICULO']; ?>.jpg" alt="<?php echo $fila['NOMBRE']; ?>" style="width:100%" class="w3-hover-opacity">
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
												 <a href="consulta_articulos.php?PAG_NUM=<?php echo $pagina; ?>&PAG_TAM=<?php echo $pag_tam; ?>" class="w3-bar-item w3-button w3-hover-black"><?php echo $pagina; ?></a>
									 <?php } ?>
						     </div>
						   </div>


		 <?php include_once("includes/footer.php"); ?>
 </body>
</html>
=======
<?php
	session_start();

	require_once("php/conexionesBD.php");
	require_once("php/gestionarArticulos.php");
	require_once("php/paginacion_consulta.php");

	// ¿Venimos simplemente de cambiar página o de haber seleccionado un registro ?
	// ¿Hay una sesión activa?
	if (isset($_SESSION["paginacion"])) $paginacion = $_SESSION["paginacion"];
	$pagina_seleccionada = isset($_GET["PAG_NUM"])? (int)$_GET["PAG_NUM"]:
												(isset($paginacion)? (int)$paginacion["PAG_NUM"]: 1);
	$pag_tam = isset($_GET["PAG_TAM"])? (int)$_GET["PAG_TAM"]:
										(isset($paginacion)? (int)$paginacion["PAG_TAM"]: 5);
	if ($pagina_seleccionada < 1) $pagina_seleccionada = 1;
	if ($pag_tam < 1) $pag_tam = 5;

	// Antes de seguir, borramos las variables de sección para no confundirnos más adelante
	unset($_SESSION["paginacion"]);

	$conexion = crearConexionBD();

	$palabra = 'papeleria';
	// La consulta que ha de paginarse
	$query = "SELECT * FROM ARTICULOS WHERE NOMBREFAMILIA='".$palabra."'";

	// Se comprueba que el tamaño de página, página seleccionada y total de registros son conformes.
	// En caso de que no, se asume el tamaño de página propuesto, pero desde la página 1
	$total_registros = total_consulta_elementos($conexion,$query);
	$total_paginas = (int) ($total_registros / $pag_tam);
	if ($total_registros % $pag_tam > 0) $total_paginas++;
	if ($pagina_seleccionada > $total_paginas) $pagina_seleccionada = $total_paginas;

	// Generamos los valores de sesión para página e intervalo para volver a ella después de una operación
	$paginacion["PAG_NUM"] = $pagina_seleccionada;
	$paginacion["PAG_TAM"] = $pag_tam;
	$_SESSION["paginacion"] = $paginacion;

	$filas = consulta_paginada($conexion,$query,$pagina_seleccionada,$pag_tam);

	cerrarConexionBD($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>Gestión Estanco - Artículos</title>
</head>

<body>

<?php
	include_once("includes/header.php");

?>

<main>
	 <nav>
		<div id="enlaces">
			<?php
				for( $pagina = 1; $pagina <= $total_paginas; $pagina++ )
					if ( $pagina == $pagina_seleccionada) { 	?>
						<span class="current"><?php echo $pagina; ?></span>
			<?php }	else { ?>
						<a href="consulta_articulos.php?PAG_NUM=<?php echo $pagina; ?>&PAG_TAM=<?php echo $pag_tam; ?>"><?php echo $pagina; ?></a>
			<?php } ?>
		</div>

		<form method="get" action="consulta_articulos.php">
			<input id="PAG_NUM" name="PAG_NUM" type="hidden" value="<?php echo $pagina_seleccionada?>"/>
			Mostrando
			<input id="PAG_TAM" name="PAG_TAM" type="number"
				min="1" max="<?php echo $total_registros;?>"
				value="<?php echo $pag_tam;?>" autofocus="autofocus" />
			entradas de <?php echo $total_registros;?>
			<input type="submit" value="Cambiar">
		</form>
	</nav>

				<style>
					ul.articulos li {
    				width: 200px;
    				display: inline-block;
    				vertical-align: top;
					}
				</style>

	<ul class="articulos">
	<?php
		foreach($filas as $fila) {
	?>
				<article class="articulo">
					<li>
					   <img src="images/articulos/<?php echo $fila['IDARTICULO']; ?>.jpg">
					   <h4><?php echo $fila['NOMBRE']; ?></h4>
					   <p><?php echo $fila['PRECIOVENTA']; ?> €</p>
			   		</li>
				</article>
	<?php } ?>

	</ul>
</main>

<?php
	include_once("includes/footer.php");
?>
</body>
</html>
>>>>>>> origin/master
