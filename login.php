<!-- BEGIN # MODAL LOGIN                INCLUIR APARTE -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header" align="center">
      <img class="img-circle" id="img_logo" src="img/logo_login.jpg" alt="No photo">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
      </button>
    </div>

            <!-- Begin # DIV Form -->
            <div id="div-forms">

                <!-- Begin # Login Form -->
                <form id="login-form">
                <div class="modal-body">
            <div id="div-login-msg">

                        </div>
            <input id="login_username" class="form-control" type="text" placeholder="Usuario" required>
            <input id="login_password" class="form-control" type="password" placeholder="Constraseña" required>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Recuérdame
                            </label>
                        </div>
              </div>
            <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Accede</button>
                        </div>
              <div>
                            <button id="login_lost_btn" type="button" class="btn btn-link">¿Olvidaste tu contraseña?</button>
                            <button id="login_register_btn" type="button" class="btn btn-link">¡Regístrate!</button>
                        </div>
            </div>
                </form>
                <!-- End # Login Form -->

                <!-- Begin | Register Form -->
                <form id="register-form" style="display:none;">
                <div class="modal-body">
            <div id="div-register-msg">
                            <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-register-msg">Registra una cuenta</span>
                        </div>
            <input id="register_username" class="form-control" type="text" placeholder="Username (type ERROR for error effect)" required>
                        <input id="register_email" class="form-control" type="text" placeholder="E-Mail" required>
                        <input id="register_password" class="form-control" type="password" placeholder="Password" required>
              </div>
            <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Registrar</button>
                        </div>
                        <div>
                            <button id="register_login_btn" type="button" class="btn btn-link">Log In</button>
                        </div>
            </div>
                </form>
                <!-- End | Register Form -->

            </div>
            <!-- End # DIV Form -->

  </div>
</div>
</div>
<!-- END # MODAL LOGIN -->
