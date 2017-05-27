<?php

function nuevo_pedido($conexion,$fechaentrega,$importecompra,$idproveedor,$idalmacen) {
    $fecharealizacion = date('d-m-Y');
    $fechaEntregaFormat=date('d-m-Y',strtotime($fechaentrega));
	try {
        $query = "INSERT INTO PEDIDOS (IDPEDIDO,FECHAREALIZACION,FECHAENTREGA,IMPORTECOMPRA,IDPROVEEDOR,IDALMACEN)
         VALUES (sec_pedido.NEXTVAL,to_date('".$fecharealizacion."','dd-mm-yy'),to_date('".$fechaEntregaFormat."','dd-mm-yy'),:importecompra,:idproveedor,:idalmacen)";
		$stmt=$conexion->prepare($query);
		$stmt->bindParam(':importecompra',$importecompra);
        $stmt->bindParam(':idproveedor',$idproveedor);
        $stmt->bindParam(':idalmacen',$idalmacen);
		if($stmt->execute()){
            return true;
        }

	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

function editar_pedido($conexion,$idpedido,$fechaentrega,$importecompra,$idproveedor,$idalmacen) {
    $fechaEntregaFormat=date('d-m-Y',strtotime($fechaentrega));
	try {
        $query = "UPDATE PEDIDOS SET FECHAENTREGA=to_date('".$fechaEntregaFormat."','dd-mm-yy'),IMPORTECOMPRA=:importecompra,IDPROVEEDOR=:idproveedor,IDALMACEN=:idalmacen WHERE IDPEDIDO=:idpedido";
		$stmt=$conexion->prepare($query);
        $stmt->bindParam(':idpedido',$idpedido);
		$stmt->bindParam(':importecompra',$importecompra);
        $stmt->bindParam(':idproveedor',$idproveedor);
        $stmt->bindParam(':idalmacen',$idalmacen);
        $stmt->execute();
            return true;
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

function quitar_pedido($conexion,$idpedido) {
	try {
		$stmt=$conexion->prepare('CALL DEL_PEDIDO(:idpedido)');
        $stmt->bindParam(':idpedido',$idpedido);
		$stmt->execute();
		return true;
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}


 ?>
