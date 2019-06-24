@extends('plantilla.p')
@section('titulo', 'Nuevo Producto')
@section('design')
@include('partes.dashboardHeader')

<!-- Clickable Wizard Block -->
    <div class="block">
        <!-- Clickable Wizard Title -->
        <div class="block-title">
            <h2>Generar nuevo <strong>Producto</strong></h2>
        </div>
        <!-- END Clickable Wizard Title -->

        @include('partes.mensajes')
                                   
        <!-- Clickable Wizard Content -->
        <form id="advanced-wizard" action="addProd" method="post" class="form-horizontal form-bordered">
            <!-- First Step -->
            <div id="clickable-first" class="step">
                <!-- Step Info -->
            



              
                <!-- END Step Info -->
                <div class="form-group">
                    
                    <label class="col-md-4 control-label" >Nombre del producto *</label>
                    <div class="col-md-5">
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del producto" required >
                    </div> 
                </div>
                <div class="form-group">
                    
                    <label class="col-md-4 control-label" >Codigo de barras</label>
                    <div class="col-md-5">
                        <input type="text" name="codigoBarras" id="codigoBarras" class="form-control" placeholder="Escanea y pega aqui">
                    </div> 
                </div>
                <div class="form-group">
                    
                    <label class="col-md-4 control-label" >Codigo identificación</label>
                    <div class="col-md-5">
                        <input type="text" name="abrev" maxlength="12" id="abrev" class="form-control" placeholder="codigo abreviado (12 digitos maximo)">
                    </div> 
                </div>

               
                <div class="form-group">
                    
                    <label class="col-md-4 control-label" >Unidad de medida*</label>
                    <div class="col-md-5">
                        <select class="form-control" name="unidadMedida">
                            {!!\App\umedida::option()!!}
                            
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    
                    <label class="col-md-4 control-label" >Costo de compra*</label>
                    <div class="col-md-5">
                        <input type="number" name="costoCompra" id="costoCompra" class="form-control" min="0" placeholder="100" required >
                    </div>
                </div>
                <div class="form-group">
                    
                    <label class="col-md-4 control-label" >Precio de venta*</label>
                    <div class="col-md-5">
                        <input type="number" name="costoVenta" id="costoVenta" class="form-control" min="0" placeholder="100" required >
                    </div>
                </div>
                <div class="form-group">
                    
                    <label class="col-md-4 control-label" >Cantidad en sucursal*</label>
                    <div class="col-md-5">
                        <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="100" min="0" required >
                    </div>
                </div>

                

                
                <div class="form-group">
                    
                    <label class="col-md-4 control-label" >Stock Minimo</label>
                    <div class="col-md-5">
                        <input type="number" name="stockMinimo" id="stockMinimo" class="form-control" min="1" placeholder="10"  >
                    </div>
                </div>
                
                 <div class="form-group">
                    
                    <label class="col-md-4 control-label" >Categoria</label>
                     <div class="col-md-5">
                        <select class="form-control" name="categoria">
                            {!!\App\categorias::option()!!}
                            

                        </select>
                    </div> 
                </div>

                
            
            </div>
            <!-- END First Step -->

            <!-- Form Buttons -->
            <div class="form-group form-actions">
                <input type="hidden" name="_token" value="{{csrf_token() }}" id="token">
                <div class="col-md-8 col-md-offset-4">
                    
                    <button type="submit" class="btn btn-sm btn-primary" id="next4">Guardar</button>
                </div>
            </div>
            <!-- END Form Buttons -->
        </form>
        <!-- END Clickable Wizard Content -->
    </div>
    <!-- END Clickable Wizard Block -->


                               
                <script >
                    document.getElementById("seccionProducto").className = "open";
                    document.getElementById("listaProducto").style.display = "block";
                    document.getElementById("nuevoProducto").className = "active "; 
                    document.getElementById("agregarP").className = "active ";
                </script>
                @include('elementos.partes.jquery')

@endsection