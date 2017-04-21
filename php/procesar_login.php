<?php
	session_start();

  	include_once("conexionesBD.php");
 	include_once("gestionClientes.php");

	// SI HAY INFORMACIÓN EN $_POST ENTONCES ES QUE
	// YA SE HA INTRODUCIDO PREVIAMENTE EMAIL Y PASS
	// ENTONCES:
	// - RECOGEMOS LOS DATOS DE EMAIL Y PASS EN VARIABLES LOCALES
	// - SE CREA LA CONEXIÓN A LA BASE DE DATOS
	// - SE INVOCA LA FUNCIÓN CONSULTARUSUARIO EN GESTIONARUSUARIOS
	// - SE CIERRA LA CONEXIÓN
	// - SI HAY UN USUARIO ENTONCES SE ASIGNA EMAIL A LA
	// - 								VARIABLE DE SESION
	// - 							SE REDIRIGE A CONSULTA_LIBROS.PHP

	if(isset($_POST["submit"])){
		$email=$_POST["email"];
		$pass=$_POST["password"];

		$conexion=crearConexionBD();
		$num_clientes=consultarCliente($conexion,$email,$pass);
		cerrarConexionBD($conexion);

		if($num_clientes==0){
			$login="error";
		}else{
			$_SESSION["login"]=$email;
			Header("Location: ../index.php");
		}
	}

    if (isset($login)) {
		echo "<div class=\"error\">";
		echo "Error en la contraseña o no existe el usuario.";
		echo "</div>";
	}
?>
