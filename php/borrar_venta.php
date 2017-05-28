<?php

require_once("conexionesBD.php");
require_once("gestionarVentas.php");

$conexion = crearConexionBD();

if(!empty($_POST)){
    $idVenta = $_POST['id'];

    quitar_venta($conexion,$idVenta);

}

cerrarConexionBD($conexion);
?>
