@extends('plantilla.p')
@section('titulo', 'Productos')
@section('design')
@include('partes.dashboardHeader')

<!-- Page content -->
                    <div id="page-content">
                        <!-- Datatables Header 
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="fa fa-table"></i>Contratos<br><small>Panel de contratos realizados.</small>
                                </h1>

                            </div>
                        </div>
                        -->
                        <!-- END Datatables Header -->
                                        <!--Mensajes que aparecen despues de que se realiza una accion-->
                                      @include('partes.mensajes')
                                        <!--Mensajes que aparecen despues de que se realiza una accion-->


                        <!-- Datatables Content -->
                        <div class="block full">
                            <div class="block-title">
                                <h2>Lista de <strong>Productos</strong></h2>
                            
                            </div>
                            <p>Lista de productos que se manejan, en todas las sucursales..</p>

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                           
                                            <th>Abrev</th>
                                            <th>Nombre</th>
                                            <th>Categoria</th>
                                            <th >Cantidad</th>
                                            <th>Costo</th>
                                            <th style="width:50px;">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; ?>
                                        @foreach($productos as $p)
                                        <?php $i++; ?>
                                            <tr  class="text-center">
                                                <td ><a href="producto-ver-{{$p['id']}}">{{$p['abrev']}} </a></td>
                                                
                                                <td>
                                                     {{$p['nombre']}}   
                                                </td>
                                                <td>
                                                     {{\App\categorias::buscar($p['idCategoria'])}}
                                                </td>
                                                <td>
                                                     {{\App\productos::datos($p['id'],'cantidad')}}
                                                    
                                                     {{\App\umedida::buscar($p['idUnidadMedida'],'signo')}}
                                                </td>
                                                <td>
                                                    {{\App\productos::datos($p['id'],'costo')}}
                                                </td>
                                                
                                            
                                                
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="producto-ver-{{$p['id']}} " data-toggle="tooltip" title="ver datos del producto" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                                                        <a href="producto-modificar-{{$p['id']}}" data-toggle="tooltip" title="Modificar producto" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                                                        
                                                        
                                                       
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END Datatables Content -->
                    </div>
                    <!-- END Page Content -->


                <script >
                    document.getElementById("seccionProducto").className = "open";
                    document.getElementById("listaProducto").style.display = "block";
                    document.getElementById("verProductos").className = "active"; 
                    
                    document.getElementById("listarP").className = "active";
                </script>
                <script src="js/vendor/jquery.min.js"></script>
                <script src="js/moment.js"></script>
                <script src="js/moment-with-locales.min.js"></script>
                <script >/// formatea la fecha a una mas comprensible
                moment.locale('es');
                for (var i = 1; i <= 100; i++) {
                    if (document.getElementById(i) instanceof Object) 
                    {
                        t= $('#'+i).val();
                        $('#'+i+'s').append(moment(t).format('LLLL'));
                      
                    }else{ break; }
                }
                

                </script>
                <!-- Load and execute javascript code used only in this page -->
                <script src="js/pages/tablesDatatables.js"></script>
                <script>$(function(){ TablesDatatables.init(); });</script>
@endsection