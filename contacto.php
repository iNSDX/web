<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="jquery/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="js/mapa.js" type="text/javascript"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDx0fnG-FnCLrIV6sSWcsEZjuD7q4H3sik&callback=initMap"></script>
    <title>Gestión Estanco</title>

    <!-- Responsive slider -->
    <!--<link href="responsive-calendar/0.9/css/responsive-calendar.css" rel="stylesheet">-->

    <!-- Plugin para menu hover -->
    <script src="js/bootstrap-hover-dropdown.min.js"></script>

    <!-- Mi hoja de estilo -->
    <link rel="stylesheet" href="css/estilo2.css">

    <!-- Login - Register -->

    <script src="js/login-register.js" type="text/javascript"></script>
    <link href="css/bootstrap_edit.css" rel="stylesheet" />
    <link href="css/login-register.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

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

    <div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="well well-sm">
                <form action="php\procesa_contacto.php" class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header">Contacta con nosotros</legend> <!-- Prueba commit -->
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="fname" name="fname" type="text" placeholder="Nombre" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="lname" name="lname" type="text" placeholder="Apellidos" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="email" name="email" type="text" placeholder="Email" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="phone" name="phone" type="text" placeholder="Teléfono" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <textarea class="form-control" id="message" name="message" placeholder="Escriba aquí su mensaje. Le responderemos lo antes posible. Gracias :)" rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <div class="panel panel-default">
                    <div class="text-center header">¡Ven a visitarnos!</div>
                    <div class="panel-body text-center">
                        <h4>Dirección</h4>
                        <div>
                        23450 Ibros (Jaén)<br />
                        Calle Virgen de Los Remedios Nº50 <br />
                        999 - 123456<br/>
                        gestanco@protonmail.com<br />
                        </div>
                        <hr/>
                        <div id="map1" class="map">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once("pie.php"); ?>
</body>

</html>
