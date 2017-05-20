<?php

require_once("conexionesBD.php");
require_once("gestionarFacturas.php");

$conexion = crearConexionBD();

if(!empty($_POST)){
    $idFactura = $_POST['id'];

    quitar_factura($conexion,$idFactura);

}

cerrarConexionBD($conexion);
?>
