<?php
	session_start();

	if (isset($_SESSION["formulario"])) {
		$nuevoUsuario["nombre"] = $_REQUEST["nombre"];
		$nuevoUsuario["apellidos"] = $_REQUEST["apellidos"];
		$nuevoUsuario["email"] = $_REQUEST["email"];
		$nuevoUsuario["fechaNacimiento"] = $_REQUEST["fechaNacimiento"];
		$nuevoUsuario["pass"] = $_REQUEST["pass"];
		$nuevoUsuario["confirmpass"] = $_REQUEST["confirmpass"];
	}
	else
		Header("Location: index.php");

	$_SESSION["formulario"] = $nuevoUsuario;

	$errores = validarDatosUsuario($nuevoUsuario);

	if (count($errores)>0) {
		$_SESSION["errores"] = $errores;
		Header('Location: error.php');
	} else
		Header('Location: index.php');

	function validarDatosUsuario($nuevoUsuario){
		if($nuevoUsuario["nombre"]=="")
			$errores[] = "<p>El nombre no puede estar vacío</p>";

		if($nuevoUsuario["email"]==""){
			$errores[] = "<p>El email no puede estar vacío</p>";
		}else if(!filter_var($nuevoUsuario["email"], FILTER_VALIDATE_EMAIL)){
			$errores[] = $error . "<p>El email es incorrecto: " . $nuevoUsuario["email"]. "</p>";
		}

		if(!isset($nuevoUsuario["pass"]) || strlen($nuevoUsuario["pass"])<8){
			$errores [] = "<p>Contraseña no válida: debe tener al menos 8 caracteres</p>";
		}else if(!preg_match("/[a-z]+/", $nuevoUsuario["pass"]) ||
			!preg_match("/[A-Z]+/", $nuevoUsuario["pass"]) || !preg_match("/[0-9]+/", $nuevoUsuario["pass"])){
			$errores[] = "<p>Contraseña no válida: debe contener letras mayúsculas y minúsculas y dígitos</p>";
		}else if($nuevoUsuario["pass"] != $nuevoUsuario["confirmpass"]){
			$errores[] = "<p>La confirmación de contraseña no coincide con la contraseña</p>";
		}

		return $errores;
	}

?>
