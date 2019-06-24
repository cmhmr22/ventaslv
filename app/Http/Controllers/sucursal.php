<?php
//MC = Movimientos Controller 
namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
//use app\Http\Controllers\Controller;
include 'scriptsphp/modificadores.php';


class sucursal extends Controller
{
  
public function cambiar($id)
    {
        $idU=\App\Usuarios::mi('id');
        $u=\App\Usuarios::find($idU);
        $u['sucursal'] = $id;

        $u->save();
        session()->put('SUser',$u);
        return back()->with('correcto','Has cambiado la sucursal, ahora puedes generar ventas, modificar y ver datos de la sucursal asignada');
    }
    
}
