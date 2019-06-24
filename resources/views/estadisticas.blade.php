@extends('plantilla.p')
@section('titulo', 'Sistema Dygitec - Estadisticas')
               
@section('design')
@include('partes.dashboardHeader')
                    @include('partes.mensajes')
                        <div class="row text-center">
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background">
                                        <h4 class="widget-content-light"><strong>Ventas Hoy</strong></h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 animation-expandOpen">
                                        {{\App\estadisticas::cantidadVentas('countHoy')}}
                                    </span></div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-dark">
                                        <h4 class="widget-content-light"><strong>Productos vendidos</strong></h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">
                                    {{\App\estadisticas::cantidadVentas('sumaHoy')}}
                                    </span></div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-dark">
                                        <h4 class="widget-content-light"><strong>Acomulado Hoy</strong></h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">${{\App\estadisticas::cantidadVentas('acomuladoHoy')}}</span></div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-dark">
                                        <h4 class="widget-content-light"><strong>Ganancia Promedio</strong></h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">${{\App\estadisticas::cantidadVentas('gananciaHoy')}}</span></div>
                                </a>
                            </div>
                            
                        </div>
                        <!-- END Quick Stats -->

                        <!-- eShop Overview Block -->
                        <div class="block full">
                            <!-- eShop Overview Title -->
                            <div class="block-title">
                                <div class="block-options pull-right">
                                    
                                </div>
                                <h2><strong>Información de ventas</strong></h2>
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
                            <div class="col-lg-6">
                                <!-- Top Products Block -->
                                <div class="block">
                                    <!-- Top Products Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                          
                                           
                                        </div>
                                        <h2><strong>Top Productos por mes</strong></h2>
                                    </div>
                                    <!-- END Top Products Title -->

                                    <!-- Top Products Content -->
                                    <table class="table table-borderless table-striped table-vcenter table-bordered">
                                        <tbody>
                                            {!!\App\estadisticas::cantidadVentas('mejorVendidosMes')!!}
                                        </tbody>
                                    </table>
                                    <!-- END Top Products Content -->
                                </div>
                                <!-- END Top Products Block -->
                            </div>
                        </div>
                        <!-- END Orders and Products -->
                    </div>
                    <!-- END Page Content -->

<script > 
    document.getElementById("estadisticas").className = "active "; 
</script>
@endsection
                    