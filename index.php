<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="jquery/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>

    <!-- Plugin para menu hover -->
    <script src="js/bootstrap-hover-dropdown.min.js"></script>

    <!-- Hoja de estilo -->
    <link rel="stylesheet" href="css/bootstrap_edit.css">
    <link rel="stylesheet" href="css/pie.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

    <!-- Responsive slider -->
    <link href="responsive-calendar/0.9/css/responsive-calendar.css" rel="stylesheet">

    <!-- Calendario -->
    <script src="responsive-calendar/0.9/js/responsive-calendar.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Economica' rel='stylesheet' type='text/css'>

    <!-- Login - Register -->
    <script src="js/login-register.js" type="text/javascript"></script>
    <link href="css/bootstrap_edit.css" rel="stylesheet" />
	<link href="css/login-register.css" rel="stylesheet" />
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

    <title>Gestión Estanco</title>
</head>

<body>
<?php include_once("php/retrieveFormData.php"); ?>
<?php include_once("cabecera.php"); ?>
<?php include_once("php/login_register_modal.php"); ?>

<div class="jumbotron_principal">
        <div class="container text-center">
            <h1><img id="logo" src="img/logo.jpg" alt="No photo"></h1>
        </div>
    </div>

    <div class="col-sm-9 sidenav">
          <?php include_once("ofertas.php"); ?>
          </div>

    <div class="col-sm-3 sidenav">
        <ul class="nav nav-pills nav-stacked">
            <?php include_once("lateral_derecho.php"); ?>
        </ul>
    </div>




    <?php include_once("pie.php"); ?>


</body>

</html>
