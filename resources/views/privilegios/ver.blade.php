@extends('plantilla.p')
@section('design')

                                

                                <div class="block">
                                    <!-- Horizontal Form Title -->
                                    <div class="block-title">
                                        
                                        <h2><strong>Privilegios de {{$usuario['usuario']. ' - Correo: '. $usuario['correo']}}</strong> (Activa los switch)</h2>
                                    </div>
                                    <!-- END Horizontal Form Title -->
                                @if(session()->has('correctoPriv')) 

                                        <div id="msj-success" class="alert alert-success alert-dismissible text-center" role="alert">
                                                <strong>{{session('correctoPriv')}}</strong>
                                        </div>

                                 @endif
                                <!-- Switches Content -->
                                    <form action="colPriv" method="post" class="form-horizontal form-bordered">
                                        <!-- Switches are CSS based, so you can handle them as usual (regular checkboxes) -->
                                        <div class="table-responsive">
                                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Acceso</th>
                                                        <th class="text-center">Autorización</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($privilegios as $p)
                                                    <tr>
                                                        <td class="text-center"> 
                                                            
                                                             @if($p->padre != 0)

                                                                <h5 class="info"><strong>{{$p->nombre}}</strong></h5>
                                                            @else
                                                            <h5 class="info" style="color:red;"><strong>{{$p->nombre}}</strong></h5>
                                                            @endif
                                                            
                                                        </td>
                                                        <td class="text-center">
                                                        @if($p->padre != 0 ||  $p->id == 0)
                                                            @if($p->check == 1) 
                                                                <label class="switch switch-info"><input name="{{$p->id}}" type="checkbox" checked><span></span></label><br>
                                                            @else
                                                                <label class="switch switch-info"><input name="{{$p->id}}" type="checkbox"><span></span></label><br>
                                                            @endif
                                                            </td>
                                                        @endif
                                                        
                                                        
                                                    </tr>
                                                    @endforeach
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        <div class="form-group form-actions">
                                            <div class="col-xs-12">
                                                <input type="hidden" name="usuarioid" value="{{$usuario['id']}}">
                                                <input type="hidden" name="_token" value="{{csrf_token() }}" id="token">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Asignar privilegios</button>
                                                
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END Switches Content -->
                                </div>
                                <!-- END Switches Block -->



                <script >
                    document.getElementById("seccionUsuario").className = "open";
                    document.getElementById("listaUsuario").style.display = "block";
                    document.getElementById("verUsuarios").className = "active ";  
                </script>
@endsection