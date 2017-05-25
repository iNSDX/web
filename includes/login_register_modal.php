    <div class="container">
		 <div class="modal fade login" id="loginModal">
		      <div class="modal-dialog login animated">
    		      <div class="modal-content">
    		         <div class="modal-header">
                         <div class="error"><span>Datos de Ingreso no válidos, inténtalo de nuevo</span></div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">

                        <div class="box">
                             <div class="content">
                                <div class="form loginBox">
                                    <form action="php/procesar_login.php" id="formlg" method="post">
                                        <input type="text" name="emaillg" class="form-control" placeholder="Email" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$" required />
                                        <input type="password" name="passlg" class="form-control" placeholder="Contraseña" pattern="[A-Za-z0-9_-]{1,15}" required />
                                        <input type="submit" name="submit" class="botonlg btn-js form-control" value="Iniciar Sesión"/>
                                    </form>
                                </div>
                             </div>
                        </div>


                        <div class="box">
                            <div class="content registerBox" style="display:none;">
                             <div class="form">
                                 <form action="php/procesar_nuevo_usuario.php" id="register-form" method="post" html="{:multipart=>true}"/>
                                     <div class="form-group">
                                     <input id="nombre" name="nombre" placeholder="Nombre" class="form-control" type="text" pattern="[A-Za-z0-9_-]{1,}" required/>
                                     <span class="glyphicon form-control-feedback"></span>
                                     </div>
                                     <div class="form-group">
                                     <input id="apellidos" name="apellidos" placeholder="Apellidos" class="form-control" type="text" pattern="[A-Za-z0-9_-]{1,}" required/>
                                     <span class="glyphicon form-control-feedback"></span>
                                     </div>
                                     <div class="form-group">
                                     <input id="fechaNacimiento" name="fechaNacimiento" class="form-control" type="date" required/>
                                     </div>
                                     <div class="form-group">
                                     <input id="email" name="email" placeholder="Email" class="form-control" type="text" onblur="accountExists()" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$" required/>
                                     <label id="emnotav"></label>
                                     </div>
                                     <div class="form-group">
                                     <input id="password" name="password" placeholder="Contraseña" class="form-control" type="password" pattern="[A-Za-z0-9]{1,}" required/>
                                     <span class="glyphicon form-control-feedback"></span>
                                     </div>
                                     <div class="form-group">
                                     <input id="password_confirmation" name="password_confirmation" placeholder="Repite la Contraseña" class="form-control" type="password" pattern="[A-Za-z0-9]{1,}" required/>
                                     <span class="glyphicon form-control-feedback"></span>
                                     </div>
                                     <div class="g-recaptcha" data-sitekey="6LdUaR8UAAAAAGnxXjdJ3I-sDWqhh8zf-FmRuw58"></div>
                                     <span class="help-block-red">
                                     <?php if(isset($_SESSION['recaptcha'])){
                                             echo $_SESSION['recaptcha'];
                                             unset($_SESSION['recaptcha']);
                                     }?>
                                     </span>
                                     <div>
                                     <input class="btn btn-default btn-register" name="commit" type="submit" value="Regístrate"/>
                                     </div>
                                 </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="forgot login-footer">
                            <span>
                                 ¿No tienes cuenta? <a href="javascript: showRegisterForm();">Regístrate</a>
                            </span>
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
