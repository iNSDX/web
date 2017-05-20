<?php

require_once("conexionesBD.php");
require_once("gestionarArticulos.php");

$conexion = crearConexionBD();

if(!empty($_POST)){

        $idarticulo = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precioCoste = $_POST['precioCoste'];
        $precioVenta = $_POST['precio'];
        $base = $_POST['base'];
        $iva = $_POST['iva'];
        $margen = $_POST['margen'];
        $baja = $_POST['baja'];
        $ventas = $_POST['ventas'];
        $stock = $_POST['stock'];
        $familia = $_POST['familia'];
        $subfamilia = $_POST['subfamilia'];
        $idprov = $_POST['idprov'];
        $idalm = $_POST['idalm'];
        $idprom = $_POST['idprom'];

        editar_articulo($conexion,$idarticulo,$nombre,$descripcion,$precioCoste,$precioVenta,$base,$iva,$margen,$baja,$ventas,$stock,$familia,$subfamilia,$idprov,$idalm,$idprom);

    }
    cerrarConexionBD($conexion);
?>
