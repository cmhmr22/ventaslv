@extends('plantilla.p')
@section('titulo', 'Mis contratos realizados')
@section('design')
@include('partes.dashboardHeader')
@include('ventas.partes.dashboardHeader')
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
                                <h2>Lista de <strong>Ventas realizadas</strong></h2>
                            
                            </div>
                            <p>Lista de ventas realizadas por sucursal.</p>

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            
                                            <th>Costo</th>
                                            <th >Vendido por</th>

                                            <th>Fecha</th>
                                            <th>Sucursal</th>
                                           
                                            
                                            <th style="width:50px;">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; ?>
                                        @foreach($ventas as $v)
                                        <?php $i++; ?>
                                            <tr  class="text-center">
                                                <td ><a href="venta-ver-{{$v['id']}}">
                                                @if($v['id'] < 10)
                                                    {{'#0'.$v['id']}}
                                                @else
                                                    {{'#'.$v['id']}}
                                                @endif 
                                            </a></td>
                                                
                                                <td>
                                                    <strong>${{number_format($v['costoTotal'] , 2)}}   </strong>      
                                                </td>
                                                <td>
                                                    {{\App\Usuarios::buscar($v['idUsuario'],'Nom')}} 
                                                </td>
                                                <td>
                                                    <input type="hidden" id="{{$i}}" value="{{$v['created_at']}}">
                                                    <span value id="{{$i}}s"></span>
                                                   
                                                    
                                                </td>
                                                <td>{{\App\sucursal::buscar($v['idSucursal'],'nombre')}} </td>
                                            
                                                
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="venta-ver-{{$v['id']}} " data-toggle="tooltip" title="ver Ticket de venta" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                                                        <a href="#" data-toggle="tooltip" title="Facturar Ticket" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                                                        @if($v['status'] != 2)
                                                        <a href="#" data-toggle="tooltip" title="Generar Recibo de devolución" class="btn btn-xs btn-danger"><i class="fa fa-retweet"></i></a>
                                                        @endif
                                                        
                                                       
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
                    document.getElementById("seccionVenta").className = "open";
                    document.getElementById("listaVenta").style.display = "block";
                    document.getElementById("verVentas").className = "active "; 
                    document.getElementById("{{$pin}}").className = "active "; 
                    document.getElementById("historialV").className = "active ";
                </script>
                <script src="js/vendor/jquery.min.js"></script>
                <script src="js/moment.js"></script>
                <script src="js/moment-with-locales.min.js"></script>
                <script >/// formatea la fecha a una mas comprensible
                moment.locale('es');
                for (var i = 1; i <= 500; i++) {
                    if (document.getElementById(i) instanceof Object) 
                    {
                        t= $('#'+i).val();
                        $('#'+i+'s').append(moment(t).format("YYYY/MM/DD - hh:mm:ss"));
                      
                    }else{ break; }
                }
                

                </script>
                <!-- Load and execute javascript code used only in this page -->
                <script src="js/pages/tablesDatatables.js"></script>
                <script>$(function(){ TablesDatatables.init(); });</script>
@endsection