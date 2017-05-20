<?php

function quitar_factura($conexion,$idFactura){
    try {
        $stmt=$conexion->prepare('CALL DEL_FACTURA(:idFactura)');
        $stmt->bindParam(':idFactura',$idFactura);
        $stmt->execute();
        return true;
    } catch(PDOException $e) {
        return $e->getMessage();
    }
}

 ?>
