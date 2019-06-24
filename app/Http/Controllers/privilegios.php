<?php
//MC = Movimientos Controller 
namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
//use app\Http\Controllers\Controller;



class privilegios extends Controller
{
    public function ver($id)
    {
        if (\App\Privilegios::verificar(7) == 0) // 7 corresponde a la asignación de privilegios de usuario
        {
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
        }
        
        $usuario = \App\Usuarios::find($id);
        $privilegios = \App\Privilegios::all();

        foreach ($privilegios as $ok) {
            $rel = \App\RelUsuPriv::where('idUsuario', '=', $id)
            ->where('idPrivilegio', '=', $ok['id'])->first();
            
            if(!$rel)
            {
                $ok['check'] = 0;
            }
            else
            {
                $ok['check'] = 1;
            }
        }
        //fin datos de los privilegios

        return view('privilegios.ver', ['usuario' => $usuario, 'privilegios' => $privilegios]);
    }


     public function asignar(Request $data)
    {    
        if (\App\Privilegios::verificar(7) == 0) // 7 corresponde a la asignación de privilegios de usuario
        {
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
        }



        \App\RelUsuPriv::where('idUsuario', '=' , $data['usuarioid'])->delete();
        foreach ($data->all() as $k => $v) 
        {
        	
        	if (is_int($k)) 
        	{//revisa si es int
        		
        		\App\RelUsuPriv::create([
                'idUsuario'=>$data['usuarioid'],
                'idPrivilegio'=>$k]);

        	}
        	 
        }

        return back()->with('correctoPriv', 'Los Privilegios fueron asignados satisfactoriamente');

            
    }


    

}
