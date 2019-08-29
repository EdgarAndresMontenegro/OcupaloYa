<!--Modal: Login / Register Form-->
<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab_login" data-toggle="tab" href="#login_panel" role="tab">
                            Ingresar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab_register" data-toggle="tab" href="#register_panel" role="tab">
                            Regístrate
                        </a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!--Panel 7-->
                    <div class="tab-pane fade in show active" id="login_panel" role="tabpanel">
                        <form method="POST" action="<?php echo RUTA_URL; ?>/auth/access" id="login-form" name="login-form">
                            <!--Body-->
                            <div class="modal-body mb-1">
                                <div id="errors-login"></div>
                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-envelope prefix"></i>
                                    <input type="email" class="form-control form-control-sm validate" name="username" id="username_login">
                                    <label data-error="wrong" data-success="right" for="username_login">Usuario</label>
                                </div>
                                <div class="md-form form-sm mb-4">
                                    <i class="fas fa-lock prefix"></i>
                                    <input type="password" class="form-control form-control-sm validate" name="password" id="password_login">
                                    <label data-error="wrong" data-success="right" for="password_login">Contraseña</label>
                                </div>
                                <div class="form-check mb-4">
                                    <input type="checkbox" class="form-check-input" id="remember_my_data">
                                    <label class="form-check-label" for="remember_my_data">Recordar mis datos</label>
                                </div>
                                <div class="text-center mt-2">
                                    <button class="btn btn-info">Ingresar <i class="fas fa-sign-in ml-1"></i></button>
                                </div>
                            </div>
                            <!--Footer-->
                            <div class="modal-footer">
                                <div class="options text-center text-md-right mt-1">
                                    <p>¿Olvido su <a href="<?php echo RUTA_URL; ?>/Auth/Recover" class="blue-text">Contraseña?</a></p>
                                </div>
                                <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>
                    <!--/.Panel 7-->

                    <!--Panel 8-->
                    <div class="tab-pane fade" id="register_panel" role="tabpanel">
                        <form method="POST" action="<?php echo RUTA_URL; ?>/auth/register" id="register-form" name="register-form">
                            <!--Body-->
                            <div class="modal-body">
                                <div id="errors-register"></div>
                                <div class="md-form form-sm mb-4">
                                    <i class="fas fa-lock prefix"></i>
                                    <input type="text" id="modalLRInput14" class="form-control form-control-sm validate" name="name" id="name">
                                    <label data-error="wrong" data-success="right" for="name">Nombre</label>
                                </div>
                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-envelope prefix"></i>
                                    <input type="email" class="form-control form-control-sm validate" name="username" id="username_register">
                                    <label data-error="wrong" data-success="right" for="username_register">Usuario</label>
                                </div>

                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-lock prefix"></i>
                                    <input type="password" class="form-control form-control-sm validate" name="password" id="password_register">
                                    <label data-error="wrong" data-success="right" for="password_register">Contraseña</label>
                                </div>

                                <div class="text-center form-sm mt-2">
                                    <button class="btn btn-info">Registrarme <i class="fas fa-sign-in ml-1"></i></button>
                                </div>

                            </div>
                            <!--Footer-->
                            <div class="modal-footer">
                                <div class="options text-right">
                                    <p class="pt-1">Already have an account? <a href="#" class="blue-text">Log In</a></p>
                                </div>
                                <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>
                    <!--/.Panel 8-->
                </div>

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: Login / Register Form-->