<?php

require_once("conexionesBD.php");
require_once("gestionarArqueos.php");

$conexion = crearConexionBD();

if(!empty($_POST)){

        $contadocaja = $_POST['contadocaja'];
        $totalventas = $_POST['totalventas'];
        $dinerofiado = $_POST['dinerofiado'];
        $pagoproveedor = $_POST['pagoproveedor'];
        $dinerofiadodevuelto = $_POST['dinerofiadodevuelto'];
        $idgastos = $_POST['idgastos'];
        $idingreso = $_POST['idingreso'];

        $errores = validarDatosArqueo($contadocaja,$totalventas,$dinerofiado,$pagoproveedor,$dinerofiadodevuelto);

    	if (count($errores)>0) {
    		$_SESSION["errores"] = $errores;
    		Header('Location: ../error.php');
    	}

	nuevo_arqueo($conexion,$contadocaja,$totalventas,$dinerofiado,$pagoproveedor,$dinerofiadodevuelto,$idgastos,$idingreso);
}

function validarDatosArqueo($contadocaja,$totalventas,$dinerofiado,$pagoproveedor,$dinerofiadodevuelto){

    if($contadocaja=="")
	  $errores[]= "<p>Contado caja no puede estar vacío</p>";

	if($totalventas=="")
	  $errores[]= "<p>Total ventas no puede estar vacío</p>";

	if($dinerofiado=="")
	  $errores[]= "<p>Diero fiado no puede estar vacío</p>";

    if($pagoproveedor=="")
  	  $errores[]= "<p>Pago proveedor no puede estar vacío</p>";

    if($dinerofiadodevuelto=="")
      $errores[]= "<p>Dinero fiado devuelto no puede estar vacío</p>";

	return $errores;
}

cerrarConexionBD($conexion);

?>
