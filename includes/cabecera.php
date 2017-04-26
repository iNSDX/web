
<div id="page">
	<nav class="fh5co-nav" role="navigation">

		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-2">
						<div id="fh5co-logo"><a href="index.php"><i></i>Estanco de Ibros<span></span></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li class="active"><a href="index.php">Inicio</a></li>
							<li class="has-dropdown">
								<a href="tabaco.php">Tabaco</a>
								<ul class="dropdown">
									<li><a href="cigarrillos.php">Cigarrillos</a></li>
									<li><a href="picadura.php">Picadura</a></li>
									<li><a href="puros.php">Puros</a></li>
									<li><a href="mascar.php">De Mascar</a></li>
								</ul>
							</li>
							<li class="has-dropdown">
								<a href="papeleria.php">Papelería</a>
								<ul class="dropdown">
									<li><a href="#">Sección 1</a></li>
									<li><a href="#">Sección 2</a></li>
									<li><a href="#">Sección 3</a></li>
									<li><a href="#">Sección 4</a></li>
								</ul>
							</li>
							<li class="has-dropdown">
								<a href="comestibles.php">Comestibles</a>
								<ul class="dropdown">
									<li><a href="#">Sección 1</a></li>
									<li><a href="#">Sección 2</a></li>
									<li><a href="#">Sección 3</a></li>
									<li><a href="#">Sección 4</a></li>

								</ul>
							</li>

							<li class="has-dropdown">
								<a href="otros.php">Otros</a>
								<ul class="dropdown">
								<li><a href="#">Sección 1</a></li>
									<li><a href="#">Sección 2</a></li>
									<li><a href="#">Sección 3</a></li>
									<li><a href="#">Sección 4</a></li>
								</ul>
							</li>
							<li><a href="contacto.php">Contacto</a></li>



							<li class="btn-cta"><a data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();"><span>Iniciar sesión</span></a>
							<li class="btn-cta1"><a data-toggle="modal" href="javascript:void(0)" onclick="openRegisterModal();"><span>Regístrate</span></a>
                <?php if (!isset($_SESSION['login'])) {	?>
                <?php } ?>
                <li>	<?php if (isset($_SESSION['login'])) {	?>
    						<a href="php/logout.php">Desconectar</a>
    					<?php } ?>
    			</li>
				</li>

						</ul>
					</div>
				</div>

			</div>
		</div>
	</nav>
