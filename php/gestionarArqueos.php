<?php

function nuevo_arqueo($conexion,$contadocaja,$totalventas,$dinerofiado,$pagoproveedor,$dinerofiadodevuelto,$idgastos,$idingreso) {
    $fecha = date('d-m-Y');
	try {
        $query = "INSERT INTO ARQUEOSCAJAS (IDCAJA,FECHA,CONTADOCAJA,TOTALVENTAS,DINEROFIADO,PAGOPROVEEDOR,DINEROFIADODEVUELTO,IDGASTOS,IDINGRESO)
         VALUES (sec_arqueo.NEXTVAL,to_date('".$fecha."','dd-mm-yy'),:contadocaja,:totalventas,:dinerofiado,:pagoproveedor,:dinerofiadodevuelto,:idgastos,:idingreso)";
		$stmt=$conexion->prepare($query);
		$stmt->bindParam(':contadocaja',$contadocaja);
        $stmt->bindParam(':totalventas',$totalventas);
        $stmt->bindParam(':dinerofiado',$dinerofiado);
        $stmt->bindParam(':pagoproveedor',$pagoproveedor);
        $stmt->bindParam(':dinerofiadodevuelto',$dinerofiadodevuelto);
        $stmt->bindParam(':idgastos',$idgastos);
        $stmt->bindParam(':idingreso',$idingreso);
		if($stmt->execute()){
            return true;
        }

	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

function editar_arqueo($conexion,$idcaja,$contadocaja,$totalventas,$dinerofiado,$pagoproveedor,$dinerofiadodevuelto,$idgastos,$idingreso) {
	try {
        $query = 'UPDATE ARQUEOSCAJAS SET CONTADOCAJA=:contadocaja,TOTALVENTAS=:totalventas,DINEROFIADO=:dinerofiado,PAGOPROVEEDOR=:pagoproveedor,DINEROFIADODEVUELTO=:dinerofiadodevuelto,IDGASTOS=:idgastos,IDINGRESO=:idingreso WHERE IDCAJA=:idcaja';
		$stmt=$conexion->prepare($query);
        $stmt->bindParam(':idcaja',$idcaja);
		$stmt->bindParam(':contadocaja',$contadocaja);
        $stmt->bindParam(':totalventas',$totalventas);
        $stmt->bindParam(':dinerofiado',$dinerofiado);
        $stmt->bindParam(':pagoproveedor',$pagoproveedor);
        $stmt->bindParam(':dinerofiadodevuelto',$dinerofiadodevuelto);
        $stmt->bindParam(':idgastos',$idgastos);
        $stmt->bindParam(':idingreso',$idingreso);
        $stmt->execute();
            return true;
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

function quitar_arqueo($conexion,$idcaja) {
	try {
		$stmt=$conexion->prepare('CALL DEL_ARQUEOCAJA(:idcaja)');
		$stmt->bindParam(':idcaja',$idcaja);
		$stmt->execute();
		return true;
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

 ?>
