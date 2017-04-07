<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Plugin para menu hover -->
    <script src="js/bootstrap-hover-dropdown.min.js"></script>

    <!-- Hoja de estilo -->
    <link rel="stylesheet" href="css/bootstrap_edit.css">
    <link rel="stylesheet" href="css/pie.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

    <!-- Responsive slider -->
    <link href="responsive-calendar/0.9/css/responsive-calendar.css" rel="stylesheet">

    <!-- Calendario -->
    <meta name="distributor" content="Global" />
    <meta itemprop="contentRating" content="General" />
    <meta name="robots" content="All" />
    <meta name="revisit-after" content="7 days" />
    <meta name="description" content="The source of truly unique and awesome jquery plugins." />
    <meta name="keywords" content="slider, carousel, responsive, swipe, one to one movement, touch devices, jquery, plugin, bootstrap compatible, html5, css3" />
    <meta name="author" content="w3widgets.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Economica' rel='stylesheet' type='text/css'>


    <title>Gestión Estanco</title>
</head>

<body>

<?php include_once("cabecera.php"); ?>
<?php include_once("login.php"); ?>

<div class="jumbotron_principal">
        <div class="container text-center">
            <h1><img id="logo" src="img/logo.jpg"></h1>
        </div>
    </div>

    <div class="col-sm-9 sidenav">
          <?php include_once("ofertas.php"); ?>
          </div>

    <div class="col-sm-3 sidenav">
        <ul class="nav nav-pills nav-stacked">
            <?php include_once("lateral_derecho.php"); ?>
          </div>
        </ul>
    </div>

    <?php include_once("pie.php"); ?>


</body>

</html>
