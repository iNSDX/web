<!-- SOLO FUNCIONA EN SERVIDOR WEB, LOCALHOST NO TIENE MAILSERVER -->
<?php

require_once("conexionesBD.php");

$contacto["nombre"] = $_POST['fname'];

$contacto["apellidos"] = $_POST['lname'];

$contacto["email"]= $_POST['email'];

$contacto["mensaje"] = $_POST['message'];

$conexion = crearConexionBD();

nuevo_contacto($conexion,$contacto);

cerrarConexionBD($conexion);

?>
