@extends('plantilla.p')
@section('titulo', 'PDF')
@section('design')

<style type="text/css">
             
            @media print {
                 body {-webkit-print-color-adjust: exact;}

                 .vendorListHeading th {
                       background-color: #1a4567 !important;
                       color: white !important;   
                    }
                .col-sm-6{
                    width: 350px !important;
                    float:left;
                }
                 .table-bordered th{

                    background-color: red !important;
                 }
                    .table-bordered th,
                    .table-bordered td {
                    border: .3px solid #555 !important;

                    }
                    
                    .table{
                     border: .3px solid #555 !important;

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

<div class="row">
                <div class="col-sm-6" >

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Dummy Content -->
                        <div class="block full block-alt-noborder">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1 ">
                                    
                                    <!-- Info Block -->
                                    
                                <div class="block">
                                    <!-- Info Title -->
                                    <div class="block-title  text-center">
                                        
                                        <h2>Ticket de <strong>COMPRA</strong> </h2>
                                    </div>
                                    <!-- END Info Title -->

                                    <!-- Info Content -->
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            
                                            <tr>
                                                <td><strong>Ticket</strong></td>
                                                <td class="text-center"><strong>{{$v['id']}} </strong></td>
                                            </tr>
                                            
                                            <tr>
                                                
                                                <td>Fecha</td>
                                                <td>San Juan del rio Queretaro. A <input type="hidden" id="f" value="{{$v['created_at']}}">
                                                    <span value id="m"></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Sucursal</strong></td>
                                                <td class="text-center">Dygitec Centro</td>
                                            </tr>
                                              <tr>
                                                <td><strong>Atendió</strong></td>
                                                <td class="text-center">{{\App\Usuarios::buscar($v['idUsuario'], 'Nom')}} </td>
                                            </tr>
                                            
                                            
                                        </tbody>
                                    </table>
                                    <!-- END Info Content -->
                                
                                    <!-- Info Title -->
                                    <div class="block-title  text-center">
                                        
                                        <h2> <strong>Descripción Venta</strong> </h2>
                                    </div>
                                    <!-- END Info Title -->

                                    <!-- Info Content -->
                                    <table   media="screen" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <td>Producto</td>
                                                <td>Costo</td>
                                                <td>Cantidad</td>
                                                <td>Total</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            {!!\App\productosVendidos::listarTicket($v['id'])!!}
                                           
                                        </tbody>
                                    </table>

                                    <!-- END Info Content -->

                                    <table class="table table-bordered table-striped">
                                        
                                        <tbody>
                                            
                                            <tr>
                                                
                                                <td>Subtotal</td>
                                                <td>$ {{number_format($v['subTotal'] , 2)}}</td>
                                            </tr>
                                           @if($v['descuento']>0)
                                            <tr>
                                                
                                                <td>Descuento</td>
                                                <td>$ {{number_format($v['descuento'] , 2)}}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                
                                                <td>Total</td>
                                                <td>$ {{number_format($v['costoTotal'] , 2)}}</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>Tipo de pago</td>
                                                <td>{{\App\tipoPago::ver($v['tipoPago'])}}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                 
                                    
                                    <!-- END Info Title -->
                                    
                                    
                                    
                                </div>

                                </div>
                            </div>
                        </div>
                        <!-- END Dummy Content -->
                    </div>
                    <!-- END Page Content -->

                </div>

                <!--Segundo formato para imprimir -->

</div>               
                <!-- END Page Content -->
                <script src="js/vendor/jquery.min.js"></script>
                  <script src="js/moment.js"></script>
                <script src="js/moment-with-locales.min.js"></script>
                <script >/// formatea la fecha a una mas comprensible
                moment.locale('es');
                
                        t= $('f').val();
                        $('#m').append(moment(t).format('LLLL'));
                       t= $('fr').val();
                        $('#mr').append(moment(t).format('LLLL'));
                       
                        
                

                </script>
                    
@endsection