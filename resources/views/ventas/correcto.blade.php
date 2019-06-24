@extends('plantilla.p')
@section('titulo', 'Sistema Dygitec - Correcto')
               
@section('design')
@include('partes.dashboardHeader')
                    <!-- Page content -->
                 
                        <!-- END eCommerce Dashboard Header -->

                        <!-- Quick Stats -->
                        <div class="row text-center">
                            <div class="col-sm-6">
                                <a href="venta-ver-{{$id}}" target="blank_" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-dark">
                                        <h4 class="widget-content-light"><strong>Generar Recibo</strong></h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">
                                        Imprimir
                                    </span></div>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a href="venta-nueva" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-dark">
                                        <h4 class="widget-content-light"><strong>Generar Nueva Venta</strong></h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">
                                    Regresar
                                    </span></div>
                                </a>
                            </div>
                            
                            
                        </div>
                        <!-- END Quick Stats -->

                        
                    </div>
                    <!-- END Page Content -->
                      

<script >
                    document.getElementById("seccionVenta").className = "open";
                    document.getElementById("listaVenta").style.display = "block";
                    document.getElementById("nuevaVenta").className = "active "; 
</script>
@endsection
                    