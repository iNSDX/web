<?php

session_start();

require_once("conexionesBD.php");
require_once("gestionarArticulos.php");

$conexion = crearConexionBD();


if(!empty($_POST)){

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

    $error="";
    $error = validarDatosArticulo($nombre,$precioCoste,$precioVenta,$base,$iva,$margen,$baja,$ventas,$stock,$familia);

    if ($error!="") {
        $_SESSION["errores"] = $error;
        Header('Location: ../error.php');
    }

    if(nuevo_articulo($conexion,$nombre,$descripcion,$precioCoste,$precioVenta,$base,$iva,$margen,$baja,$ventas,$stock,$familia,$subfamilia,$idprov,$idalm,$idprom)){

    $query = "SELECT * FROM ARTICULOS ORDER BY NOMBRE";
    $result=$conexion->prepare($query);
    $result->execute();
    ?>
        <table class='tabla_datos table table-condensed table-hover table-striped bootgrid-table' cellspacing='0'>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Familia</th>
                        <th>Precio €</th>
                    </tr>
                </thead>
                <tbody>
        <?php
    while($fila = $result->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><?php echo $fila['NOMBRE']; ?></td>
            <td><?php echo $fila['NOMBREFAMILIA']; ?></td>
            <td><?php echo $fila['PRECIOVENTA']; ?></td>

            <?php
            if(isset($_SESSION['usuario'])){
                if($_SESSION['usuario']['TIPO'] == 'Propietario' || $_SESSION['usuario']['TIPO'] == 'Gerente'){?>
                    <td><button type="button" name="edit" id="edit-<?php echo $fila['IDARTICULO']; ?>" data-toggle="modal"
                     data-target="#edit_data_Modal-<?php echo $fila['IDARTICULO']; ?>" class="btn btn-info">Editar</button>
                     <?php   }else{ ?>
                            <td><?php if($fila['STOCK']>0){
                                echo 'Sí';
                            }else{
                                echo 'No';
                            } ?></td>
                  <?php }
                     } ?>

                     <div id="edit_data_Modal-<?php echo $fila['IDARTICULO']; ?>" class="modal fade">
                         <div class="modal-dialog">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                                     <h4 class="modal-title">Editar artículo</h4>
                                 </div>
                                 <div class="modal-body">
                                     <form method="post" id="edit_form-<?php echo $fila['IDARTICULO']; ?>">
                                         <input type="hidden" name="id" id="<?php echo $fila['IDARTICULO']; ?>" value="<?php echo $fila['IDARTICULO']; ?>" class="artaux"/>
                                         <label>Nombre*</label>
                                         <input type="text" name="nombre" id="nombre-<?php echo $fila['IDARTICULO']; ?>" class="form-control" value="<?php echo $fila['NOMBRE']; ?>" required/>
                                         <br />
                                         <label>Familia*</label>
                                         <!--<input type="text" name="familia" id="familia" class="form-control"/>-->
                                         <select name="familia" id="familia-<?php echo $fila['IDARTICULO']; ?>" value="<?php echo $fila['NOMBREFAMILIA']; ?>" required>
                                             <option value="<?php echo $fila['NOMBREFAMILIA']; ?>">No cambiar</option>
                                             <option value="tabaco">Tabaco</option>
                                             <option value="golosinas">Golosinas</option>
                                             <option value="comestibles">Comestibles</option>
                                             <option value="papeleria">Papeleria</option>
                                             <option value="otros">Otros</option>
                                         </select>
                                         <br />
                                         <label>Precio*</label>
                                         <input type="number" step="any" min="0" name="precio" id="precio-<?php echo $fila['IDARTICULO']; ?>" value="<?php echo $fila['PRECIOVENTA']; ?>" class="form-control" required/>

                                         <label>Descripcion</label>
                                         <input type="text" name="descripcion" id="descripcion-<?php echo $fila['IDARTICULO']; ?>" value="<?php echo $fila['DESCRIPCION']; ?>" class="form-control"/>

                                         <label>Precio Coste*</label>
                                         <input type="number" step="any" min="0" name="precioCoste" id="precioCoste-<?php echo $fila['IDARTICULO']; ?>" value="<?php echo $fila['PRECIOCOSTO']; ?>" class="form-control" required/>

                                         <label>Base Imponible*</label>
                                         <input type="number" step="any" min="0" name="base" id="base-<?php echo $fila['IDARTICULO']; ?>" value="<?php echo $fila['BASEIMPONIBLE']; ?>" class="form-control" required/>
                                         <br />
                                         <label>Iva*</label>
                                         <!--<input type="text" name="iva" id="iva" class="form-control"/>-->
                                         <select name="iva" id="iva-<?php echo $fila['IDARTICULO']; ?>" value="<?php echo $fila['TIPOIVA']; ?>" required>
                                             <option value="<?php echo $fila['TIPOIVA']; ?>">No cambiar</option>
                                             <option value="iva1">21%</option>
                                             <option value="iva2">10%</option>
                                             <option value="iva3">8%</option>
                                         </select>
                                         <br />
                                         <label>Margen*</label>
                                         <!--<input type="text" name="margen" id="margen" class="form-control"/>-->
                                         <select name="margen" id="margen-<?php echo $fila['IDARTICULO']; ?>" value="<?php echo $fila['MARGEN']; ?>" required>
                                             <option value="<?php echo $fila['MARGEN']; ?>">No cambiar</option>
                                             <option value="margen1">margen1</option>
                                             <option value="margen2">margen2</option>
                                             <option value="margen3">margen3</option>
                                         </select>
                                         <br />
                                         <label>Dado de baja*</label>
                                         <!--<input type="text" name="baja" id="baja" class="form-control"/>-->
                                         <select name="baja" id="baja-<?php echo $fila['IDARTICULO']; ?>" value="<?php echo $fila['DADOBAJA']; ?>" required>
                                             <option value="<?php echo $fila['DADOBAJA']; ?>">No cambiar</option>
                                             <option value="0">False</option>
                                             <option value="1">True</option>
                                         </select>
                                         <br />
                                         <label>Numero de ventas*</label>
                                         <input type="number" name="ventas" min="0" id="ventas-<?php echo $fila['IDARTICULO']; ?>" value="<?php echo $fila['NUMEROVENTAS']; ?>" class="form-control" required/>

                                         <label>Stock*</label>
                                         <input type="number" name="stock" min="0" id="stock-<?php echo $fila['IDARTICULO']; ?>" value="<?php echo $fila['STOCK']; ?>" class="form-control" required/>
                                         <br />
                                         <label>Subfamilia</label>
                                         <!--<input type="text" name="subfamilia" id="subfamilia" class="form-control"/>-->
                                         <select name="subfamilia" id="subfamilia-<?php echo $fila['IDARTICULO']; ?>" value="<?php echo $fila['NOMBRESUBFAMILIA']; ?>">
                                             <option value="<?php echo $fila['NOMBRESUBFAMILIA']; ?>">No cambiar</option>
                                             <option value="gominolas">Gominolas</option>
                                             <option value="chicles">Chicles</option>
                                             <option value="patatasFritas">Patatas Fritas</option>
                                             <option value="cigarrillos">Cigarrillos</option>
                                             <option value="picadura">Picadura</option>
                                             <option value="puros">Puros</option>
                                             <option value="otros">Otros</option>
                                         </select>
                                         <br />
                                         <label>ID Proveedor</label>
                                         <input type="text" name="idprov" id="idprov-<?php echo $fila['IDARTICULO']; ?>" value="<?php echo $fila['IDPROVEEDOR']; ?>" class="form-control"/>

                                         <label>ID Almacén</label>
                                         <input type="text" name="idalm" id="idalm-<?php echo $fila['IDARTICULO']; ?>" value="<?php echo $fila['IDALMACEN']; ?>" class="form-control"/>

                                         <label>ID Promoción</label>
                                         <input type="text" name="idprom" id="idprom-<?php echo $fila['IDARTICULO']; ?>" value="<?php echo $fila['IDPROMOCION']; ?>" class="form-control"/>
                                         <br />
                                         <button type="submit" name="update" id="update-<?php echo $fila['IDARTICULO']; ?>" onclick="updateData(<?php echo $fila['IDARTICULO']; ?>)" class="btn btn-success">Update</button>
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
                 <td><button onclick="deleteData(<?php echo $fila['IDARTICULO']; ?>)" class='btn btn-danger'>Eliminar</button></td>
                 <?php   }
                     } ?>
                </tr>
        <?php    } ?>

    </tbody></table>
<?php
    }

    cerrarConexionBD($conexion);
}

function validarDatosArticulo($nombre,$precioCoste,$precioVenta,$base,$iva,$margen,$baja,$ventas,$stock,$familia){
    $errores="";

    if($nombre=="")
      $errores. "<p>El nombre no puede estar vacío</p>";

    if($precioVenta=="")
      $errores. "<p>Precio venta no puede estar vacío</p>";

    if($precioCoste=="")
      $errores. "<p>Precio coste no puede estar vacío</p>";

    if($base=="")
      $errores. "<p>Base imponible no puede estar vacía</p>";

    if($iva=="")
      $errores. "<p>Iva no puede estar vacío</p>";

    if($margen=="")
      $errores. "<p>Margen no puede estar vacío</p>";

    if($baja=="")
      $errores. "<p>Dado baja no puede estar vacío</p>";

    if($ventas=="")
      $errores. "<p>Nº ventas no puede estar vacío</p>";

    if($stock=="")
      $errores. "<p>Stock no puede estar vacío</p>";

    if($familia=="")
      $errores. "<p>Familia no puede estar vacía</p>";

    return $errores;
}

 ?>
