@extends('plantilla.p')
@section('titulo', 'Modificar usuario')
@section('design')


                                <div class="block">
                                    <!-- Horizontal Form Title -->
                                    <div class="block-title">
                                        
                                        <h2><strong>Modificar Usuario</strong> (Modifica el formulario)</h2>
                                    </div>
                                    <!-- END Horizontal Form Title -->
                                     @include('partes.mensajes')
                                    <!-- Horizontal Form Content -->
                                    <form action="modUsu" method="post" class="form-horizontal form-bordered">
                                        <label class="col-md-12 text-primary control-label"><h3>Datos Personales</h3></label>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-user">Nombre</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="nombre" placeholder="Escribe el nombre completo..." value=" {{$usuario['nombre'] }}">
                                                <span class="help-block">Escribe tu nombre y apellidos</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-user">Telefono/Celular</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="telefono" placeholder="numero de telefono" value=" {{$usuario['telefono'] }}">
                                                <span class="help-block">Coloca tu numero de telefono</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-user">Dirección</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="direccion" placeholder="Dirección comleta." value=" {{$usuario['direccion'] }}">
                                                <span class="help-block">Escribe la dirección de tu casa, local, o zona de trabajo</span>
                                            </div>
                                        </div>
                                        <label class="col-md-12 text-primary control-label"><h3>Datos de ingreso</h3></label>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-email">Correo</label>
                                            <div class="col-md-9">
                                                <input type="email" id="example-hf-email" name="email" class="form-control" placeholder="Escribe el Correo.." value=" {{$usuario['correo'] }}">
                                                <span class="help-block">Coloca el email</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-user">Nombre Usuario</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="usuario" placeholder="Escribe el nombre de usuario.." value=" {{$usuario['usuario'] }}">
                                                <span class="help-block">Escribe el nombre de usuario</span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-password">Password</label>
                                            <div class="col-md-9">
                                                <input type="password" id="example-hf-password" name="pass" class="form-control" placeholder="Enter Password..">
                                                <span class="help-block">Escribe una contraseña</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-password">Password</label>
                                            <div class="col-md-9">
                                                <input type="password" id="example-hf-password" name="pass2" class="form-control" placeholder="Enter Password..">
                                                <span class="help-block">Repite la contraseña</span>
                                            </div>
                                        </div>
                                       
                                        
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                
                                                <input type="hidden"  value="{{$usuario['id'] }}" name="idu">

                                                <input type="hidden" name="_token" value="{{csrf_token() }}" id="token">


                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Modificar</button>
                                                
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END Horizontal Form Content -->
                                </div>
                                <!-- END Horizontal Form Block -->

                                



                <script >
                    document.getElementById("seccionUsuario").className = "open";
                    document.getElementById("listaUsuario").style.display = "block";
                     
                </script>

                @if($usuario['id'] == \App\Usuarios::mi('id'))
                <script>
                    document.getElementById("misDatos").className = "active "; 
                </script>
                @else
                <script>
                    document.getElementById("verUsuarios").className = "active "; 
                </script>
                @endif
@endsection