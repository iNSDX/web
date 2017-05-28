<?php

session_start();

if(isset($_SESSION['usuario'])){
	if($_SESSION['usuario']['TIPO'] == 'Cliente'){
		header('Location: indexinterno.php');
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
		<?php include_once("includes/links.php") ?>
		<script src="js/busquedapedido.js"></script>

	</head>
	<body>
		<div class="artadded"><span>Pedido añadido correctamente</span></div>
	    <div class="artupdated"><span>Pedido actualizado correctamente</span></div>
	    <div class="artdeleted"><span>Pedido borrado correctamente</span></div>
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
											<h1>HISTORIAL DE PEDIDOS<br /></h1>
                      <!-- Search -->
        								<section id="search" class="alt principal">
											<div class="form-1-2">
												<label for="caja_busqueda">Buscar:</label>
												<input type="text" name="caja_busqueda" id="caja_busqueda"/>
												<?php
												if(isset($_SESSION['usuario'])){
													if($_SESSION['usuario']['TIPO'] == 'Propietario'){ ?>
														<button type="button" name="addPedido" id="addPedido" data-toggle="modal"
														 data-target="#add_data_Modal" class="btn btn-warning">Nuevo pedido</button>
											<?php   }
												} ?>
											</div>

        								</section>
										<div id="add_data_Modal" class="modal fade">
										    <div class="modal-dialog">
										        <div class="modal-content">
										            <div class="modal-header">
										                <button type="button" class="close" data-dismiss="modal">&times;</button>
										                <h4 class="modal-title">Añadir pedido</h4>
										            </div>
										            <div class="modal-body">
										                <form method="post" id="insert_pedido_form">
                                                            <label>Fecha de Entrega</label>
										                    <input type="date" name="fechaentrega" id="fechaentrega" class="form-control"/>
										                    <br />
										                    <label>Importe*</label>
										                    <input type="text" name="importecompra" id="importecompra" class="form-control" required/>
										                    <br />
										                    <label>Id Proveedor</label>
										                    <input type="number" step="any" min="0" name="idproveedor" id="idproveedor" class="form-control"/>
										                    <br />
										                    <label>Id Almacén</label>
										                    <input type="number" step="any" min="0" name="idalmacen" id="idalmacen" class="form-control"/>
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

				<?php include_once("includes/sidebar.php") ?>

			</div>



	</body>
</html>
