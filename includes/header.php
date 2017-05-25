<body class="no-sidebar">

    <?php include_once("login_register_modal.php"); ?>

<div id="page-wrapper">
<div id="header1">
<!-- Nav -->
<nav id="nav">
  <ul>
    <li><a href="index.php">Inicio</a></li>
    <li><a href="productos.php">Productos</a></li>
    <li><a href="contacto.php">Contacto</a></li>
    <li><a href="localizacion.php">Localización</a></li>
        <?php if (!isset($_SESSION['conectado'])) {	?>
            <li id="iniciosesion"><a  data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();"><span>Iniciar sesión</span></a></li>
            <li id="registro"><a  data-toggle="modal" href="javascript:void(0)" onclick="openRegisterModal();"><span>Regístrate</span></a></li>
        <?php } ?>
        <?php if (isset($_SESSION['conectado'])) {	?>
              <li><a id="mn" href="indexinterno.php">Menú</a></li>
            <li><a id="desc" href="logout.php">Desconectar</a></li>
        <?php } ?>
  </ul>
</nav>
</div>
</div>
</body>
