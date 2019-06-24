<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['verificausuario']], function () { //middleware, verifica que el usuario este logueado	

	//cambiar el susuario
		Route::get('sucursal-{id} ', 'sucursal@cambiar');

	//mostrar el dashboard
	Route::get('dashboard', function () {
	    return view('ventas/nueva');});
		Route::get('/', function () {
	    return view('ventas/nueva');});
	//usuarios
	Route::get('usuarios', 'usuario@vertodos');
	Route::get('usuario-nuevo', function () {
	    return view('usuario/nuevo');
	});
	Route::get('usuario-modificar-{id}', 'usuario@ver_modificar');
	Route::post('modUsu','usuario@modificar');

	Route::get('usuario-baja-{id}', 'usuario@baja');
	Route::get('usuario-eliminar-{id}', 'usuario@eliminar');
	Route::post('regU','usuario@registrar');
	//privilegios usuarios
	Route::get('usuario-asignar-privilegios-{id}', 'privilegios@ver');
	Route::post('colPriv','privilegios@asignar');

	Route::get('pagina', function () { //eliminar cuando no se ocupe
	    return \App\Privilegios::verificar('3');
	    	});
	// panel de control
	Route::get('panel-control', 'control@ver');
	Route::post('modPag','control@modificar');

	//elementos (producto o elemento)
	Route::get('producto-agregar', 'productos@ver_agregar');
	Route::get('producto-modificar-{id}', 'productos@ver_modificar');
	Route::post('addProd', 'productos@agregar');
	Route::post('modProd', 'productos@modificar');
	Route::get('productos', 'productos@listarTodos');
	Route::get('producto-ver-{id}', 'productos@ver');

	#categorias
	Route::get('categoria-agregar', 'categoria@agregar');
	Route::post('addCat', 'categoria@add');
	Route::get('delCat-{id}', 'categoria@delete');
	Route::get('categoria-listar', 'categoria@listar');
	
	//ventas
	Route::get('venta-nueva', 'ventas@ver_agregar');
	Route::post('addVnta', 'ventas@agregar');
	Route::get('venta-ver-{id}', 'ventas@ver_venta');
	Route::get('venta-correcta-{id}', 'ventas@correcta');
	
	#fechas de ventas#
	Route::get('ventas-listar', 'ventas@listarTodas');
	Route::get('ventas-hoy', 'ventas@listarHoy');
	Route::get('ventas-ayer', 'ventas@listarAyer');
	Route::get('ventas-semana', 'ventas@listarWeek');
	Route::get('ventas-mes', 'ventas@listarMonth');
	Route::get('ventas-trimestre', 'ventas@listarTrim');
	Route::get('ventas-semestre', 'ventas@listarSem');

	//rutas
	Route::get('lp-{id}', 'productos@obtenerjson');
	//estadisiticas
	Route::get('estadisticas', function () {
	    return view('estadisticas');
	});

}); // end middleware

// login usuarios 
Route::get('/login', function () {
    return view('login');
});
Route::post('logU','usuario@login');
Route::get('/logout', function () {
    session()->forget('SUser');
    return view('login');
});



