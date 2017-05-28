<?php

function consultarTodosArticulos($conexion) {

     	$consulta = "SELECT * FROM ARTICULOS ORDER BY NOMBREFAMILIA";

     	try {
     	    return $conexion->query($consulta);
     	}catch(PDOException $e){
     		$_SESSION['excepcion'] = $e->getMessage();
     		header("Location: ../error.php");
     	}
}

function consultarListaArticulosFamilia($conexion,$familia) {

	$consulta = "SELECT * FROM ARTICULOS WHERE NOMBREFAMILIA=".$familia." ORDER BY TIPO";

	try {
	    return $conexion->query($consulta);
	}catch(PDOException $e){
		$_SESSION['excepcion'] = $e->getMessage();
		header("Location: ../error.php");
	}
}

function consultarListaArticulosSubfamilia($conexion,$familia,$subFamilia) {

	$consulta = "SELECT * FROM ARTICULOS WHERE (NOMBREFAMILIA=".$familia." AND NOMBRESUBFAMILIA=".$subfamilia.") ORDER BY NOMBRE";

	try {
	    return $conexion->query($consulta);
	}catch(PDOException $e){
		$_SESSION['excepcion'] = $e->getTrace();
		header("Location: ../error.php");
	}
}

function consultarArticulo($conexion,$nombreArticulo) {

	$consulta = "SELECT * FROM ARTICULOS WHERE (NOMBRE=".$nombreArticulo.") ORDER BY NOMBRE";

	try {
	    return $conexion->query($consulta);
	}catch(PDOException $e){
		$_SESSION['excepcion'] = $e->getMessage();
		header("Location: ../error.php");
	}
}

function nuevo_articulo($conexion,$nombre,$descripcion,$precioCoste,$precioVenta,$base,$iva,$margen,$baja,$ventas,$stock,$familia,$subfamilia,$idprov,$idalm,$idprom) {
	try {
        $query = 'INSERT INTO ARTICULOS (IDARTICULO,NOMBRE,DESCRIPCION,PRECIOCOSTO,PRECIOVENTA,BASEIMPONIBLE,TIPOIVA,MARGEN,DADOBAJA,NUMEROVENTAS,STOCK,NOMBREFAMILIA,
        NOMBRESUBFAMILIA,IDPROVEEDOR,IDALMACEN,IDPROMOCION) VALUES (sec_art.NEXTVAL,:nombre,:descripcion,:precioCoste,:precioVenta,:base,:iva,:margen,:baja,:ventas,:stock,:familia,:subfamilia,:idprov,:idalm,:idprom)';
		$stmt=$conexion->prepare($query);
		$stmt->bindParam(':nombre',$nombre);
		$stmt->bindParam(':descripcion',$descripcion);
        $stmt->bindParam(':precioCoste',$precioCoste);
        $stmt->bindParam(':precioVenta',$precioVenta);
        $stmt->bindParam(':base',$base);
        $stmt->bindParam(':iva',$iva);
        $stmt->bindParam(':margen',$margen);
        $stmt->bindParam(':baja',$baja);
        $stmt->bindParam(':ventas',$ventas);
        $stmt->bindParam(':stock',$stock);
        $stmt->bindParam(':familia',$familia);
        $stmt->bindParam(':subfamilia',$subfamilia);
        $stmt->bindParam(':idprov',$idprov);
        $stmt->bindParam(':idalm',$idalm);
        $stmt->bindParam(':idprom',$idprom);
		$stmt->execute();
		return true;
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

function editar_articulo($conexion,$idarticulo,$nombre,$descripcion,$precioCoste,$precioVenta,$base,$iva,$margen,$baja,$ventas,$stock,$familia,$subfamilia,$idprov,$idalm,$idprom) {
	try {
        $query = 'UPDATE ARTICULOS SET NOMBRE=:nombre,DESCRIPCION=:descripcion,PRECIOCOSTO=:precioCoste,PRECIOVENTA=:precioVenta,BASEIMPONIBLE=:base,TIPOIVA=:iva,MARGEN=:margen,DADOBAJA=:baja,NUMEROVENTAS=:ventas,STOCK=:stock,NOMBREFAMILIA=:familia,
        NOMBRESUBFAMILIA=:subfamilia,IDPROVEEDOR=:idprov,IDALMACEN=:idalm,IDPROMOCION=:idprom WHERE IDARTICULO=:idarticulo';
		$stmt=$conexion->prepare($query);
        $stmt->bindParam(':idarticulo',$idarticulo);
		$stmt->bindParam(':nombre',$nombre);
		$stmt->bindParam(':descripcion',$descripcion);
        $stmt->bindParam(':precioCoste',$precioCoste);
        $stmt->bindParam(':precioVenta',$precioVenta);
        $stmt->bindParam(':base',$base);
        $stmt->bindParam(':iva',$iva);
        $stmt->bindParam(':margen',$margen);
        $stmt->bindParam(':baja',$baja);
        $stmt->bindParam(':ventas',$ventas);
        $stmt->bindParam(':stock',$stock);
        $stmt->bindParam(':familia',$familia);
        $stmt->bindParam(':subfamilia',$subfamilia);
        $stmt->bindParam(':idprov',$idprov);
        $stmt->bindParam(':idalm',$idalm);
        $stmt->bindParam(':idprom',$idprom);
        $stmt->execute();
            return true;
	} catch(PDOException $e) {
		return $e->getTrace();
    }
}

function quitar_articulo($conexion,$idArticulo) {
	try {
		$stmt=$conexion->prepare('CALL DEL_ARTICULO(:idArticulo)');
		$stmt->bindParam(':idArticulo',$idArticulo);
		$stmt->execute();
		return true;
	} catch(PDOException $e) {
		return $e->getTrace();
    }
}

function modificar_nombre_articulo($conexion,$idArticulo,$nuevoNombre) {
	try {
		$stmt=$conexion->prepare('CALL MOD_NOMBRE_ARTICULO(:idArticulo,:nuevoNombre)');
		$stmt->bindParam(':idArticulo',$idArticulo);
		$stmt->bindParam(':nuevoNombre',$nuevoNombre);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

function modificar_descripcion_articulo($conexion,$idArticulo,$nuevaDescripcion) {
	try {
		$stmt=$conexion->prepare('CALL MOD_DESC_ARTICULO(:idArticulo,:nuevaDescripcion)');
		$stmt->bindParam(':idArticulo',$idArticulo);
		$stmt->bindParam(':nuevaDescripcion',$nuevaDescripcion);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getLine();
    }
}

function modificar_precioventa_articulo($conexion,$idArticulo,$nuevoPrecio) {
	try {
		$stmt=$conexion->prepare('CALL MOD_PV_ARTICULO(:idArticulo,:nuevoPrecio)');
		$stmt->bindParam(':idArticulo',$idArticulo);
		$stmt->bindParam(':nuevoPrecio',$nuevoPrecio);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getLine();
    }
}


?>
