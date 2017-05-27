<?php

require_once("conexionesBD.php");
require_once("gestionarArqueos.php");

$conexion = crearConexionBD();

if(!empty($_POST)){

        $idcaja = $_POST['id'];
        $contadocaja = $_POST['contadocaja'];
        $totalventas = $_POST['totalventas'];
        $dinerofiado = $_POST['dinerofiado'];
        $pagoproveedor = $_POST['pagoproveedor'];
        $dinerofiadodevuelto = $_POST['dinerofiadodevuelto'];
        $idgastos = $_POST['idgastos'];
        $idingreso = $_POST['idingreso'];


        editar_arqueo($conexion,$idcaja,$contadocaja,$totalventas,$dinerofiado,$pagoproveedor,$dinerofiadodevuelto,$idgastos,$idingreso);

    }
    cerrarConexionBD($conexion);
?>
