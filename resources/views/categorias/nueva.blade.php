@extends('plantilla.p')
@section('titulo', 'Agregar categoria')
@section('design')
@include('categorias.partes.dashboardHeader')

<!-- Clickable Wizard Block -->
    <div class="block">
        <!-- Clickable Wizard Title -->
        <div class="block-title">
            <h2>Generar nuevo <strong>Producto</strong></h2>
        </div>
        <!-- END Clickable Wizard Title -->

        @include('partes.mensajes')
                                   
        <!-- Clickable Wizard Content -->
        <form id="advanced-wizard" action="addCat" method="post" class="form-horizontal form-bordered">
            <!-- First Step -->
            <div id="clickable-first" class="step">
                <!-- Step Info -->
            



              
                <!-- END Step Info -->
                <div class="form-group">
                    
                    <label class="col-md-4 control-label" >Nombre de la Categoria *</label>
                    <div class="col-md-5">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre del producto" required >
                    </div> 
                </div>
               
               
                 <div class="form-group">
                    
                    <label class="col-md-4 control-label" >Categoria padre</label>
                     <div class="col-md-5">
                        <select class="form-control" name="padre">
                           
                            {!!\App\categorias::optionadd()!!}
                        </select>
                        <span>Elige una categoria padre, en caso de que no exista ninguna, coloca la opcion "Sin categoria"</span>
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
                    document.getElementById("categoriaAdd").className = "active "; 
                    document.getElementById("agregarC").className = "active ";
                </script>
                

@endsection