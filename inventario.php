<?php

session_start();

if(!isset($_SESSION['usuario'])){

	header('Location: consulta_articulos.php');
}

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Búsqueda Articulos</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

		<?php include_once("includes/links.php"); ?>
			<script src="js/busquedaarticulo.js"></script>


	</head>
	<body>
		<div class="artadded"><span>Artículo añadido correctamente</span></div>
	    <div class="artupdated"><span>Artículo actualizado correctamente</span></div>
	    <div class="artdeleted"><span>Artículo borrado correctamente</span></div>
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
											<h1>INVENTARIO<br /></h1>
                      <!-- Search -->
        								<section id="search" class="alt">

											<div class="form-1-2">
												<label for="caja_busqueda">Buscar:</label>
												<input type="text" name="caja_busqueda" id="caja_busqueda" placeholder="Buscar producto.."/>
												<?php
												if(isset($_SESSION['usuario'])){
													if($_SESSION['usuario']['TIPO'] == 'Propietario' || $_SESSION['usuario']['TIPO'] == 'Gerente'){ ?>
														<button type="button" name="add" id="add" data-toggle="modal"
														 data-target="#add_data_Modal" class="btn btn-warning">Nuevo Artículo</button>
											<?php   }
												} ?>
											</div>

        								</section>
										<div id="add_data_Modal" class="modal fade">
										    <div class="modal-dialog">
										        <div class="modal-content">
										            <div class="modal-header">
										                <button type="button" class="close" data-dismiss="modal">&times;</button>
										                <h4 class="modal-title">Añadir artículo</h4>
										            </div>
										            <div class="modal-body">
										                <form method="post" id="insert_form">
										                    <label>Nombre*</label>
										                    <input type="text" name="nombre" id="nombre" class="form-control" required/>
										                    <br />
										                    <label>Familia*</label>
										                    <!--<input type="text" name="familia" id="familia" class="form-control"/>-->
										                    <select name="familia" id="familia" required>
										                        <option value=""></option>
										                        <option value="tabaco">Tabaco</option>
										                        <option value="golosinas">Golosinas</option>
										                        <option value="comestibles">Comestibles</option>
										                        <option value="papeleria">Papeleria</option>
										                        <option value="otros">Otros</option>
										                    </select>
										                    <br />
										                    <label>Precio*</label>
										                    <input type="number" step="any" min="0" name="precio" id="precio" class="form-control" required/>

										                    <label>Descripcion</label>
										                    <input type="text" name="descripcion" id="descripcion" class="form-control"/>

										                    <label>Precio Coste*</label>
										                    <input type="number" step="any" min="0" name="precioCoste" id="precioCoste" class="form-control" required/>

										                    <label>Base Imponible*</label>
										                    <input type="number" step="any" min="0" name="base" id="base" class="form-control" required/>
										                    <br />
										                    <label>Iva*</label>
										                    <!--<input type="text" name="iva" id="iva" class="form-control"/>-->
										                    <select name="iva" id="iva" required>
										                        <option value=""></option>
										                        <option value="iva1">21%</option>
										                        <option value="iva2">10%</option>
										                        <option value="iva3">8%</option>
										                    </select>
										                    <br />
										                    <label>Margen*</label>
										                    <!--<input type="text" name="margen" id="margen" class="form-control"/>-->
										                    <select name="margen" id="margen" required>
										                        <option value=""></option>
										                        <option value="margen1">margen1</option>
										                        <option value="margen2">margen2</option>
										                        <option value="margen3">margen3</option>
										                    </select>
										                    <br />
										                    <label>Dado de baja*</label>
										                    <!--<input type="text" name="baja" id="baja" class="form-control"/>-->
										                    <select name="baja" id="baja" required>
										                        <option value=""></option>
										                        <option value="0">False</option>
										                        <option value="1">True</option>
										                    </select>
										                    <br />
										                    <label>Numero de ventas*</label>
										                    <input type="number" name="ventas" min="0" id="ventas" class="form-control" required/>

										                    <label>Stock*</label>
										                    <input type="number" name="stock" min="0" id="stock" class="form-control" required/>
										                    <br />
										                    <label>Subfamilia</label>
										                    <!--<input type="text" name="subfamilia" id="subfamilia" class="form-control"/>-->
										                    <select name="subfamilia" id="subfamilia">
										                        <option value="">Ninguna</option>
										                        <option value="gominolas">Gominolas</option>
										                        <option value="chicles">Chicles</option>
										                        <option value="patatasFritas">Patatas Fritas</option>
										                        <option value="cigarrillos">Cigarrillos</option>
										                        <option value="picadura">Picadura</option>
										                        <option value="puros">Puros</option>
										                        <option value="otros">Otros</option>
										                    </select>
										                    <br />
										                    <label>ID Proveedor</label>
										                    <input type="text" name="idprov" id="idprov" class="form-control"/>

										                    <label>ID Almacén</label>
										                    <input type="text" name="idalm" id="idalm" class="form-control"/>

										                    <label>ID Promoción</label>
										                    <input type="text" name="idprom" id="idprom" class="form-control"/>
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
