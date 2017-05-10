<?php
  /*
     * #===========================================================#
     * #	Este fichero contiene las funciones de gestión
     * #	de articulos de la capa de acceso a datos
     * #==========================================================#
     */

function consultarTodosArticulos($conexion) {

     	$consulta = "SELECT * FROM ARTICULOS ORDER BY NOMBREFAMILIA";

     	try {
     	    return $conexion->query($consulta);
     	}catch(PDOException $e){
     		$_SESSION['excepcion'] = $e->GetMessage();
     		header("Location: php/error.php");
     	}
}

function consultarListaArticulosFamilia($conexion,$familia) {

	$consulta = "SELECT * FROM ARTICULOS WHERE NOMBREFAMILIA=".$familia." ORDER BY TIPO";

	try {
	    return $conexion->query($consulta);
	}catch(PDOException $e){
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: php/error.php");
	}
}

function consultarListaArticulosSubfamilia($conexion,$familia,$subFamilia) {

	$consulta = "SELECT * FROM ARTICULOS WHERE (NOMBREFAMILIA=".$familia." AND NOMBRESUBFAMILIA=".$subfamilia.") ORDER BY NOMBRE";

	try {
	    return $conexion->query($consulta);
	}catch(PDOException $e){
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: php/error.php");
	}
}

function consultarArticulo($conexion,$nombreArticulo) {

	$consulta = "SELECT * FROM ARTICULOS WHERE (NOMBRE=".$nombreArticulo.") ORDER BY NOMBRE";

	try {
	    return $conexion->query($consulta);
	}catch(PDOException $e){
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: php/error.php");
	}
}

function quitar_articulo($conexion,$idArticulo) {
	try {
		$stmt=$conexion->prepare('CALL DEL_ARTICULO(:idArticulo)');
		$stmt->bindParam(':idArticulo',$idArticulo);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
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
		return $e->getMessage();
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
		return $e->getMessage();
    }
}

?>
