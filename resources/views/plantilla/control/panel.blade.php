@extends('plantilla.p')
@section('titulo', 'Sistema Dygitec - Panel de control')
               
@section('design')
          <div class="row">
            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    
                    <h2><strong>Panel de control</strong> (Panel principal para el control de la pagina)</h2>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->
                <form action="modPag" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" >
                    <div class="form-group">
                        <label class="col-md-3 control-label">Creador</label>
                        <div class="col-md-9">
                            <p class="form-control-static">Equipo Dygitec, creado por Yassir Pinzón</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Nombre de la empresa o sistema</label>
                        <div class="col-md-9">
                            <input type="text" id="example-text-input" name="NombreEmpresa" class="form-control" value="{{$datos['NombreEmpresa']}}" placeholder="Nombre de la empresa">
                            <span class="help-block">Distintivo de la empresa o sistema que aparecerá en la parte superior izquierda</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Url del Sitio</label>
                        <div class="col-md-9">
                            <input type="text" id="example-text-input" name="Url" class="form-control" placeholder="Escribe una URL" value="{{$datos['Url']}}">
                            <span class="help-block">Esta URL controla los paramentros del sistema, unicamente se cambia cuando se cambia el dominio.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-email-input">Correo de contacto</label>
                        <div class="col-md-9">
                            <input type="email" id="example-email-input" name="CorreoContacto" class="form-control" value="{{$datos['CorreoContacto']}}" placeholder="Enter Email">
                            <span class="help-block">Coloca el correo de contacto</span>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-select">Color del Tema</label>
                        <div class="col-md-9">
                            <select id="example-select" name="ColorTheme" class="form-control" size="1">
                                <option value="noMod">Actual</option>

                                <option value="themes.css">Default</option>
                                <option value="themes/night.css">Night</option>
                                <option value="themes/amethyst.css">amethyst</option>
                                <option value="themes/modern.css">Modern</option>
                                <option value="themes/autumn.css">Autumn</option>
                                <option value="themes/flatie.css">Flatie</option>
                                <option value="themes/spring.css">Spring</option>
                                <option value="themes/fancy.css">Fancy</option>
                                <option value="themes/fire.css">Fire</option>
                                <option value="themes/coral.css">Coral</option>
                                <option value="themes/lake.css">Lake</option>
                                <option value="themes/forest.css">Forest</option>
                                <option value="themes/waterlily.css">Waterlily</option>
                                <option value="themes/emerald.css">Emerald</option>
                                <option value="themes/blackberry.css">Blackberry</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-select">Header Style</label>
                        <div class="col-md-9">
                            <select id="example-select" name="HeaderTheme" class="form-control" size="1">
                                @if(\App\datapag::ver('HTheme') == 1)
                                
                                <option value="1">Light</option>
                                <option value="0">Dark</option>
                                @else
                                
                                <option value="0">Dark</option>
                                <option value="1">Light</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    @include('partes.mensajes')
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <input type="hidden" name="_token" value="{{csrf_token() }}" id="token">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                            
                        </div>
                    </div>
                </form>
                <!-- END Basic Form Elements Content -->
            </div>
            <!-- END Basic Form Elements Block -->
        </div>


<script >
    document.getElementById("panel-control").className = "active ";  
</script>
@endsection
                    