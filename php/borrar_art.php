<?php

require_once("conexionesBD.php");
require_once("gestionarArticulos.php");

$conexion = crearConexionBD();

if(!empty($_POST)){
    $idArticulo = $_POST['id'];

    quitar_articulo($conexion,$idArticulo);

}

cerrarConexionBD($conexion);
?>
