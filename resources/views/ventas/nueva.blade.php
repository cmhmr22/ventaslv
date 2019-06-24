@extends('plantilla.p')
@section('titulo', 'Nueva venta')
@section('design')
@include('partes.dashboardHeader')

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
                            <label id="tBarras" class="control-label" >Codigo de barras:</label>
                            <fieldset id="BcodigoBarras">
                                <select id="codigoBarras"   class="select-select2" style="width: 100%;" data-placeholder="Codigo de barras..">
                                <option></option>
                                {!!\App\productos::listarHtml('codigoBarras') !!}
                                </select>
                            </fieldset>  

                        </div>
                        <div  class="col-sm-3">
                            <label id="tAbrev"  class="control-label" >Identificador:</label>
                            <fieldset id="Bidentificador">
                                <select id="abrev"  class="select-select2" style="width: 100%;" data-placeholder="Identificador..">
                                <option></option>
                                {!!\App\productos::listarHtml('abrev') !!}
                                </select>
                            </fieldset>  

                        </div>
                        <div class="col-sm-5">
                            <label id="tNombre" class="control-label " >Nombre del producto:</label>
                            <fieldset id="Bnombre">
                                <select id="nombre"  class="select-select2" style="width: 100%;" data-placeholder="Escribe el nombre del producto..">
                                <option></option>
                                {!!\App\productos::listarHtml('nombre') !!}
                                </select>
                            </fieldset>  

                        </div>
                        <div class="col-sm-2">
                            <label id="txtBuscar" class="control-label" >Buscar</label>
                            <a id="buscarP" class="btn btn-block btn-primary">Buscar</a>
                            
                        </div>

                        
                    </div> 


                    
                </div>

                <div class="form-group">
                    
                    
                    <div class="col-md-12">
                        
                        
                        <div class="col-sm-2 ">
                            <label class="control-label success" >Identificador:</label>
                            <input type="text" id="Mabrev" class="form-control" placeholder="JLV35" readonly><input type="hidden" id="Mid"  readonly>
                        </div>
                        <div class="col-sm-4 ">
                            <label class="control-label" >Nombre del producto</label>
                            <input type="text" id="Mnombre" class="form-control" placeholder="Nombre del producto" readonly>
                        </div>
                        <div class="col-sm-2 ">
                            <label class="control-label" >Costo</label>
                            <input type="number" id="Mcosto" class="form-control"  readonly>
                        </div>
                        

                        <div class="col-sm-2 ">
                            <label class="control-label" >Cantidad</label>
                            <input id="Mcantidad" type="number" class="form-control" min="1" >
                        </div>
                        <div class="col-sm-1 ">
                            <label class="control-label" >Agregar</label>
                            <a id="agregarProd" class="btn btn-block btn-success"><i class="fa  fa-cart-plus" aria-hidden="true"></i></a>
                            
                            
                        </div>
                        <div class="col-sm-1 ">
                            <label class="control-label" >Limpiar</label>
                            <a id="limpiarCasillas" class="btn btn-block btn-warning"><i class="fa fa-eraser" aria-hidden="true"></i></a>
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
                                  
                                </tbody>
                        </table >
                </div>
                
                
                    
                   
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class=" col-sm-4 control-label" >Metodo de pago</label>
                                <div class=" col-sm-8">
                                    <select name="tipoPago" class="form-control">

                                    <option value="1">Efectivo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                           
                               
                           
                            <div class="form-group">
                                <label class=" col-sm-4 control-label" >Sub Total</label>
                                <div class=" col-sm-8">
                                    <input type="number"  class="form-control" id="subTotal" name="subTotal" min="1" value="0" required readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" col-sm-4 control-label" >Descuento</label>
                                <div class=" col-sm-8">
                                    <input type="number" id="descCompra" name="descCompra" class="form-control" onchange="calcDescuento(this);"onkeyup="this.onchange();" onpaste="this.onchange();" oninput="this.onchange();" min="0"  value="0" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" col-sm-4 control-label" >Total</label>
                                <div class=" col-sm-8">
                                    <input type="Text" class="form-control" id="costoTotal" name="costoTotal" value="0" required readonly>
                                </div>
                            </div>
                            
                        </div>
                    </div> 
                

                
           

            <!-- Form Buttons -->
            <div class="form-group form-actions">
                <input type="hidden" name="_token" value="{{csrf_token() }}" id="token">
                <div class="col-md-12">
                  
                    <button type="submit" class="btn btn-md btn-primary pull-right" onclick="verificar(event);" id="next4">Generar Venta</button>
                </div>
            </div>
            <!-- END Form Buttons -->
        </form>
        <!-- END Clickable Wizard Content -->
    </div>
    <!-- END Clickable Wizard Block -->


                               
                <script >
                    document.getElementById("seccionVenta").className = "open";
                    document.getElementById("listaVenta").style.display = "block";
                    document.getElementById("nuevaVenta").className = "active "; 
                    document.getElementById("nuevaV").className = "active "; 
                </script>
                @include('ventas.partes.jquery')

@endsection