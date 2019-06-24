            <form action="logU" method="post" id="form-login" class="form-horizontal form-bordered form-control-borderless">

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                <input type="text" id="login-email" name="login-email" class="form-control input-lg" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                <input type="password" id="login-password" name="login-password" class="form-control input-lg" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-4">
                            <label class="switch switch-primary" data-toggle="tooltip" title="Remember Me?">
                                <input type="checkbox" id="login-remember-me" name="login-remember-me" value="true" checked>
                                <span></span>
                            </label>
                        </div>
                        <div class="col-xs-8 text-right">
                            <input type="hidden" name="_token" value="{{csrf_token() }}" id="token">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Login to Dashboard</button>
                            
                        </div>
                    </div>
<!--Mensajes que aparecen despues de que se realiza una accion-->
@include('partes.mensajes')
<!--Mensajes que aparecen despues de que se realiza una accion-->
                    <div class="form-group">
                        <div class="col-xs-12 text-center">
                            <a href="javascript:void(0)" id="link-reminder-login"><small>Olvidaste la contraseña?</small></a> -
                            <a href="javascript:void(0)" id="link-register-login"><small>Crear nuevo usuario</small></a>
                        </div>
                    </div>

                </form>