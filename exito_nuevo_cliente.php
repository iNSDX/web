<?php
	session_start();

	// HAY QUE IMPORTAR LA LIBRERÍA DE LA CONEXIÓN A BD
	// HAY QUE IMPORTAR LA LIBRERIA DEL CRUD DE USUARIOS
	require_once("php/conexionesBD.php");
	require_once("php/gestionClientes.php");

	// COMPROBAR QUE EXISTE LA SESIÓN CON LOS DATOS DEL FORMULARIO YA VALIDADOS
	// RECOGER LOS DATOS Y ANULAR LOS DATOS DE SESIÓN (FORMULARIO Y ERRORES)
	// EN OTRO CASO HAY QUE DERIVAR AL FORMULARIO
	//...
	if(isset($_SESSION["formulario"])){
		$nuevoUsuario=$_SESSION["formulario"];
		$_SESSION["formulario"]=null;
		$_SESSION["errores"]=null;
	}else{
		Header("Location: index.php");
	}

	// ABRIR LA CONEXIÓN A LA BASE DE DATOS
	$conexion=crearConexionBD();

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>Gestanco - Cliente registrado correctamente</title>
</head>

<body>

	<main>
		<!-- CONSULTAR EL TEMA DE TEORÍA SOBRE ACCESO A DATOS -->
			<?php
            if (nuevo_cliente($conexion, $nuevoUsuario)) {
                $_SESSION["login"] = $nuevoUsuario["email"];
		?>

<h1>Hola <?php echo $nuevoUsuario["nombre"]; ?>, gracias por registrarte.</h1>
        <div> Pulsa <a href="index.php">aquí</a> para volver al formulario</div>
				<!-- MENSAJE DE BIENVENIDO AL USUARIO -->
		<?php } else { ?>
        <h1>El usuario ya existe en la base de datos</h1>
        <div>Pulsa <a href="index.php">aquí</a> para volver al formulario</div>
				<!-- MENSAJE DE QUE USUARIO YA EXISTE -->
		<?php } ?>

	</main>

	<?php
		include_once("pie.php");
	?>
</body>
</html>
<?php
	// DESCONECTAR LA BASE DE DATOS
	cerrarConexionBD($conexion);
?>
