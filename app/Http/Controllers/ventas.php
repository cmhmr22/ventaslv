<?php
//MC = Movimientos Controller 
namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
//use app\Http\Controllers\Controller;
include 'scriptsphp/modificadores.php';


class ventas extends Controller
{
    public function ver_agregar()
    {
      
        return view('ventas.nueva');
    }

    public function correcta($id)
    {
      
        return view('ventas.correcto', ['id'=> $id ] );
    }

   
    public function ver_venta($id)
    {
      	
      	$v=\App\ventas::find($id);
        
         return view('pdf.recibo', ['v'=> $v ] );
    }

	
public function agregar(Request $data)
    {
    	//verificar privilegios

      	//verificar que los datos sean congruentes
      	$v = \Validator::make($data->all(), [
            
            'subTotal' => 'required',
            'descCompra' => 'required',
            'costoTotal' => 'required',
            'tipoPago' => 'required',
            
         ]);
      	if ($v->fails())
            {   
                return back()->with('mensaje', 'No se cumple con la informacion requerida para realizar la venta, porfavor intentalo nuevamente');
            }
      	//obtener sucursal
        	$data['sucursal'] = \App\Usuarios::mi('sucursal'); 
      	//obtener vendedor
        	$data['idUsuario'] = \App\Usuarios::mi('id');
      	//agregar venta
      		$data['idVenta'] = \App\ventas::agregar($data);
      	//agregar productos vendidos
      		$cont = 0;
      		$names = "";
      		 
      		foreach ($data->all() as $key => $v) {
      			$names = before('@', $key);
	           if (is_numeric($names)) 
	            {//revisa si es int
	            	$p = \App\productos::find($names);
                $s = \App\stocks::datos($names);
                \App\stocks::restar($names, after('@', $key));
	            	\App\productosVendidos::create([
		                'idVenta'=>$data['idVenta'],
		                 'idProducto'=>$names,
		                 'nombre'=>$p['nombre'],
		                 'cantidad'=>after('@', $key),
		                 'costoUnitario'=>$data[$key]/after('@', $key),
		                 'costoTotal'=>$data[$key],
                     'descuento'=>$s['descuento'],
                     'precioCompra'=>$s['precioCompra'],
                     'gananciaPorUnidad'=>$s['gananciaPorUnidad'],
                     'gananciaTotal'=>after('@', $key) * $s['gananciaPorUnidad'],
		            ]);
	            }
       		}
       	
      	//modificar stocks
      	//enviar respuesta
        return redirect('venta-correcta-'.$data['idVenta']);
    }

	
 public function listarHoy()
    {
      $date = Carbon::now();
      
      //$date =new Carbon('yesterday');
                        
      $ventas = \App\ventas::where('created_at', '>', $date->toDateString())->get();
      return view('ventas.listar', ['ventas'=> $ventas,'pin'=> 'hoy' ] );
    }
public function listarAyer()
    {
       $hoy = Carbon::now();
       $date = Carbon::now();
       $ayer = $date->subDay();   
      $ventas = \App\ventas::where('created_at', '>', $ayer->toDateString())->where('created_at', '<', $hoy->toDateString())->get();
      return view('ventas.listar', ['ventas'=> $ventas,'pin'=> 'ayer' ] );
    }
public function listarWeek()
    {

       $date = Carbon::now();
       $week = $date->subWeek(); 

      $ventas = \App\ventas::where('created_at', '>', $week->toDateString())->get();
      return view('ventas.listar', ['ventas'=> $ventas,'pin'=> 'week' ] );
    }
public function listarMonth()
    {
       $date = Carbon::now();
       $month = $date->subMonth(); 

      $ventas = \App\ventas::where('created_at', '>', $month->toDateString())->get();
      return view('ventas.listar', ['ventas'=> $ventas,'pin'=> 'month' ] );
    }
public function listarTrim()
    {
       $date = Carbon::now();
       $month = $date->subMonths(3); 
       
      $ventas = \App\ventas::where('created_at', '>', $month->toDateString())->get();
      return view('ventas.listar', ['ventas'=> $ventas,'pin'=> 'trim' ] );
    }
public function listarSem()
    {
        $date = Carbon::now();
       $month = $date->subMonths(6); 
       
      $ventas = \App\ventas::where('created_at', '>', $month->toDateString())->get();
      return view('ventas.listar', ['ventas'=> $ventas,'pin'=> 'sem' ] );
    }
public function listarTodas()
    {
       $ventas = \App\ventas::all();
        return view('ventas.listar', ['ventas'=> $ventas,'pin'=> 'all' ] );
    }


    


    

}
