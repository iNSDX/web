<?php

session_start();

require "conexionesBD.php";

$conexion = crearConexionBD();

    $query = "SELECT * FROM PEDIDOS ORDER BY FECHAREALIZACION DESC";

    if(isset($_POST['consulta'])){
        $palabra = $_POST['consulta'];
        $query = "SELECT * FROM PEDIDOS
        WHERE IDPEDIDO LIKE '%".$palabra."%' OR FECHAREALIZACION LIKE '%".$palabra."%'
        OR FECHAENTREGA LIKE '%".$palabra."%' OR IMPORTECOMPRA LIKE '%".$palabra."%'";
        $result=$conexion->prepare($query);
        $result->execute();

        $query2 = "SELECT COUNT(*) FROM PEDIDOS
        WHERE IDPEDIDO LIKE '%".$palabra."%' OR FECHAREALIZACION LIKE '%".$palabra."%'
        OR FECHAENTREGA LIKE '%".$palabra."%' OR IMPORTECOMPRA LIKE '%".$palabra."%'";
        $resultrows=$conexion->prepare($query2);
        $resultrows->execute();
        $numrows=$resultrows->fetchColumn();
    }else{
        $result=$conexion->prepare($query);
        $result->execute();

        $query2 = "SELECT COUNT(*) FROM PEDIDOS";
        $resultrows=$conexion->prepare($query2);
        $resultrows->execute();
        $numrows=$resultrows->fetchColumn();
    }

    if($numrows > 0){ ?>
        <table class='tabla_datos table table-condensed table-hover table-striped bootgrid-table' cellspacing='0'>
                    <thead>
                        <tr>
                            <th>Pedido Nº</th>
                            <th>Fecha de Realización</th>
                            <th>Fecha de Entrega</th>
                            <th>Importe</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
        while($fila = $result->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?php echo $fila['IDPEDIDO']; ?></td>
                <td><?php echo $fila['FECHAREALIZACION']; ?></td>
                <td><?php echo $fila['FECHAENTREGA']; ?></td>
                <td><?php echo $fila['IMPORTECOMPRA']; ?></td>
                
                            <?php
                if(isset($_SESSION['usuario'])){
                    if($_SESSION['usuario']['TIPO'] == 'Propietario' || $_SESSION['usuario']['TIPO'] == 'Gerente'){?>
                <td><button type="button" name="edit" id="edit-<?php echo $fila['IDPEDIDO']; ?>" data-toggle="modal"
                 data-target="#edit_data_Modal-<?php echo $fila['IDPEDIDO']; ?>" class="btn btn-info">Editar</button>
                 <?php   }
                     } ?>

                 <div id="edit_data_Modal-<?php echo $fila['IDPEDIDO']; ?>" class="modal fade">
                     <div class="modal-dialog">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                                 <h4 class="modal-title">Editar pedido</h4>
                             </div>
                             <div class="modal-body">
                                 <form method="post" id="edit_pedido_form-<?php echo $fila['IDPEDIDO']; ?>">
                                     <input type="hidden" name="id" id="<?php echo $fila['IDPEDIDO']; ?>" value="<?php echo $fila['IDPEDIDO']; ?>"/>
                                     <label>Fecha de Entrega</label>
								     <input type="date" name="fechaentrega" id="fechaentrega-<?php echo $fila['IDPEDIDO']; ?>" class="form-control" value="<?php echo $fila['FECHAENTREGA']; ?>" />
									 <br />
                                     <label>Importe*</label>
                                     <input type="text" name="importecompra" id="importecompra-<?php echo $fila['IDPEDIDO']; ?>" class="form-control" value="<?php echo $fila['IMPORTECOMPRA']; ?>" required/>
                                     <br />
                                     <label>Id Proveedor</label>
                                     <input type="number" step="any" min="0" name="idproveedor" id="idproveedor-<?php echo $fila['IDPEDIDO']; ?>" class="form-control" value="<?php echo $fila['IDPROVEEDOR']; ?>"/>
                                     <br />
                                     <label>Id Almacén</label>
                                     <input type="number" step="any" min="0" name="idalmacen" id="idalmacen-<?php echo $fila['IDPEDIDO']; ?>" class="form-control" value="<?php echo $fila['IDALMACEN']; ?>"/>
                                     <br />
                                     <button type="submit" name="update" id="update-<?php echo $fila['IDPEDIDO']; ?>" onclick="updateData(<?php echo $fila['IDPEDIDO']; ?>)" class="btn btn-success">Update</button>
                                 </form>
                             </div>
                             <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                             </div>
                         </div>
                     </div>
                 </div>
             </td>
             <?php
             if(isset($_SESSION['usuario'])){
                 if($_SESSION['usuario']['TIPO'] == 'Propietario'){?>
             <td><button onclick="deleteData(<?php echo $fila['IDPEDIDO']; ?>)" class='btn btn-danger'>Eliminar</button></td>
             <?php   }
                 } ?>
            </tr>
    <?php    } ?>

        </tbody></table>

    <?php
    }else{
        echo "No se encontraron pedidos con sus criterios de búsqueda.";
    }

cerrarConexionBD($conexion);

 ?>
