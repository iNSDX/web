<?php

session_start();

require "conexionesBD.php";

$conexion = crearConexionBD();

    $query = "SELECT * FROM ARQUEOSCAJAS ORDER BY FECHA DESC";

    if(isset($_POST['consulta'])){
        $palabra = $_POST['consulta'];
        $query = "SELECT * FROM ARQUEOSCAJAS
        WHERE IDCAJA LIKE '%".$palabra."%' OR FECHA LIKE '%".$palabra."%'";
        $result=$conexion->prepare($query);
        $result->execute();

        $query2 = "SELECT COUNT(*) FROM ARQUEOSCAJAS
        WHERE IDCAJA LIKE '%".$palabra."%' OR FECHA LIKE '%".$palabra."%'";
        $resultrows=$conexion->prepare($query2);
        $resultrows->execute();
        $numrows=$resultrows->fetchColumn();
    }else{
        $result=$conexion->prepare($query);
        $result->execute();

        $query2 = "SELECT COUNT(*) FROM ARQUEOSCAJAS";
        $resultrows=$conexion->prepare($query2);
        $resultrows->execute();
        $numrows=$resultrows->fetchColumn();
    }

    if($numrows > 0){ ?>
        <table class='tabla_datos table table-condensed table-hover table-striped bootgrid-table' cellspacing='0'>
                    <thead>
                        <tr>
                            <th>Arqueo Nº</th>
                            <th>Fecha</th>
                            <th>Contado en caja</th>
                            <th>Importe total de ventas</th>
                            <th>Total fiado</th>
                            <th>Pagos a proveedores</th>
                            <th>Total fiado devuelto</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
        while($fila = $result->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?php echo $fila['IDCAJA']; ?></td>
                <td><?php echo $fila['FECHA']; ?></td>
                <td><?php echo $fila['CONTADOCAJA']; ?></td>
                <td><?php echo $fila['TOTALVENTAS']; ?></td>
                <td><?php echo $fila['DINEROFIADO']; ?></td>
                <td><?php echo $fila['PAGOPROVEEDOR']; ?></td>
                <td><?php echo $fila['DINEROFIADODEVUELTO']; ?></td>

                <?php
                if(isset($_SESSION['usuario'])){
                    if($_SESSION['usuario']['TIPO'] == 'Propietario' || $_SESSION['usuario']['TIPO'] == 'Gerente'){?>
                <td><button type="button" name="edit" id="edit-<?php echo $fila['IDCAJA']; ?>" data-toggle="modal"
                 data-target="#edit_data_Modal-<?php echo $fila['IDCAJA']; ?>" class="btn btn-info">Editar</button>
                 <?php   }
                     } ?>

                 <div id="edit_data_Modal-<?php echo $fila['IDCAJA']; ?>" class="modal fade">
                     <div class="modal-dialog">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                                 <h4 class="modal-title">Editar arqueo</h4>
                             </div>
                             <div class="modal-body">
                                 <form method="post" id="edit_arqueo_form-<?php echo $fila['IDCAJA']; ?>">
                                     <input type="hidden" name="id" id="<?php echo $fila['IDCAJA']; ?>" value="<?php echo $fila['IDCAJA']; ?>"/>
                                     <label>Contado en caja</label>
                                     <input type="text" name="contadocaja" id="contadocaja-<?php echo $fila['IDCAJA']; ?>" class="form-control" value="<?php echo $fila['CONTADOCAJA']; ?>" required/>
                                     <br />
                                     <label>Importe total de ventas</label>
                                     <input type="text" name="totalventas" id="totalventas-<?php echo $fila['IDCAJA']; ?>" class="form-control" value="<?php echo $fila['TOTALVENTAS']; ?>" required/>
                                     <br />
                                     <label>Total fiado</label>
                                     <input type="text" name="dinerofiado" id="dinerofiado-<?php echo $fila['IDCAJA']; ?>" class="form-control" value="<?php echo $fila['DINEROFIADO']; ?>" required/>
                                     <br />
                                     <label>Pagos a proveedores</label>
                                     <input type="text" name="pagoproveedor" id="pagoproveedor-<?php echo $fila['IDCAJA']; ?>" class="form-control" value="<?php echo $fila['PAGOPROVEEDOR']; ?>" required/>
                                     <br />
                                     <label>Total fiado devuelto</label>
                                     <input type="text" name="dinerofiadodevuelto" id="dinerofiadodevuelto-<?php echo $fila['IDCAJA']; ?>" class="form-control" value="<?php echo $fila['DINEROFIADODEVUELTO']; ?>" required/>
                                     <br />
                                     <label>Id Gasto</label>
                                     <input type="number" step="any" min="0" name="idgastos" id="idgastos-<?php echo $fila['IDCAJA']; ?>" class="form-control" value="<?php echo $fila['IDGASTOS']; ?>"/>
                                     <br />
                                     <label>Id Ingreso</label>
                                     <input type="number" step="any" min="0" name="idingreso" id="idingreso-<?php echo $fila['IDCAJA']; ?>" class="form-control" value="<?php echo $fila['IDINGRESO']; ?>"/>
                                     <br />
                                     <button type="submit" name="update" id="update-<?php echo $fila['IDCAJA']; ?>" onclick="updateData(<?php echo $fila['IDCAJA']; ?>)" class="btn btn-success">Update</button>
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
                 if($_SESSION['usuario']['TIPO'] == 'Propietario' || $_SESSION['usuario']['TIPO'] == 'Gerente'){?>
             <td><button onclick="deleteData(<?php echo $fila['IDCAJA']; ?>)" class='btn btn-danger'>Eliminar</button></td>
             <?php   }
                 } ?>
            </tr>
    <?php    } ?>

        </tbody></table>

    <?php
    }else{
        echo "No se encontraron arqueos con sus criterios de búsqueda.";
    }

cerrarConexionBD($conexion);

 ?>
