@extends('plantilla.p')
@section('titulo', 'Nueva venta')
@section('design')

<!-- Clickable Wizard Block -->
    <div class="block">
        <!-- Clickable Wizard Title -->
        <div class="block-title">
            <h2>Generar nueva <strong>Venta</strong></h2>
        </div>
        <!-- END Clickable Wizard Title -->

        @include('partes.mensajes')
                                   
        <!-- Clickable Wizard Content -->
        <form id="advanced" action="addVnta" method="post" class="form-horizontal form-bordered">
            


              
                <!-- END Step Info -->
                <div class="form-group">
                    
                    
                    <div class="col-md-12">
                        
                        <div class="col-sm-2">
                            <label class="control-label" >Codigo de barras:</label>
                            <input type="text" name="codigoBarras" id="codigoBarras" class="form-control" placeholder="codigo de barras">
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label" >Identificador:</label>
                            <input type="text" name="abrev" id="abrev" class="form-control" placeholder="id abreviado" >
                        </div>
                        <div class="col-sm-5">
                            <label class="control-label" >Nombre del producto</label>
                            <input type="text" name="nombreP" id="nombreP" class="form-control" placeholder="Nombre del producto" >
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label" >Buscar</label>
                            <a id="buscar" class="btn btn-block btn-primary">Buscar</a>
                            
                        </div>

                        
                    </div> 


                    
                </div>

                <div class="form-group">
                    
                    
                    <div class="col-md-12">
                        
                        
                        <div class="col-sm-2 ">
                            <label class="control-label" >Identificador:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="JLV35" readonly>
                        </div>
                        <div class="col-sm-4 ">
                            <label class="control-label" >Nombre del producto</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del producto" readonly>
                        </div>
                        <div class="col-sm-2 ">
                            <label class="control-label" >Costo</label>
                            <input type="number" name="nombre" id="nombre" class="form-control"  readonly>
                        </div>
                        

                        <div class="col-sm-2 ">
                            <label class="control-label" >Cantidad</label>
                            <input type="number" name="nombre" id="nombre" class="form-control"  >
                        </div>
                        <div class="col-sm-1 ">
                            <label class="control-label" >Agregar</label>
                            <a class="btn btn-block btn-success"><i class="fa fa-check" aria-hidden="true"></i></a>
                            
                            
                        </div>
                        <div class="col-sm-1 ">
                            <label class="control-label" >Limpiar</label>
                            <a class="btn btn-block btn-warning"><i class="fa fa-eraser" aria-hidden="true"></i></a>
                        </div>

                        
                    </div> 

                    

                    
                </div>
                

                <div class="form-group">
                        <table  class="table table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <td><label class="control-label" >Identificador</label></td>
                                        <td><label class="control-label" >Producto</label></td>
                                        <td><label class="control-label" >Precio Unitario</label></td>
                                        <td><label class="control-label" >Descuento</label></td>
                                        <td><label class="control-label" >Cantidad</label></td>
                                        <td><label class="control-label" >Precio Total</label></label></td>
                                        <td style="width: 70px;"><label class="control-label" >Eliminar</label></td>
                                    </tr>
                                </thead>
                                <tbody id="tabla">
                                   <tr>
                                       <td>SM600</td>
                                       <td>Iphone 6 32 gb 2017</td>
                                       <td>5000</td>
                                       <td>300</td>
                                       <td>1 pz</td>
                                       <td>4700</td>
                                       <td><a class="btn btn-xs btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                   </tr>
                                </tbody>
                        </table >
                </div>
                
                
                    
                   
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class=" col-sm-4 control-label" >Metodo de pago</label>
                                <div class=" col-sm-8">
                                    <select class="form-control">

                                    <option>Efectivo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                           
                               
                           
                            <div class="form-group">
                                <label class=" col-sm-4 control-label" >Sub Total</label>
                                <div class=" col-sm-8">
                                    <input type="Text" class="form-control" name="" value="5300" required readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" col-sm-4 control-label" >Descuento</label>
                                <div class=" col-sm-8">
                                    <input type="Text" class="form-control" name="" value="5300" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" col-sm-4 control-label" >Total</label>
                                <div class=" col-sm-8">
                                    <input type="Text" class="form-control" name="" value="5300" required readonly>
                                </div>
                            </div>
                            
                        </div>
                    </div> 
                

                
           

            <!-- Form Buttons -->
            <div class="form-group form-actions">
                <input type="hidden" name="_token" value="{{csrf_token() }}" id="token">
                <div class="col-md-8 col-md-offset-4">
                  
                    <button type="submit" class="btn btn-sm btn-primary" id="next4">Siguiente</button>
                </div>
            </div>
            <!-- END Form Buttons -->
        </form>
        <!-- END Clickable Wizard Content -->
    </div>
    <!-- END Clickable Wizard Block -->


                               
                <script >
                    document.getElementById("seccionVenta").className = "open";
                    document.getElementById("listaVentas").style.display = "block";
                    document.getElementById("nuevaVenta").className = "active "; 
                    document.getElementById("nVta").className = "active "; 
                </script>
                @include('ventas.partes.jquery')

@endsection