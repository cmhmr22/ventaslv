<!-- In the PHP version you can set the following options from inc/config file -->
                    <!--
                        Available header.navbar classes:

                        'navbar-default'            for the default light header
                        'navbar-inverse'            for an alternative dark header

                        'navbar-fixed-top'          for a top fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
                            'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                        'navbar-fixed-bottom'       for a bottom fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
                            'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
                    -->

                    <header id="headertheme" class="navbar navbar-default">
                        <!-- Left Header Navigation -->
                        <ul class="nav navbar-nav-custom">
                            <!-- Main Sidebar Toggle Button -->
                            <li>
                                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                                    <i class="fa fa-bars fa-fw"></i>
                                </a>
                            </li>
                            
                        </ul>
                        <!-- END Left Header Navigation -->
                       
                    
                            
                      
                            <div class="col-sm-4 col-md-4 col-xs-5" style="margin-top:5px;">
                                <select class="form-control" id="sucursalC">
                                    {!!\App\sucursal::actual()!!}
                                    {!!\App\sucursal::option()!!}
                                    
                                </select>

                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-5" style="margin-top:5px;">
                            <a href="#" onclick="cambiarSucursal(event);" class="btn btn-warning btn-block">Cambiar sucursal</a>
                            </div>
                       
                        
                       
                        <!-- END Right Header Navigation -->
                    </header>
                    @if(\App\datapag::ver('HTheme') == 1)
                            <script>
                                document.getElementById("headertheme").className = "navbar navbar-default "; 
                               
                            </script>
                            @else
                            <script>
                                document.getElementById("headertheme").className = "navbar navbar-inverse"; 
                                
                            </script>
                        @endif

                        <script>//construye el link que sera enviado
                             function cambiarSucursal(){
                                 location.href='{{\App\datapag::ver("Url")}}/sucursal-'+document.getElementById("sucursalC").value;
                            }
                        </script>