<!--Mensajes que aparecen despues de que se realiza una accion-->
@if(session()->has('mensaje')) 

	<div id="msj-error" class="alert alert-danger alert-dismissible text-center" role="alert">
	        <strong>{{session('mensaje')}}</strong>
	</div>

@endif
@if(session()->has('correcto')) 

	<div id="msj-success" class="alert alert-success alert-dismissible text-center" role="alert">
	        <strong>{{session('correcto')}}</strong>
	</div>

@endif
<!--Mensajes que aparecen despues de que se realiza una accion-->