<?php

function nueva_venta($conexion,$importe,$fiado,$idcaja,$idingreso) {
    $fecha = date('d-m-Y');
	try {
        $query = "INSERT INTO VENTAS (IDVENTA,FECHA,IMPORTE,IDEMPLEADO,FIADO,IDCAJA,IDINGRESO)
         VALUES (sec_ven.NEXTVAL,to_date('".$fecha."','dd-mm-yy'),:importe,null,:fiado,:idcaja,:idingreso)";
		$stmt=$conexion->prepare($query);
		$stmt->bindParam(':importe',$importe);
        $stmt->bindParam(':fiado',$fiado);
        $stmt->bindParam(':idcaja',$idcaja);
        $stmt->bindParam(':idingreso',$idingreso);
		if($stmt->execute()){
            return true;
        }

	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

function editar_venta($conexion,$idventa,$importe,$fiado,$idcaja,$idingreso) {
	try {
        $query = 'UPDATE VENTAS SET IMPORTE=:importe,FIADO=:fiado,IDCAJA=:idcaja,IDINGRESO=:idingreso WHERE IDVENTA=:idventa';
		$stmt=$conexion->prepare($query);
        $stmt->bindParam(':idventa',$idventa);
		$stmt->bindParam(':importe',$importe);
		$stmt->bindParam(':fiado',$fiado);
        $stmt->bindParam(':idcaja',$idcaja);
        $stmt->bindParam(':idingreso',$idingreso);
        $stmt->execute();
            return true;
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

function quitar_venta($conexion,$idVenta) {
	try {
		$stmt=$conexion->prepare('CALL DEL_VENTA(:idVenta)');
		$stmt->bindParam(':idVenta',$idVenta);
		$stmt->execute();
		return true;
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

function nuevaFactura($conexion,$idVenta){
    $fecha = date('d-m-Y');
    try{
        $stmt=$conexion->prepare("INSERT INTO FACTURAS VALUES (sec_fac.NEXTVAL,:idVenta,to_date('".$fecha."','dd-mm-yy'),150)");
        $stmt->bindParam(':idVenta',$idVenta);
		$stmt->execute();
		return true;
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

 ?>
