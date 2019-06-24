<?php
//MC = Movimientos Controller 
namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
//use app\Http\Controllers\Controller;



class productos extends Controller
{
    public function obtenerjson($id)
    {
       $r = \App\productos::find($id);
       $r['costo'] = \App\productos::datos($id,'costo');
       $r['descuento'] = \App\productos::datos($id,'descuento');
       return $r;
    }
    
    public function ver_agregar()
    {
      
        return view('elementos.nuevo');
    }
  public function ver($id)
    {
      
        return view('elementos.ver',['id'=> $id]);
    }

	public function agregar(Request $data)
    {
      
      //valida la informacion
          $v = \Validator::make($data->all(), [
            
            'nombre' => 'required:unique',
            'unidadMedida' => 'required',
            'costoCompra' => 'required',
            'costoVenta' => 'required',
            'cantidad' => 'required',
            'categoria' => 'required',
            
            ]);
             if ($v->fails())
            {   
                return back()->with('mensaje', 'No cumples con los datos necesarios para el registro, vuelve a intentarlo');
            }

            $data['idProducto']=\App\productos::agregar($data);
            \App\stocks::agregar($data);

        return back()->with('correcto', 'El Producto fue agregado correctamente');

    }
public function ver_modificar($id)
    {
      $productos=\App\productos::find($id);
      $datosSucursal = \App\stocks::where('idElem','=',$productos['id'])->where('idSuc','=',\App\Usuarios::mi('sucursal'))->first();
      return view('elementos.modificar',['p'=> $productos,'d'=> $datosSucursal]);
    }

public function modificar(Request $data)
    {
      
      
      //valida la informacion
          $v = \Validator::make($data->all(), [
            
            'nombre' => 'required:unique',
            'unidadMedida' => 'required',
            'costoCompra' => 'required',
            'costoVenta' => 'required',
            'cantidad' => 'required',
            'categoria' => 'required',
            
            ]);
             if ($v->fails())
            {   
                return back()->with('mensaje', 'No cumples con los datos necesarios para el registro, vuelve a intentarlo');
            }
            $stock = \App\stocks::where('idElem', '=', $data['idProducto'])->where('idSuc', '=', \App\Usuarios::mi('sucursal'))->first();
            $data['idStock'] = $stock['id'];
            \App\productos::modificar($data);
            \App\stocks::modificar($data);

        return back()->with('correcto', 'Se a modificado correctamente');

    }


     public function listarTodos()
    {
        $productos = \App\productos::where('status','=','1')->get();
        return view('elementos.listar',['productos'=> $productos]);
    }


    

}
