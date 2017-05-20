<?php

session_start();

require "conexionesBD.php";

$conexion = crearConexionBD();

    $query = "SELECT * FROM FACTURAS ORDER BY FECHAEMISION DESC";

    if(isset($_POST['consulta'])){
        $palabra = $_POST['consulta'];
        $query = "SELECT * FROM FACTURAS
        WHERE IDVENTA LIKE '%".$palabra."%' OR FECHAEMISION LIKE '%".$palabra."%'";
        $result=$conexion->prepare($query);
        $result->execute();

        $query2 = "SELECT COUNT(*) FROM FACTURAS
        WHERE IDVENTA LIKE '%".$palabra."%' OR FECHAEMISION LIKE '%".$palabra."%'";
        $resultrows=$conexion->prepare($query2);
        $resultrows->execute();
        $numrows=$resultrows->fetchColumn();
    }else{
        $result=$conexion->prepare($query);
        $result->execute();

        $query2 = "SELECT COUNT(*) FROM FACTURAS";
        $resultrows=$conexion->prepare($query2);
        $resultrows->execute();
        $numrows=$resultrows->fetchColumn();
    }

    if($numrows > 0){ ?>
        <table class='tabla_datos table table-condensed table-hover table-striped bootgrid-table' cellspacing='0'>
                    <thead>
                        <tr>
                            <th>Venta Nº</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
        while($fila = $result->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?php echo $fila['IDVENTA']; ?></td>
                <td><?php echo $fila['FECHAEMISION']; ?></td>
             <?php
             if(isset($_SESSION['usuario'])){
                 if($_SESSION['usuario']['TIPO'] == 'Propietario' || $_SESSION['usuario']['TIPO'] == 'Gerente'){?>
             <td><button onclick="deleteData(<?php echo $fila['IDFACTURA']; ?>)" class='btn btn-danger'>Eliminar</button></td>
             <?php   }
                 } ?>

            </tr>
    <?php    } ?>

        </tbody></table>

    <?php
    }else{
        echo "No se encontraron ventas con sus criterios de búsqueda.";
    }

cerrarConexionBD($conexion);

 ?>
