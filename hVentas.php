<?php

session_start();

if(isset($_SESSION['usuario'])){
	if($_SESSION['usuario']['TIPO'] == 'Cliente'){
		header('Location: index.php');
	}
}else{
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
		<script src="js/busquedaventa.js"></script>

	</head>
	<body>
		<div class="artadded"><span>Venta añadida correctamente</span></div>
	    <div class="artupdated"><span>Venta actualizada correctamente</span></div>
	    <div class="artdeleted"><span>Venta borrada correctamente</span></div>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<!-- Header -->
								<header id="header">
									<a href="index.php" class="logo"><strong><?php echo $_SESSION['usuario']['TIPO']; ?></strong> <?php echo $_SESSION['usuario']['NOMBRE']; ?></a>

								</header>

							<!-- Banner -->
								<section id="banner">
									<div class="content">
										<header>
											<h1>HISTORIAL DE VENTAS<br /></h1>
                      <!-- Search -->
        								<section id="search" class="alt principal">
											<div class="form-1-2">
												<label for="caja_busqueda">Buscar:</label>
												<input type="text" name="caja_busqueda" id="caja_busqueda"/>
												<?php
												if(isset($_SESSION['usuario'])){
													if($_SESSION['usuario']['TIPO'] == 'Propietario' || $_SESSION['usuario']['TIPO'] == 'Gerente'){ ?>
														<button type="button" name="addVenta" id="addVenta" data-toggle="modal"
														 data-target="#add_data_Modal" class="btn btn-warning">Nueva venta</button>
														<button onclick="location.href = 'facturas.php';" class="btn btn-info">Ver facturas</button>
											<?php   }
												} ?>
											</div>

        								</section>
										<div id="add_data_Modal" class="modal fade">
										    <div class="modal-dialog">
										        <div class="modal-content">
										            <div class="modal-header">
										                <button type="button" class="close" data-dismiss="modal">&times;</button>
										                <h4 class="modal-title">Añadir venta</h4>
										            </div>
										            <div class="modal-body">
										                <form method="post" id="insert_venta_form">
										                    <label>Importe*</label>
										                    <input type="text" name="importe" id="importe" class="form-control" required/>
										                    <br />
										                    <label>Fiado*</label>
										                    <!--<input type="text" name="familia" id="familia" class="form-control"/>-->
										                    <select name="fiado" id="fiado" required>
										                        <option value=""></option>
										                        <option value="0">No</option>
										                        <option value="1">Sí</option>
										                    </select>
										                    <br />
										                    <label>Id Caja</label>
										                    <input type="number" step="any" min="0" name="idcaja" id="idcaja" class="form-control"/>
										                    <br />
										                    <label>Id Ingreso</label>
										                    <input type="number" step="any" min="0" name="idingreso" id="idingreso" class="form-control"/>
										                    <br />
										                    <input type="submit" name="insert" id="insert" value="Añadir" class="btn btn-success"/>
										                </form>
										            </div>
										            <div class="modal-footer">
										                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
										            </div>
										        </div>
										    </div>
										</div>
										</header>
										<p></p>
									</div>
									<span class="image object">
									</span>
								</section>

								<div id="datos">

								</div>

						</div>
					</div>

				<?php include_once("includes/sidebar.php"); ?>

			</div>



	</body>
</html>
