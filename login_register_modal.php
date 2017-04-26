    <div class="container">
		 <div class="modal fade login" id="loginModal">
		      <div class="modal-dialog login animated">
    		      <div class="modal-content">
    		         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Login with</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box">
                             <div class="content">
                                <div class="error"></div>
                                <div class="form loginBox">
                                    <form action="php/procesar_login.php" method="post">
                                    <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                    <input id="password" class="form-control" type="password" placeholder="Contraseña" name="password">
                                    <input class="btn-js" type="submit" name="submit" value="Iniciar sesión">
                                    <!--<input class="btn btn-default btn-login" type="button" value="Login" onclick="loginAjax()">-->
                                    </form>
                                </div>
                             </div>
                        </div>
                        <div class="box">
                            <div class="content registerBox" style="display:none;">
                             <div class="form">
                                <form action="php/procesar_nuevo_usuario.php" method="get" html="{:multipart=>true}"/>
                                <input id="nombre" name="nombre" placeholder="Nombre" class="form-control" type="text" value="<?php echo $formulario['nombre'];?>" required/>
                                <input id="apellidos" name="apellidos" placeholder="Apellidos" class="form-control" type="text" value="<?php echo $formulario['apellidos'];?>" required/>
                                <input id="fechaNacimiento" name="fechaNacimiento" class="form-control" type="date" value="<?php echo $formulario['fechaNacimiento'];?>" required/>
                                <input id="email" name="email" placeholder="Email" class="form-control" type="text" value="<?php echo $formulario['email'];?>" required/>
                                <input id="password" name="password" placeholder="Contraseña" class="form-control" type="password" required/>
                                <input id="password_confirmation" name="password_confirmation" placeholder="Repite la Contraseña" class="form-control" type="password" required/>
                                <input class="btn btn-default btn-register" name="commit" type="submit" value="Regístrate"/>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="forgot login-footer">
                            <span>
                                 <a href="javascript: showRegisterForm();">Regístrate</a>
                            ?</span>
                        </div>
                        <div class="forgot register-footer" style="display:none">
                             <span>¿Ya tienes una cuenta?</span>
                             <a href="javascript: showLoginForm();">Inicia sesión</a>
                        </div>
                    </div>
    		      </div>
		      </div>
		  </div>
    </div>
