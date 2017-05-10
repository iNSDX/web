<?php
	session_start();

	if (isset($_SESSION["articulo"])) {
		$articulo = $_SESSION["articulo"];
		unset($_SESSION["articulo"]);

		require_once("conexionesBD.php");
		require_once("gestionarArticulos.php");

		$conexion = crearConexionBD();
		$excepcion = quitar_articulo($conexion,$libro["IDARTICULO"]);
		cerrarConexionBD($conexion);

		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "../consulta_articulos.php";
			Header("Location: ../error.php");
		}
		else
			Header("Location: consulta_articulos.php");
	}
	else Header("Location: consulta_articulos.php"); // Se ha tratado de acceder directamente a este PHP
?>
