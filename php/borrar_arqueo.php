<?php

require_once("conexionesBD.php");
require_once("gestionarArqueos.php");

$conexion = crearConexionBD();

if(!empty($_POST)){
    $idCaja = $_POST['id'];

    quitar_arqueo($conexion,$idCaja);

}

cerrarConexionBD($conexion);
?>
