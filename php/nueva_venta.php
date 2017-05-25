<?php


require_once("conexionesBD.php");
require_once("gestionarVentas.php");

$conexion = crearConexionBD();

if(!empty($_POST)){

	$importe = $_POST['importe'];
	$fiado = $_POST['fiado'];
	$idcaja = $_POST['idcaja'];
	$idingreso = $_POST['idingreso'];

	nueva_venta($conexion,$importe,$fiado,$idcaja,$idingreso);
}

cerrarConexionBD($conexion);

?>
