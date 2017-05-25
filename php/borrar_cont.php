<?php

require_once("conexionesBD.php");
require_once("gestionContactos.php");

$conexion = crearConexionBD();

if(!empty($_POST)){
    $idContacto = $_POST['id'];

    quitar_contacto($conexion,$idContacto);

}

cerrarConexionBD($conexion);
?>
