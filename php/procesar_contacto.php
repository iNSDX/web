<?php

	session_start();

	if(isset($_SESSION['contactook'])){
		Header('Location: ../index.php');
	}

require "conexionesBD.php";
require "gestionContactos.php";

		$conexion=crearConexionBD();

		$contacto["nombre"] = $_POST['fname'];
		$contacto["apellidos"] = $_POST['lname'];
		$contacto["email"]= $_POST['email'];
		$contacto["mensaje"] = $_POST['message'];

		$_SESSION["contacto"] = $contacto;

		$errores = validarDatosContacto($contacto);

		if (count($errores)>0) {
			$_SESSION["errores"] = $errores;
			Header('Location: error.php');
		}else{
			if(isset($_SESSION["contacto"]) && nuevo_contacto($conexion,$contacto)){
				$_SESSION['contactook']= "Contacto mandado correctamente.";
				Header('Location: ../exito_contacto.php');
			}
		}

function validarDatosContacto($contacto){

	if($contacto["nombre"]=="")
	  $errores[]= "<p>El nombre no puede estar vacío</p>";

	if($contacto["apellidos"]=="")
	  $errores[]= "<p>Los apellidos no pueden estar vacíos</p>";

	if($contacto["email"]==""){
	  $errores[]= "<p>El email no puede estar vacío</p>";
    }else if(!filter_var($contacto["email"], FILTER_VALIDATE_EMAIL)){
	  $errores[]= $error . "<p>El email es incorrecto: " . $contacto["email"]. "</p>";
	}

    if($contacto["mensaje"]==""){
	  $errores[]= "<p>El mensaje no puede estar vacío</p>";
  	}

	return $errores;
}

cerrarConexionBD($conexion);

?>
