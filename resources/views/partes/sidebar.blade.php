<div id="sidebar">
                    
                    <!-- Wrapper for scrolling functionality -->
                    <div id="sidebar-scroll">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            <!-- Brand -->
                            <a href="{{\App\datapag::ver('Url')}}" class="sidebar-brand">
                                <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong> {{\App\datapag::ver('NomE')}} </strong></span>
                            </a>
                            <!-- END Brand -->

                            <!-- User Info -->
                            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                                <div class="sidebar-user-avatar">
                                    <a href="{{\App\datapag::ver('NomE')}}">
                                        <img src="img/placeholders/avatars/avatar.jpg" alt="avatar">
                                    </a>
                                </div>
                                <div class="sidebar-user-name">{{\App\usuarios::mi('Nom')}}</div>
                                <div class="sidebar-user-links">
                                    <a href="usuario-modificar-{{\App\usuarios::mi('id') }}" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>
                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" title="Settings"><i class="gi gi-cogwheel"></i></a>
                                    <a href="logout" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
                                </div>
                            </div>
                            <!-- END User Info -->

                            

                            <!-- Sidebar Navigation -->
                            <ul class="sidebar-nav">
                                <li>
                                    <a href="{{\App\datapag::ver('Url')}}" id="dashboard"><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                                </li>
                                @if(\App\Privilegios::verificar(0) == 1)
                                    <li>
                                        <a href="panel-control" id="panel-control"><i class="fa fa-cogs sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Panel de control</span></a>
                                    </li>
                                @endif
                                <li>
                                    <a href="#" id="seccionUsuario" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-address-book-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Usuarios</span></a>
                                    <ul id="listaUsuario">
                                        @if(\App\Privilegios::verificar(5) == 1)
                                            <li>
                                                <a  id="verUsuarios" href="usuarios">Ver todos</a>
                                            </li>
                                        @endif
                                        @if(\App\Privilegios::verificar(2) == 1)
                                            <li>
                                                <a id="nuevoUsuario" href="usuario-nuevo">Nuevo</a>
                                            </li>
                                        @endif
                                            <li>
                                                <a id="misDatos" href="usuario-modificar-{{\App\usuarios::mi('id') }}">Modificar Mis datos</a>
                                            </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" id="seccionProducto" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-cart-plus sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Productos</span></a>
                                    <ul id="listaProducto">
                                        @if(\App\Privilegios::verificar(5) == 1)
                                            <li>
                                                <a  id="verProductos" href="productos">Ver todos</a>
                                            </li>
                                        @endif
                                        @if(\App\Privilegios::verificar(2) == 1)
                                            <li>
                                                <a id="nuevoProducto" href="producto-agregar">Nuevo</a>
                                            </li>
                                        @endif
                                        @if(\App\Privilegios::verificar(2) == 1)
                                            <li>
                                                <a id="categoriaAdd" href="categoria-listar">Categorias</a>
                                            </li>
                                        @endif
                                           
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" id="seccionVenta" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-money sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Ventas</span></a>
                                    <ul id="listaVenta">
                                        @if(\App\Privilegios::verificar(5) == 1)
                                            <li>
                                                <a id="verVentas" href="ventas-hoy">Ver lista</a>
                                            </li>
                                        @endif
                                        @if(\App\Privilegios::verificar(2) == 1)
                                            <li>
                                                <a id="nuevaVenta" href="venta-nueva">Nueva</a>
                                            </li>
                                        @endif
                                            
                                    </ul>
                                </li>
                            </ul>
                            <!-- END Sidebar Navigation -->
                        </div>
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->
                </div>

                