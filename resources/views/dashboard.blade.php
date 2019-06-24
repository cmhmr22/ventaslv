@extends('plantilla.p')
@section('titulo', 'Sistema Dygitec - Pagina Principal')
               
@section('design')
@include('partes.dashboardHeader')
                    <!-- Page content -->
                    @include('partes.mensajes')
                      
                        <!-- END eCommerce Dashboard Header -->


                        <!-- eShop Overview Block -->
                        <div class="block full">
                            <!-- eShop Overview Title -->
                            <div class="block-title">
                                <div class="block-options pull-right">
                                    <div class="btn-group btn-group-sm">
                                        
                                    </div>
                                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                                </div>
                                <h2><strong>Información de STOCK</strong></h2>
                            </div>
                            <!-- END eShop Overview Title -->

                            
                        <!-- Orders and Products -->
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Latest Orders Block -->
                                <div class="block">
                                    <!-- Latest Orders Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="ventas-hoy" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Ver todas"><i class="fa fa-eye"></i></a>
                                            
                                        </div>
                                        <h2><strong>Productos por acabarse</strong></h2>
                                    </div>
                                    <!-- END Latest Orders Title -->

                                    <!-- Latest Orders Content -->
                                    <table class="table table-borderless table-striped table-vcenter table-bordered">
                                        <thead>
                                            <tr>
                                                <td>Producto</td>
                                                <td>Stock minimo</td>
                                                <td>Stock Actual</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {!!\App\estadisticas::stockMinimo()!!}
                                            
                                        </tbody>
                                    </table>
                                    <!-- END Latest Orders Content -->
                                </div>
                                <!-- END Latest Orders Block -->
                            </div>
                            <div class="col-lg-6">
                                <!-- Latest Orders Block -->
                                <div class="block">
                                    <!-- Latest Orders Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="ventas-hoy" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Mostrar Ventas"><i class="fa fa-eye"></i></a>
                                            
                                        </div>
                                        <h2><strong>Ultimas Ventas</strong></h2>
                                    </div>
                                    <!-- END Latest Orders Title -->

                                    <!-- Latest Orders Content -->
                                    <table class="table table-borderless table-striped table-vcenter table-bordered">
                                        <tbody>
                                            {!!\App\estadisticas::cantidadVentas('ultimasVentasDia')!!}
                                           
                                            
                                        </tbody>
                                    </table>
                                    <!-- END Latest Orders Content -->
                                </div>
                                <!-- END Latest Orders Block -->
                            </div>
                        </div>
                        <!-- END Orders and Products -->
                    </div>
                    <!-- END Page Content -->
                    

<script >
    document.getElementById("dashboard").className = "active "; 
 
</script>
@endsection
                    