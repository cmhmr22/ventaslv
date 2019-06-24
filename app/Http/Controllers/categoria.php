<?php
//MC = Movimientos Controller 
namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
//use app\Http\Controllers\Controller;
include 'scriptsphp/modificadores.php';


class categoria extends Controller
{
  
public function agregar()
    {
         return view('categorias.nueva');
    }
public function listar()
    {
        #$categorias = \App\categorias::all();
        $categorias = \App\categorias::listarRaw();

         return view('categorias.listar', ['categorias'=>$categorias]);
    }
public function add(Request $data)
{
$v = \Validator::make($data->all(), [
            
            'nombre' => 'required',
            'padre' => 'required',
         ]);
	if ($v->fails())
            {   
                return back()->with('mensaje', 'No se cumple con la información requerida para realizar la acción, porfavor intentalo nuevamente');
            }
	\App\categorias::create([
		                'padre'=>$data['padre'],
		                 'nombre'=>$data['nombre'],
		            ]);
	return back()->with('correcto','La categoria fue agregada correctamente');
}
public function delete($id)
    {   


        if($id==0)
        {
            return back()->with('mensaje','No debes de eliminar esta categoria');
        }
        \App\categorias::eliminar($id);
         return back()->with('correcto','La categoria fue eliminada correctamente');

    }

}
