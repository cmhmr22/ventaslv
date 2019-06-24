
                 <script src="js/vendor/jquery.min.js"></script>
                <!-- Load and execute javascript code used only in this page -->
                <script src="js/pages/formsWizard.js"></script>
                <script>$(function(){ FormsWizard.init(); });</script>

              
                  <script>
                    $(document).ready(function(){
                      
                        $('#bt_viajesel').click(function(){
                            boletosListar();
                            rell_viaje();

                        });
                        $('#bt_sel').click(function(){
                            rellenar();
                            document.getElementById("tipoAccionUsuario").value ="existente";
                        });
                        $('#bt_clear').click(function(){
                            limpiar();
                            document.getElementById("tipoAccionUsuario").value ="nuevo";
                        });

                        $('#bt_mod').click(function(){
                            if ($('#buscarCliente').empty()) {
                                alert('Selecciona un cliente antes de modificarlo');
                            }
                            else{
                                modificar();
                                document.getElementById("tipoAccionUsuario").value ="modificar";
                            }
                        });

                    });
                    
                    function calcular_abonar(){//Realiza el descuento
                            
                            var sumaAbono = 0;
                            sumaAbono =parseInt(document.getElementById("totalPagar").value)-parseInt(document.getElementById("abono").value);
                                     
                            
                            document.getElementById("restanActualmente").value =sumaAbono;
                            
                    }
                    function calcular_descuento(){//Realiza el descuento
                            
                            var sumDescuento = 0;
                            sumDescuento =parseInt(document.getElementById("subTotal").value)-parseInt(document.getElementById("descuento").value);
                                     
                            
                            document.getElementById("totalPagar").value =sumDescuento;
                            document.getElementById("restanActualmente").value =sumDescuento-parseInt(document.getElementById("abono").value);
                            
                    }
                    function calcular(elem){
                         let suid = elem.id;
                             nid = suid.replace("@cantidad", ""); //obtiene el id
                             //alert(nid);

                         let suval = elem.value;
                         let res = suval*document.getElementById(nid+"@costo").value;
                            document.getElementById(nid+"@total").value =res;
                        calcular_res();
                    }

                     function calcular_res(){//hace la sumatoria de los boletos
                            let sumPasajeros = 0;
                            let sumTotal = 0;
                             for (var i = 1; i <= 100; i++) {
                
                                 if (document.getElementById(i+"@costo") instanceof Object) 
                                 {
                                     sumTotal = parseInt(sumTotal) + parseInt(document.getElementById(i+"@total").value);
                                     sumPasajeros = parseInt(sumPasajeros) + parseInt(document.getElementById(i+"@cantidad").value);
                                     
                                 }else{ break; }

                             }
                            $('#sumPasajeros').empty();
                            $('#sumPasajeros').append(sumPasajeros);
                            document.getElementById("pasajerosTotales").value =sumPasajeros;
                            $('#sumTotal').empty();
                            $('#sumTotal').append("$"+sumTotal);
                            document.getElementById("subTotal").value =sumTotal;
                            document.getElementById("totalPagar").value =sumTotal;
                            document.getElementById("restanActualmente").value =sumTotal-parseInt(document.getElementById("abono").value);
                    }

                    //Rellenar Boletos

                    function boletosListar(){
                        if ($('#buscadorDestino').val() == "") 
                        {
                            
                            return alert("Debes seleccionar un viaje primero");
                        }

                        var ruta = '{{\App\datapag::ver("Url")}}'+"/lb-"+$('#buscadorDestino').val();
                        $.get( ruta, function( data ) {
                          //$( ".result" ).html( data );
                          $('#tabla').empty();
                          $('#tabla').append(data);
                          //alert( "Load was performed." );
                        });
                    }
                    
                    
                    //rellenar clientes

                    function rellenar(){
                        if ($('#buscarCliente').val() == "") 
                        {
                            
                            return alert("Debes seleccionar un cliente primero");
                        }

                        var ruta = '{{\App\datapag::ver("Url")}}'+"/lc-"+ $('#buscarCliente').val();
                        $.getJSON(ruta, function(respuesta)
                        { //obtiene el json, proporciona la ruta, y crea una funcion respuesta
                            //llenamos las casillas que sean necesarias con losdatos
                            
                            document.getElementById("idCliente").value = respuesta.id;
                            document.getElementById("nombre").value = respuesta.nombre;
                            document.getElementById("telefono").value = respuesta.telefono;
                            document.getElementById("celular").value = respuesta.celular;
                            document.getElementById("email").value = respuesta.email;
                            document.getElementById("direccion").value = respuesta.direccion;
                            bloquear();         
                        });//se cierra $.getJSON
                    }

                    //rellenar datos viaje

                    function rell_viaje(){
                        if ($('#buscadorDestino').val() == "") 
                        {
                            
                            return "";
                        }

                        var ruta = '{{\App\datapag::ver("Url")}}'+"/lv-"+ $('#buscadorDestino').val();
                        $.getJSON(ruta, function(respuesta)
                        { //obtiene el json, proporciona la ruta, y crea una funcion respuesta
                            //llenamos las casillas que sean necesarias con losdatos
                            
                            document.getElementById("idViaje").value = respuesta.id;
                            document.getElementById("boldis").value = respuesta.disponibles;
                            document.getElementById("destino").value = respuesta.destino;
                            document.getElementById("fhs").value = respuesta.fechaSalida+ " a las " +respuesta.horaSalida;
                            document.getElementById("fhr").value = respuesta.fechaRegreso+ " a las " +respuesta.horaRegreso;
                            
                        });//se cierra $.getJSON
                    }
                    function limpiar(){
                        $('.chosen-single').empty();
                        $('.chosen-single').append('<span></span><div><b></b></div>');
                        $('#buscarCliente').val('');
                        $('#idCliente').val('null');
                        $('#nombre').val('');
                        $('#telefono').val('');
                        $('#celular').val('');
                        $('#email').val('');
                        $('#direccion').val('');
                        modificar();
                    }
                     function modificar(){
                        
                        $("#nombre").removeAttr("readonly");
                        $("#telefono").removeAttr("readonly");
                        $("#celular").removeAttr("readonly");
                        $("#email").removeAttr("readonly");
                        $("#direccion").removeAttr("readonly");
                        
                    }
                    
                     function bloquear(){
                        
                        $("#nombre").attr("readonly","readonly");
                        $("#telefono").attr("readonly","readonly");
                        $("#celular").attr("readonly","readonly");
                        $("#email").attr("readonly","readonly");
                        $("#direccion").attr("readonly","readonly");
                        
                    }
                   

                </script>