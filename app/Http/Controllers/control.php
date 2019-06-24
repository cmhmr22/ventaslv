<?php
//MC = Movimientos Controller 
namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
//use app\Http\Controllers\Controller;



class control extends Controller
{
    public function ver()
    {
        if (\App\Privilegios::verificar(0) == 0) // 0 corresponde a la asignación de Panel de control para el administrador
        {
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
        }

       $datos= \App\datapag::find('0');
         return view('plantilla.control.panel', ['datos' => $datos]);

        
    }


    public function modificar(request $data)
    {
        if (\App\Privilegios::verificar(0) == 0) // 0 corresponde a la asignación de Panel de control para el administrador
        {
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
        }
        
        $panel = \App\datapag::find('0');
        

        
            $panel->NombreEmpresa = $data['NombreEmpresa'];
            $panel->Url = $data['Url'];
            $panel->CorreoContacto = $data['CorreoContacto'];
            $panel->HeaderTheme = $data['HeaderTheme'];
            if ($data['ColorTheme'] != 'noMod') {
            	$panel->ColorTheme = $data['ColorTheme'];
            }
            $panel->save();
        return back()->with('correcto', 'Los cambios fueron realizados correctamente! ');
    }


   
   

    

}
