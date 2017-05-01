<?php
	session_start();

	require_once("php/conexionesBD.php");
	require_once("php/gestionarArticulos.php");
	require_once("php/paginacion_consulta.php");

	if (isset($_SESSION["articulo"])){
		$articulo = $_SESSION["articulo"];
		unset($_SESSION["articulo"]);
	}

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

	// La consulta que ha de paginarse
	$query = consultarTodosArticulos($conexion);

	// Se comprueba que el tamaño de página, página seleccionada y total de registros son conformes.
	// En caso de que no, se asume el tamaño de página propuesto, pero desde la página 1
	$total_registros = total_consulta($conexion,$query);
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
  <!-- Hay que indicar el fichero externo de estilos -->
	<link rel="stylesheet" type="text/css" href="css/estilo2.css" />
  <title>Gestanco: Lista de Artículos</title>
</head>

<body>

<?php
	include_once("cabecera.php");
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
				value="<?php echo $pag_tam?>" autofocus="autofocus" />
			entradas de <?php echo $total_registros?>
			<input type="submit" value="Cambiar">
		</form>
	</nav>

	<?php
		foreach($filas as $fila) {
	?>

	<article class="articulo">
		<form method="post" action="controlador_articulos.php">
			<div class="fila_articulo">
				<div class="datos_articulo">
					<input id="IDARTICULO" name="IDARTICULO"
						type="hidden" value="<?php echo $fila["IDARTICULO"]; ?>"/>
					<input id="NOMBRE" name="NOMBRE"
						type="hidden" value="<?php echo $fila["NOMBRE"]; ?>"/>
					<input id="DESCRIPCION" name="DESCRIPCION"
						type="hidden" value="<?php echo $fila["DESCRIPCION"]; ?>"/>
					<input id="PRECIOVENTA" name="PRECIOVENTA"
						type="hidden" value="<?php echo $fila["PRECIOVENTA"]; ?>"/>

				<?php
					if (isset($articulo) and ($articulo["IDARTICULO"] == $fila["IDARTICULO"])) { ?>
						<!-- Editando nombre -->
						<h3><input id="NOMBREEDIT" name="NOMBREEDIT" type="text" value="<?php echo $fila["NOMBRE"]; ?>"/></h3>
						<h4><?php echo $fila["DESCRIPCION"]." ".$fila["PRECIOVENTA"]; ?></h4>
						<h3><input id="DESCEDIT" name="DESCEDIT" type="text" value="<?php echo $fila["DESCRIPCION"]; ?>"/></h3>
				<?php }	else { ?>
						<!-- mostrando título -->
						<input id="NOMBRESHOW" name="NOMBRESHOW" type="hidden" value="<?php echo $fila["NOMBRE"]; ?>"/>
						<div class="nombre"><b><?php echo $fila["NOMBRE"]; ?></b></div>
						<input id="DESCSHOW" name="DESCSHOW" type="hidden" value="<?php echo $fila["DESCRIPCION"]; ?>"/>
						<div class="descripcion">By <em><?php echo $fila["DESCRIPCION"]." ".$fila["PRECIOVENTA"]; ?></em></div>
				<?php } ?>
				</div>

				<div id="botones_fila">
				<?php if (isset($articulo) and ($articulo["IDARTICULO"] == $fila["IDARTICULO"])) { ?>
						<button id="grabar" name="grabar" type="submit" class="editar_fila">
							<img src="images/bag_menuito.bmp" class="editar_fila" alt="Guardar modificación">
						</button>
				<?php } else {?>
						<button id="editar" name="editar" type="submit" class="editar_fila">
							<img src="images/pencil_menuito.bmp" class="editar_fila" alt="Editar nombre Articulo">
						</button>
				<?php } else {?>
						<button id="editardesc" name="editardesc" type="submit" class="editar_fila">
							<img src="images/pencil_menuito.bmp" class="editar_fila" alt="Editar descripción Articulo">
						</button>
				<?php } else {?>
						<button id="editarpv" name="editarpv" type="submit" class="editar_fila">
							<img src="images/pencil_menuito.bmp" class="editar_fila" alt="Editar precio venta Articulo">
						</button>
				<?php } ?>
					<button id="borrar" name="borrar" type="submit" class="editar_fila">
						<img src="images/remove_menuito.bmp" class="editar_fila" alt="Borrar Articulo">
					</button>
				</div>
			</div>
		</form>
	</article>

	<?php } ?>
</main>

<?php
	include_once("pie.php");
?>

</body>
</html>
