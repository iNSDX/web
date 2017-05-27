<?php

require_once("conexionesBD.php");
require_once("gestionarPedidos.php");

$conexion = crearConexionBD();

if(!empty($_POST)){

        $idpedido = $_POST['id'];
        $fechaentrega = $_POST['fechaentrega'];
        $importecompra = $_POST['importecompra'];
        $idproveedor = $_POST['idproveedor'];
        $idalmacen = $_POST['idalmacen'];

        editar_pedido($conexion,$idpedido,$fechaentrega,$importecompra,$idproveedor,$idalmacen);

    }
    cerrarConexionBD($conexion);
?>
