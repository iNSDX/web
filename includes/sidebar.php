<div id="sidebar">
  <div class="inner">


    <!-- Menu -->
      <nav id="menu">
        <header class="major">
          <h2>Menú</h2>
        </header>
        <ul>
          <li><a href="index.php">Inicio</a></li>

       <?php
          if(isset($_SESSION['usuario'])){ ?>

    		<li><a href="inventario.php">Artículos</a></li>

    <?php 	if($_SESSION['usuario']['TIPO'] != 'Cliente'){ ?>
            <li>
                <span class="opener"> Ventas </span>

                <ul>
                    <li><a href="hVentas.php">Ventas</a></li>
                    <li><a href="facturas.php">Facturas</a></li>
                </ul>
            </li>

            <li><a href="arqueo.php">Arqueo Caja</a></li>
      <?php } ?>

    <?php 	if($_SESSION['usuario']['TIPO'] != 'Cliente'){ ?>

            <li><a href="albaran.php">Pedidos</a></li>
            <li><a href="vercontactos.php">Contactos</a></li>

      <?php } ?>

       <li><a href="logout.php">Cerrar Sesión</a></li>
       <?php } ?>

        </ul>
      </nav>


    <!-- Footer -->
      <footer id="footer">
        <p class="copyright">&copy;2017 Estanco de Ibros. Todos los derechos reservados.</p>
      </footer>

  </div>
</div>
