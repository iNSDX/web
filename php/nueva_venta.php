<?php


require_once("conexionesBD.php");
require_once("gestionarVentas.php");

$conexion = crearConexionBD();

if(!empty($_POST)){

	$importe = $_POST['importe'];
	$fiado = $_POST['fiado'];
	$idcaja = $_POST['idcaja'];
	$idingreso = $_POST['idingreso'];

	if(nueva_venta($conexion,$importe,$fiado,$idcaja,$idingreso)){
		$query = "SELECT * FROM VENTAS ORDER BY FECHA DESC";
		$result=$conexion->prepare($query);
		$result->execute();
		?>
		<table class='tabla_datos table table-condensed table-hover table-striped bootgrid-table' cellspacing='0'>
                    <thead>
                        <tr>
                            <th>Venta Nº</th>
                            <th>Fecha</th>
                            <th>Importe</th>
                            <th>Fiado</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
        while($fila = $result->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?php echo $fila['IDVENTA']; ?></td>
                <td><?php echo $fila['FECHA']; ?></td>
                <td><?php echo $fila['IMPORTE']; ?></td>
                <td><?php if($fila['FIADO']=='0'){
                          echo 'No';
                      }else if($fila['FIADO']=='1'){
                          echo 'Sí';
                      } ?></td>
                <?php
                if(isset($_SESSION['usuario'])){
                    if($_SESSION['usuario']['TIPO'] == 'Propietario' || $_SESSION['usuario']['TIPO'] == 'Gerente'){?>
                <td><button type="button" name="edit" id="edit-<?php echo $fila['IDVENTA']; ?>" data-toggle="modal"
                 data-target="#edit_data_Modal-<?php echo $fila['IDVENTA']; ?>" class="btn btn-info">Editar</button>
                 <?php   }
                     } ?>

                 <div id="edit_data_Modal-<?php echo $fila['IDVENTA']; ?>" class="modal fade">
                     <div class="modal-dialog">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                                 <h4 class="modal-title">Editar artículo</h4>
                             </div>
                             <div class="modal-body">
                                 <form method="post" id="edit_venta_form-<?php echo $fila['IDVENTA']; ?>">
                                     <input type="hidden" name="id" id="<?php echo $fila['IDVENTA']; ?>" value="<?php echo $fila['IDVENTA']; ?>"/>
                                     <label>Importe*</label>
                                     <input type="text" name="importe" id="importe-<?php echo $fila['IDVENTA']; ?>" class="form-control" value="<?php echo $fila['IMPORTE']; ?>" required/>
                                     <br />
                                     <label>Fiado*</label>
                                     <!--<input type="text" name="familia" id="familia" class="form-control"/>-->
                                     <select name="fiado" id="fiado-<?php echo $fila['IDVENTA']; ?>" required>
                                         <option value="<?php echo $fila['FIADO']; ?>">No cambiar</option>
                                         <option value="0">No</option>
                                         <option value="1">Sí</option>
                                     </select>
                                     <br />
                                     <label>Id Caja</label>
                                     <input type="number" step="any" min="0" name="idcaja" id="idcaja-<?php echo $fila['IDVENTA']; ?>" class="form-control" value="<?php echo $fila['IDCAJA']; ?>"/>
                                     <br />
                                     <label>Id Ingreso</label>
                                     <input type="number" step="any" min="0" name="idingreso" id="idingreso-<?php echo $fila['IDVENTA']; ?>" class="form-control" value="<?php echo $fila['IDINGRESO']; ?>"/>
                                     <br />
                                     <button type="submit" name="update" id="update-<?php echo $fila['IDVENTA']; ?>" onclick="updateData(<?php echo $fila['IDVENTA']; ?>)" class="btn btn-success">Update</button>
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
             <td><button onclick="deleteData(<?php echo $fila['IDVENTA']; ?>)" class='btn btn-danger'>Eliminar</button></td>
             <?php   }
                 } ?>
            </tr>
    <?php    } ?>

        </tbody></table>
<?php	}

}

cerrarConexionBD($conexion);

?>
