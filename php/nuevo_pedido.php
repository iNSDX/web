<?php


require_once("conexionesBD.php");
require_once("gestionarPedidos.php");

$conexion = crearConexionBD();

if(!empty($_POST)){

        $fechaentrega = $_POST['fechaentrega'];
        $importecompra = $_POST['importecompra'];
        $idproveedor = $_POST['idproveedor'];
        $idalmacen = $_POST['idalmacen'];

        $errores = validarDatosPedido($importecompra);

    	if (count($errores)>0) {
    		$_SESSION["errores"] = $errores;
    		Header('Location: ../error.php');
    	}

	nuevo_pedido($conexion,$fechaentrega,$importecompra,$idproveedor,$idalmacen);

}

function validarDatosPedido($importecompra){

    if($importecompra=="")
	  $errores[]= "<p>Importe pedido no puede estar vacío</p>";

	return $errores;
}

cerrarConexionBD($conexion);

?>
