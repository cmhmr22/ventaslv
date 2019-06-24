@extends('plantilla.p')
@section('titulo', 'Productos')
@section('design')
@include('categorias.partes.dashboardHeader')

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
                                <h2>Lista de <strong>Categorias</strong></h2>
                            
                            </div>
                            <p>Lista de categorias que se manejan, en todas las sucursales. Los que estan en negritas representan las categorias Padre, y debajo estan sus subcategorias</p>

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                           
                                           
                                            <th>Nombre</th>
                                            <th>Productos enlazados</th>
                                            <th style="width:50px;">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        @foreach($categorias as $c)
                                        
                                            <tr  class="text-center">
                                               
                                                
                                                <td>
                                                    @if($c['padre'] == 0)
                                                     <strong>{{$c['nombre']}}</strong>
                                                    @else
                                                    {{$c['nombre']}}
                                                    @endif   
                                                </td>
                                                <td>
                                                     {{\App\categorias::contar($c['id'])}}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="categoria-ver-{{$c['id']}} " data-toggle="tooltip" title="Ver categoria" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                                                        <a href="categoria-modificar-{{$c['id']}}" data-toggle="tooltip" title="Modificar Categoria" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                                                        <a href="#"  title="Eliminar Categoria" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal-{{$c['id']}}"><i class="fa fa-trash"></i></a>

                                                    </div>

                                                    
                                                </td>
                                            </tr>
                                                <!-- Modal Para eliminar -->
                                                      <div class="modal fade" id="myModal-{{$c['id']}}" role="dialog">
                                                        <div class="modal-dialog">
                                                          <!-- Modal content-->
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                              <h4 class="modal-title">Eliminar Categoria</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                              <p>Todos los articulos o productos seran desplazados a la categoria padre.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                              <a href="delCat-{{$c['id']}}" type="button" class="btn btn-danger">Eliminar</a>
                                                            </div>
                                                          </div>
                                                          
                                                        </div>
                                                      </div>
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
                    document.getElementById("categoriaAdd").className = "active ";
                    document.getElementById("listarC").className = "active";
                </script>
                <script src="js/vendor/jquery.min.js"></script>
                <script src="js/pages/tablesDatatables.js"></script>
                <script>$(function(){ TablesDatatables.init(); });</script>
@endsection