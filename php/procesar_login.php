<?php

session_start();

require "conexionesBD.php";

sleep(2);

$conexion=crearConexionBD();

$email=$_POST['emaillg'];
$password=$_POST['passlg'];

    $consulta="SELECT NOMBRE,TIPO,IDCLIENTE FROM USUARIOS WHERE EMAIL=:email AND PASS=:pass";
    $usuarios=$conexion->prepare($consulta);
    $usuarios->bindParam(':email',$email);
    $usuarios->bindParam(':pass',$password);
    $usuarios->execute();

    if(!empty($usuarios)){
        $stmt=$conexion->prepare("SELECT COUNT(*) FROM USUARIOS WHERE EMAIL=:email AND PASS=:pass");
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':pass',$password);
        $stmt->execute();

        $rows = $stmt->fetchColumn();

        if($rows == 1){
            $datos = $usuarios->fetch(PDO::FETCH_ASSOC);
            $_SESSION['usuario'] = $datos;

            if($_SESSION['usuario']['TIPO'] == 'Empleado'){
                $_SESSION['idempleado'] = $_SESSION['usuario']['IDCLIENTE'];
            }

            $_SESSION['conectado'] = true;
            echo json_encode(array('error' => false, 'tipo' => $datos['TIPO']));
        }else{
            echo json_encode(array('error' => true));
        }
    }

cerrarConexionBD($conexion);

 ?>
