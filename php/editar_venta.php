<?php

require_once("conexionesBD.php");
require_once("gestionarVentas.php");

$conexion = crearConexionBD();

if(!empty($_POST)){

        $idventa = $_POST['id'];
        $importe = $_POST['importe'];
        $fiado = $_POST['fiado'];
        $idcaja = $_POST['idcaja'];
        $idingreso = $_POST['idingreso'];

        editar_venta($conexion,$idventa,$importe,$fiado,$idcaja,$idingreso);

    }
    cerrarConexionBD($conexion);
?>
