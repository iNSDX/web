<?php
if(!isset($_SESSION["errores"]) || !isset($_SESSION['excepcion'])){
    Header('Location: indexinterno.php');
}
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
   <link href="css/bootstrap.css" rel="stylesheet">
  <title>Gestión Estanco: Error</title>
</head>
<body>

<div class="wrapper row2">
  <div id="container" class="clear">

    <section id="fof" class="clear">
      <div class="positioned">

        <div class="hgroup ">
          <h1>¡Error!</h1>
          <h2>Algo no ha ido bien...&hellip;</h2>
          <h4> Si desea volver a página de inicio haga click <a class="textogr" href="index.php"> aquí.</a> </h4>
        </div>
        <p>¿Puede ser que se haya roto algo?</p>
        <img src="images/homer.png" alt="error">

        <?php

        echo $_SESSION["errores"];
        unset($_SESSION["errores"]);

        echo $_SESSION["excepcion"];
        unset($_SESSION["excepcion"]);

        ?>

      </div>

    </section>
  </div>
</div>
</body>
</html>
