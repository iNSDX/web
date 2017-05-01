<?php

require_once("gestionBD.php");

$conexion=crearConexionBD();

$email=$_POST['email'];
$stmt=$conexion->prepare('SELECT COUNT(*) FROM CLIENTES WHERE EMAIL=:email');
$stmt->bindParam(':email',$email);
$stmt->execute();
  if($stmt!=0)
   {
      echo $email."is already associated with an account";
   }

cerrarConexionBD($conexion);

?>
