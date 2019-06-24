

<?php $c= \Sv\clientes::find($venta['idCliente']); ?>
<?php $v= \Sv\viajes::find($venta['idViaje']); ?>
<?php $p= \Sv\pagos::buscar($venta['id']); ?>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<html>
<head>
    

    <style type="text/css">
        
    </style>
</head>
<body>



                
                    

                    <!-- Page content -->
                    <div id="page-content">
                        
                    	
                        <!-- Dummy Content -->
                        <div class="block full block-alt-noborder" style="padding: 0px;">
                        	
                        	<div class="col-sm-12" style="padding: 0px; margin:0px;">
                        		<img src="img/cabecera.jpg" class="img-responsive" >
                        	</div>
                        	
                         
                        	
                        	<h4 class="sub-header text-center"> CONTRATO DE <strong>SERVICIO TURISTICO</strong></h4>
                            
                            <div class="row" style="padding: 0px;">
                                <div class="col-md-10 col-md-offset-1 " >
                                    
                                    <!-- Info Block -->
                                <div class="block" >
                                    <!-- Info Title -->
                                    <div class="block-title  text-center"  style="padding: 0px;">
                                        
                                        <h2>Información del <strong>cliente</strong> </h2>
                                    </div>
                                    <!-- END Info Title -->

                                    <!-- Info Content -->
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            
                                            <tr>
                                                <td><strong>Nombre</strong></td>
                                                <td>{{$c['nombre']}} </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Dirección</strong></td>
                                                <td>{{$c['direccion']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Telefono fijo</strong></td>
                                                <td>{{$c['telefono']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Celular</strong></td>
                                                <td>{{$c['celular']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Email</strong></td>
                                                <td>{{$c['email']}}</td>
                                            </tr>
                                            
                                            
                                        </tbody>
                                    </table>
                                    <!-- END Info Content -->
                                
                                    <!-- Info Title -->
                                    <div class="block-title  text-center">
                                        
                                        <h2>Datos del <strong>viaje contratado</strong> </h2>
                                    </div>
                                    <!-- END Info Title -->

                                    <!-- Info Content -->
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            
                                            <tr>
                                                <td><strong>Punto de partida</strong></td>
                                                <td>En el centro historico de queretaro</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Destino</strong></td>
                                                <td>{{$v['destino']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Fecha y hora de salida</strong></td>
                                                <td>Fecha de salida {{$v['fechaSalida']}} a las {{$v['horaSalida']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Fecha y hora de Regreso</strong></td>
                                                <td>Fecha de Regreso {{$v['fechaRegreso']}} a las {{$v['horaRegreso']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong># Personas que viajan</strong></td>
                                                <td>{{$venta['numeroPersonas'] }}</td>
                                            </tr>
                                            
                                            
                                            
                                        </tbody>
                                    </table>
                                    <!-- END Info Content -->
                               
                                    <!-- Info Title -->
                                    <div class="block-title text-center">
                                        
                                        <h2>Detalles de costo por<strong> persona</strong> </h2>
                                    </div>
                                    <!-- END Info Title -->

                                    <!-- Info Content -->
                                    <table class="table table-bordered table-striped" >
                                        <thead>
                                        	<td><strong>Boleto</strong></td>
                                        	<td><strong>Cantidad</strong></td>
                                        	<td><strong>Precio Unitario</strong></td>
                                        	<td><strong>Total</strong></td>
                                        </thead>
                                        <tbody>
                                            
                                            {!!\Sv\viajantes::Html($venta['id'])!!}
                                            
                                            
                                            
                                        </tbody>
                                    </table>
                                   
                               
                                    <!-- Info Title -->
                                    <div class="block-title text-center">
                                        
                                        <h2>Detalles del<strong> contrato</strong> </h2>
                                    </div>
                                    <table class="table table-bordered table-striped text-right" style="margin-top: 0px; mar">
                                        <tbody>
                                            
                                            <tr>
                                                <td><strong>SubTotal</strong></td>
                                                <td>${{number_format($venta['subTotal'], 2)}}</td>
                                                
                                            </tr>
                                            @if($venta['descuento'] != 0)
                                            <tr>
                                                <td><strong>Descuento</strong></td>
                                                <td>${{number_format($venta['descuento'], 2)}}</td>
                                                
                                            </tr>
                                            <tr>
                                                <td><strong>Total a pagar</strong></td>
                                                <td>${{number_format($venta['totalPagar'], 2)}}</td>
                                                
                                            </tr>
                                            @endif
                                            <tr>
                                                <td><strong>Primer Abono</strong></td>
                                                <td>${{number_format($p['cantidad'], 2)}}</td>
                                                
                                            </tr>
                                            <tr>
                                                <td><strong>Resta a pagar</strong></td>
                                                <td>${{number_format($venta['restanActualmente'], 2)}}</td>
                                                
                                            </tr>
                                            
                                            
                                            
                                        </tbody>
                                    </table>
                                
                                    <!-- Info Title -->
                                    <div class="block-title text-center">
                                        
                                        <h2>Detalles del<strong> contrato</strong> </h2>
                                    </div>
                                    <!-- END Info Title -->
                                    <article>
                                    	@if($p['comentario'] != "" )
                                    	
                                    	{!!$p['comentario']!!}
                                    	@else
                                    	Ningun Comentario
                                    	@endif

                                    </article>
                                    
                                    
                                </div>
                                <!-- END Info Block -->
                                <div class="block">
                                    <!-- Info Title -->
                                    
                                    <!-- END Info Title -->
                                    
                                    	<p class="pull-right">San Juan del rio Queretaro. A {{$venta['created_at'] }} </p>
                                    	<br>
                                    	<br>
                                    	<br>
                                    	<br>
                                    	<br>
                                    	<div class="row">

                                    	<p class="pull-left">
                                    		_______________________
                                    		<br>
                                    		Contratante
                                    	</p>

                                    	<p class="pull-right">
                                    		_______________________
                                    		<br>
                                    		Prestador del servicio
                                    	</p>
                                    	</div>

                                    

                                    
                                    
                                </div>
                                <!-- END Info Block -->
                                </div>
                            </div>
                        </div>
                        <!-- END Dummy Content -->
                    </div>
                    <!-- END Page Content -->

                    
</body>
</html>
