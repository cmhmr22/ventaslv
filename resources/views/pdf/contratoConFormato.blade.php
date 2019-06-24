@extends('plantilla.p')
@section('titulo', 'PDF')
@section('design')

<?php $c= \Sv\clientes::find($venta['idCliente']); ?>
<?php $v= \Sv\viajes::find($venta['idViaje']); ?>
<?php $p= \Sv\pagos::buscar($venta['id']); ?>





                
          <style type="text/css">
              
            @media print {
                h4{
                    font-size: 15px !important;
                }
                .folio{
                    color:red !important;
                    font-size: 15px !important;
                }
                table {
                        border: 1pt solid #000000 !important;
                        border-collapse: separate !important;
                        border-spacing: 0 !important;
                        font-size: 11pt !important;
                        width: 100% !important;
                       } 
                       .table{
                    border-collapse: collapse !important;
                    }
                    .table-bordered th,
                    .table-bordered td {
                    border: 1px solid #000 !important;
                    }
                    .table{
                     border: 1px solid #000 !important;   
                    }
                    .table-striped{
                     border: 1px solid #000 !important;   
                    } 

                * {
                    
                    font-size: 11px !important;
                    padding-top: 2px !important;
                    padding-bottom: 0px !important;
                    text-shadow: none !important;
                    margin-top: 2px !important;
                    box-shadow: none !important;
                    padding-top: 0px;

                }
                }
                
          </style>          

                    <!-- Page content -->
                    <div id="page-content">
                        
                    	
                        <!-- Dummy Content -->
                        <div class="block full block-alt-noborder" >
                        	
                        	<div class="col-sm-12">
                        		<img src="img/cabecera.png" class="img-responsive" >
                        	</div>
                        	
                         
                        	
                        	<h4 class="sub-header text-center"> CONTRATO DE SERVICIO TURISTICO

                            </h4>
                            
                            <div class="row" >
                                 <h3 id="" class="pull-right" style="color:red; margin-right: 25px;"><strong class="folio"># de Contrato: {{$venta['id']}} </strong></h3>
                                <div class="col-md-10 col-md-offset-1" >
                                    
                                    <!-- Info Block -->
                                <div class="block" >
                                    <!-- Info Title -->
                                    <div class="block-title  text-center" >
                                        
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
                                                <td>{{$v['lugarSalida']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Destino</strong></td>
                                                <td>{{$v['destino']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Fecha y hora de salida</strong></td>
                                                <td>
                                                    <input type="hidden" id="fs" value="{{$v['fechaSalida'].' '.$v['horaSalida']}}">
                                                    <span value id="ms"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Fecha y hora de Regreso</strong></td>
                                                <td>
                                                <input type="hidden" id="fr" value="{{$v['fechaRegreso'].' '.$v['horaRegreso']}}">
                                                    <span value id="mr"></span>
                                                </td>
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
                                    <table class="table table-bordered table-striped text-right" >
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
                                                <td><strong>Abonado</strong></td>
                                                <td>${{number_format(\Sv\pagos::abonado($venta['id']), 2)}}</td>
                                                
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
                                    <hr>
                                    
                                </div>
                                <!-- END Info Block -->
                                <div class="block">
                                    <!-- Info Title -->
                                    
                                    <!-- END Info Title -->
                                        
                                    	<p class="pull-right">San Juan del rio Queretaro. A <input type="hidden" id="fh" value="{{$venta['created_at'] }}">
                                                    <span value id="mh"></span> </p>
                                    	
                                    	<br>
                                    	<br>
                                    	<br>
                                    	<br>
                                    	<div class="row">

                                    	<p class="pull-left"  style="margin-left: 20px;">
                                    		_________________________
                                    		<br>
                                    		     Contratante
                                    	</p>

                                    	<p class="pull-right" style="margin-right: 20px;">
                                    		_________________________
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
                <script src="js/vendor/jquery.min.js"></script>
                  <script src="js/moment.js"></script>
                <script src="js/moment-with-locales.min.js"></script>
                <script >/// formatea la fecha a una mas comprensible
                moment.locale('es');
                
                        t= $('fs').val();
                        $('#ms').append(moment(t).format('LLLL'));
                        r= $('fr').val();
                        $('#mr').append(moment(r).format('LLLL'));
                        h= $('fh').val();
                        $('#mh').append(moment(h).format('LLLL'));
                        
                

                </script>
                    
               
@endsection