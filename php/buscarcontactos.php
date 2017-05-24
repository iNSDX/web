<?php

session_start();

require "conexionesBD.php";

$conexion = crearConexionBD();

    $query = "SELECT * FROM CONTACTOS ORDER BY IDCONTACTO DESC";

    if(isset($_POST['consulta'])){
        $palabra = $_POST['consulta'];
        $query = "SELECT * FROM CONTACTOS
        WHERE IDCONTACTO LIKE '%".$palabra."%' OR EMAIL LIKE '%".$palabra."%' OR NOMBRE LIKE '%".$palabra."%' OR APELLIDOS LIKE '%".$palabra."%'";
        $result=$conexion->prepare($query);
        $result->execute();

        $query2 = "SELECT COUNT(*) FROM CONTACTOS
        WHERE IDCONTACTO LIKE '%".$palabra."%' OR EMAIL LIKE '%".$palabra."%' OR NOMBRE LIKE '%".$palabra."%' OR APELLIDOS LIKE '%".$palabra."%'";
        $resultrows=$conexion->prepare($query2);
        $resultrows->execute();
        $numrows=$resultrows->fetchColumn();
    }else{
        $result=$conexion->prepare($query);
        $result->execute();

        $query2 = "SELECT COUNT(*) FROM CONTACTOS";
        $resultrows=$conexion->prepare($query2);
        $resultrows->execute();
        $numrows=$resultrows->fetchColumn();
    }

    if($numrows > 0){ ?>
        <table class='tabla_datos table table-condensed table-hover table-striped bootgrid-table' cellspacing='0'>
                    <thead>
                        <tr>
                            <th>Contacto Nº</th>
                            <th>Email</th>
                            <th>Mensaje</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
        while($fila = $result->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?php echo $fila['IDCONTACTO']; ?></td>
                <td><?php echo $fila['EMAIL']; ?></td>
                <td><?php echo $fila['MENSAJE']; ?></td>
             <?php
             if(isset($_SESSION['usuario'])){
                 if($_SESSION['usuario']['TIPO'] == 'Propietario' || $_SESSION['usuario']['TIPO'] == 'Gerente'){?>
             <td><button onclick="deleteData(<?php echo $fila['IDCONTACTO']; ?>)" class='btn btn-danger'>Eliminar</button></td>
             <?php   }
                 } ?>

            </tr>
    <?php    } ?>

        </tbody></table>

    <?php
    }else{
        echo "No se encontraron contactos con sus criterios de búsqueda.";
    }

cerrarConexionBD($conexion);

 ?>
