<?php
	session_start();

	if (isset($_REQUEST["IDARTICULO"])){
		$articulo["IDARTICULO"] = $_REQUEST["IDARTICULO"];
		$articulo["NOMBRE"] = $_REQUEST["NOMBRE"];
		$articulo["DESCRIPCION"] = $_REQUEST["DESCRIPCION"];
		$articulo["PRECIOVENTA"] = $_REQUEST["PRECIOVENTA"];

		$_SESSION["libro"] = $libro;

		if (isset($_REQUEST["editar"])) Header("Location: consulta_articulos.php");
		else if (isset($_REQUEST["editardesc"])) Header("Location: consulta_articulos.php");
		else if (isset($_REQUEST["editarpv"])) Header("Location: consulta_articulos.php");
		else if (isset($_REQUEST["grabar"])) Header("Location: accion_mod_nombre_art.php");
		else Header("Location: accion_borrar_art.php");
	}
	else
		Header("Location: ../consulta_articulos.php");

?>
