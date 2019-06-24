@extends('plantilla.p')
@section('titulo', 'Nuevo Producto')
@section('design')
@include('partes.dashboardHeader')

<div class="row">
<!-- Second Column -->
                            <div class="col-md-4 col-lg-4">
                                <div class="block">
                                    <!-- Info Title -->
                                    <div class="block-title">
                                        
                                        <h2> <strong>{{\App\productos::info($id,'nombre')}} </strong> </h2>
                                        <div class="block-options pull-right">
                                            <a href="viaje-modificar-" class="btn btn-sm btn-alt btn-default" data-toggle="tooltip" title="Modificar"><i class="fa fa-pencil"></i></a>
                                        </div>
                                        
                                    </div>
                                    <!-- END Info Title -->

                                    <!-- Info Content -->
                                    <table class="table table-borderless table-striped">
                                        <tbody>
                                            <tr>
                                                <td><strong>Abrev Identificador</strong></td>
                                                <td>{{\App\productos::info($id,'abrev')}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Unidad de medida</strong></td>
                                                <td>{{\App\productos::info($id,'uMedida')}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Categoria</strong></td>
                                                <td>{{\App\productos::info($id,'categoria')}}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                    <!-- END Info Content -->
                                </div>

                                <div class="block">
                                    <!-- Info Title -->
                                    <div class="block-title">
                                        
                                        <h2> <strong>CANTIDADES POR SUCURSAL </strong> </h2>
                                        <div class="block-options pull-right">
                                            
                                        </div>
                                        
                                    </div>
                                    <!-- END Info Title -->

                                    <!-- Info Content -->
                                    <table class="table table-borderless table-striped">
                                        <thead>
                                            <tr>
                                                <td>Sucursal</td>
                                                <td>Stock Minimo</td>
                                                <td>Cantidad</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {!!\App\productos::listarxSucursal($id)!!}
                                     
                                        </tbody>
                                    </table>
                                    <!-- END Info Content -->
                                </div>

                            </div>
                            <!-- END Second Column -->

<!-- Segunda Column -->
                            <div class="col-md-8 col-lg-8">
                                <div class="block">
                                     <div class="block-title">
                                        
                                        <h2><strong>Ultimas ventas</strong> </h2>
                                    </div>
                                            <!-- Table Responsive Header -->
                                
                            
                             
                                        <div class="table-responsive">
                                            <table class="table table-vcenter table-striped">
                                                <thead>
                                                    <tr>
                                                        
                                                        <th>Ticket</th>
                                                        <th>Sucursal</th>
                                                        <th>Cantidad</th>
                                                        <th>Costo U</th>
                                                        <th>Total</th>
                                                        <th>Fecha</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   {!!\App\productosVendidos::verxprod($id)!!}
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        <hr>
                                </div>
                            </div>
</div>
              


                               
                <script >
                    document.getElementById("seccionProducto").className = "open";
                    document.getElementById("listaProducto").style.display = "block";
                  
                </script>
                @include('elementos.partes.jquery')

@endsection