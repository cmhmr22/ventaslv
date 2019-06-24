
                 <script src="js/vendor/jquery.min.js"></script>
                <!-- Load and execute javascript code used only in this page -->
                <script src="js/pages/formsWizard.js"></script>
                <script>$(function(){ FormsWizard.init(); });</script>

              
                  <script>
                      var count = 0;
                      var subt = 0;
                    $(document).ready(function(){
                        var b = '0';
                        $('#BcodigoBarras').click(function(){
                           
                            $( "#tBarras" ).addClass( "text-success" );
                            $( "#tAbrev" ).removeClass("text-success" );
                            $( "#tNombre" ).removeClass("text-success" );
                            
                            $('#txtBuscar').html('Por Codigo de barras');
                            b = '1';

                        });
                        $('#Bidentificador').click(function(){
                           
                            $( "#tBarras" ).removeClass( "text-success" );
                            $( "#tAbrev" ).addClass("text-success" );
                            $( "#tNombre" ).removeClass("text-success" );
                            
                            $('#txtBuscar').html('Por Identificador');
                           b = '2';
                            
                        });
                        $('#Bnombre').click(function(){
                           
                            $( "#tBarras" ).removeClass("text-success" );
                            $( "#tAbrev" ).removeClass("text-success" );
                            $( "#tNombre" ).addClass( "text-success" );
                            
                            $('#txtBuscar').html('Por Nombre');
                            b = '3';
                        });

                        $('#buscarP').click(function(){
                            rellenarBuscado(b);
                            limpiarBusqueda();
                        });
                        $('#limpiarCasillas').click(function(){
                            limpiarDatos();
                        });
                        $('#agregarProd').click(function(){
                            integrarTabla();
                            
                        });
                    });





                    function rellenarBuscado($b){
                        var $id;
                        
                        switch ($b) { //define el metodo de busqueda 
                            case '1': 
                                $id ="#codigoBarras";
                                
                                break;
                            case '2': 
                                $id ="#abrev";
                                
                                break;
                            case '3': 
                                $id ="#nombre";
                                
                                break;      
                            default:
                                return alert('Selecciona un metodo de busqueda');
                        }

                        if ($($id).val() == '') 
                        {
                            return alert("Selecciona un identificador en cualquier metodo de busqueda");
                        }

                        var ruta = '{{\App\datapag::ver("Url")}}'+"/lp-"+$($id).val();
                        $.getJSON(ruta, function(r)
                        { //obtiene el json, proporciona la ruta, y crea una funcion respuesta
                            //llenamos las casillas que sean necesarias con losdatos
                            document.getElementById("Mcantidad").value = 1;
                            document.getElementById("Mid").value = r.id;
                            document.getElementById("Mabrev").value = r.abrev;
                            document.getElementById("Mnombre").value = r.nombre;
                            document.getElementById("Mcosto").value = r.costo;          
                        });//se cierra $.getJSON
                    }
                    function integrarTabla(){               
                        if ($('#Mid').val() == '') 
                        {
                            return alert("busca un nuevo producto para continuar");
                        }
                        var ruta = '{{\App\datapag::ver("Url")}}'+"/lp-"+$('#Mid').val();
                        
                        $.getJSON(ruta, function(r)
                        { //obtiene el json, proporciona la ruta, y crea una funcion respuesta
                            //llenamos las casillas que sean necesarias con losdatos
                            count++;
                            cantidad = $('#Mcantidad').val();
                            document.getElementById("Mcantidad").value = "";//eliminamos las casillas 
                            sum = (r.costo - r.descuento)*cantidad;
                            subt = parseInt(subt)+parseInt(sum);
                            calcDescuento();
                            document.getElementById("subTotal").value = subt;
                            t = '<tr id="'+count+'"><td>'+r.abrev+'<input type="hidden" id="'+count+'@costo" name="'+r.id+'@'+cantidad+'" value="'+sum+'"></td><td>'+r.nombre+'</td><td>'+r.costo+'</td><td>'+r.descuento+'</td><td>'+cantidad+' pz</td><td>'+sum+'</td><td><a class="btn btn-xs btn-danger" id="'+count+'" onclick="eliminarUno(this.id);"><i class="fa fa-times" aria-hidden="true" ></i></a></td></tr>';
                            $('#tabla').append(t);                       
                        });//se cierra $.getJSON
                        limpiarDatos();

                        

                    }
                    function eliminarUno(llave)
                    {
                        subt = subt-parseInt(document.getElementById(llave+"@costo").value); 
                        calcDescuento();
                        document.getElementById("subTotal").value = subt;
                        $('#'+llave).remove();  //busca la id, y remueve elcontenido
                          
                    }

                    function calcDescuento()
                    {
                        document.getElementById("costoTotal").value = subt-parseInt(document.getElementById("descCompra").value); 
                        
                          
                    }


                    
                    function limpiarBusqueda(){//Limpia los datos
                           $("#codigoBarras").select2("val", "");
                           /*
                            document.getElementById("codigoBarras").value = "";
                            document.getElementById("identificador").value = "";
                            document.getElementById("nombre").value = "";*/
                    }
                    function limpiarDatos(){//Limpia los datos
                            document.getElementById("Mid").value = "";
                            document.getElementById("Mabrev").value = "";
                            document.getElementById("Mnombre").value = "";
                            document.getElementById("Mcosto").value = "";
                    }
                     function verificar(){//
                            if (document.getElementById("subTotal").value == 0) 
                            {
                                event.preventDefault();
                                return alert("El subtotal se encuentra en 0, no se puede realizar la venta");
                            }
                    }

                     
                  </script>