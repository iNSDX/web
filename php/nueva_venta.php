<?php


require_once("conexionesBD.php");
require_once("gestionarVentas.php");

$conexion = crearConexionBD();

if(!empty($_POST)){

	$importe = $_POST['importe'];
	$fiado = $_POST['fiado'];
	$idcaja = $_POST['idcaja'];
	$idingreso = $_POST['idingreso'];

	$errores = validarDatosVenta($importe,$fiado);

	if (count($errores)>0) {
		$_SESSION["errores"] = $errores;
		Header('Location: ../error.php');
	}

	nueva_venta($conexion,$importe,$fiado,$idcaja,$idingreso);

}

function validarDatosVenta($importe,$fiado){

	if($importe=="")
	  $errores[]= "<p>El importe no puede estar vacío</p>";

	if($fiado=="")
	  $errores[]= "<p>Fiado no puede estar vacío</p>";

	return $errores;
}

cerrarConexionBD($conexion);

?>
