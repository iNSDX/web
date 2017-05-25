<?php

session_start();

if(!isset($_SESSION['usuario'])){

    header('Location: index.php');
}

?>

<!DOCTYPE HTML>

<html>
    <head>
        <title>Gestión Estanco</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

        <?php include_once("includes/links.php"); ?>
    </head>
    <body>

        <!-- Wrapper -->
            <div id="wrapper">
                <!-- Main -->
                    <div id="main">
                        <div class="inner">
                            <!-- Header -->
                                <header id="header">
                                    <a href="indexinterno.php" class="logo"><strong><?php echo $_SESSION['usuario']['TIPO']; ?></strong> <?php echo $_SESSION['usuario']['NOMBRE']; ?></a>
                                </header>

                            <!-- Banner -->
                                <section id="banner">
                                    <div class="content">
                                        <header>
                                            <h1>Hola, <?php echo $_SESSION['usuario']['NOMBRE']; ?><br /></h1>
                                        <p>Esta es la interfaz de <?php echo $_SESSION['usuario']['TIPO']; ?>.</p>
                                        </header>
                                        <?php
                                            if($_SESSION['usuario']['TIPO']=='Empleado'){ ?>
                                                <p>Con esta interfaz usted podrá hacer una nueva venta, acceder al historial de las mismas, hacer una factura, acceder al historial de las mismas, realizar el arqueo de caja, así como acceder al inventario.</p>
                                        <?php } else if($_SESSION['usuario']['TIPO']=='Cliente'){ ?>
                                            <p>Desde aquí podra acceder a funciones exclusivas por estar registrado.</p>
                                        <?php } else if($_SESSION['usuario']['TIPO']=='Gerente'){ ?>
                                          <p>Tendrá libre acceso a toda la base de datos y aunque con algunas restricciones en determinadas operaciones.</p>
                                        <?php } else if($_SESSION['usuario']['TIPO']=='Propietario'){ ?>
                                          <p>Tendrá libre acceso a toda la base de datos y no tendrá ninguna restricción.</p>
                                        <?php } ?>
                                    </div>
                                    <span class="image object">
                                    </span>
                                </section>

                        </div>
                    </div>

                    <?php include_once("includes/sidebar.php"); ?>

            </div>

    </body>
</html>
