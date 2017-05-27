<?php

require_once("conexionesBD.php");
require_once("gestionarPedidos.php");

$conexion = crearConexionBD();

if(!empty($_POST)){
    $idPedido = $_POST['id'];

    quitar_pedido($conexion,$idPedido);

}

cerrarConexionBD($conexion);
?>
