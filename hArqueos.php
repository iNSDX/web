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
		<script src="js/busquedaarqueo.js"></script>

	</head>
	<body>
		<div class="artadded"><span>Arqueo añadido correctamente</span></div>
	    <div class="artupdated"><span>Arqueo actualizado correctamente</span></div>
	    <div class="artdeleted"><span>Arqueo borrado correctamente</span></div>
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
											<h1>HISTORIAL DE ARQUEOS<br /></h1>
                      <!-- Search -->
        								<section id="search" class="alt principal">
											<div class="form-1-2">
												<label for="caja_busqueda">Buscar:</label>
												<input type="text" name="caja_busqueda" id="caja_busqueda"/>
												<?php
												if(isset($_SESSION['usuario'])){
													if($_SESSION['usuario']['TIPO'] == 'Propietario' || $_SESSION['usuario']['TIPO'] == 'Gerente' || $_SESSION['usuario']['TIPO'] == 'Empleado'){ ?>
														<button type="button" name="addArqueo" id="addArqueo" data-toggle="modal"
														 data-target="#add_data_Modal" class="btn btn-warning">Nuevo Arqueo</button>

											<?php   }
												} ?>
											</div>

        								</section>
										<div id="add_data_Modal" class="modal fade">
										    <div class="modal-dialog">
										        <div class="modal-content">
										            <div class="modal-header">
										                <button type="button" class="close" data-dismiss="modal">&times;</button>
										                <h4 class="modal-title">Añadir Arqueo</h4>
										            </div>
										            <div class="modal-body">
										                <form method="post" id="insert_arqueo_form">
										                    <label>Contado en caja*</label>
										                    <input type="text" name="contadocaja" id="contadocaja" class="form-control" required/>
										                    <br />
										                    <label>Importe total de ventas*</label>
										                    <input type="text" name="totalventas" id="totalventas" class="form-control" required/>
										                    <br />
                                                            <label>Total fiado*</label>
										                    <input type="text" name="dinerofiado" id="dinerofiado" class="form-control" required/>
										                    <br />
                                                            <label>Pagos a proveedores*</label>
										                    <input type="text" name="pagoproveedor" id="pagoproveedor" class="form-control" required/>
										                    <br />
                                                            <label>Total fiado devuelto*</label>
										                    <input type="text" name="dinerofiadodevuelto" id="dinerofiadodevuelto" class="form-control" required/>
										                    <br />
										                    <label>Id Gasto</label>
										                    <input type="number" step="any" min="0" name="idgastos" id="idgastos" class="form-control"/>
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

				<?php include_once("includes/sidebar.php") ?>

			</div>



	</body>
</html>
