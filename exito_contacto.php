<?php
    session_start();

    if(!isset($_SESSION['contactook'])){
        Header('Location: contacto.php');
    }else{
        unset($_SESSION['contactook']);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/bootstrap.css" rel="stylesheet">
    <title>Mensaje enviado</title>
</head>
<body>
    <h2>Mensaje enviado Correctamente</h2>
    <h4>en unos segundos se mostrará la página principal, si no es así haga click <a class="textogr" href="index.php"> aquí.</a></h4>
</body>
</html>

<script language="javascript">
window.setTimeout(function() {
    window.location.replace('index.php');
}, 3000);
</script>
