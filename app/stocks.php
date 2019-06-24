<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stocks extends Model
{
	
     protected $table = "rel_elem_suc"; //para conocer cual es la tabla
     //public $timestamps = false; // para desactivar el timestamp
     protected $fillable= [
     'id',
     'idSuc',
     'idElem',
     'cantidad',
     'stockminimo',
     'precioCompra',
     'precioVenta'
     ];//las columnas de la base de datos
    

          public static function agregar($data){ //
          \App\stocks::create([
                
                'idSuc'=>\App\Usuarios::mi('sucursal'),//sucursal
                'idElem'=>$data['idProducto'],
                'cantidad'=>$data['cantidad'], 
                'stockminimo'=>$data['stockMinimo'],
                'precioCompra'=>$data['costoCompra'],
                'precioVenta'=>$data['costoVenta'],                
            ]);
        }
        public static function modificar($data){ //
          $s=\App\stocks::find($data['idStock']);
                $s->cantidad=$data['cantidad']; 
                $s->stockminimo=$data['stockMinimo'];
                $s->precioCompra=$data['costoCompra'];
                $s->precioVenta=$data['costoVenta'];
                $s->save();               
            return "Ok";
        }

        public static function datos($id){ #obtiene los datos
          $s=\App\stocks::where('idElem','=',$id)->where('idSuc','=', \App\Usuarios::mi('sucursal'))->get()->first();
            $s['gananciaPorUnidad'] = $s['precioVenta'] - $s['precioCompra'];
            return $s;
        }

        public static function restar($id, $cantidad){ #resta los productos de stock
          $s=\App\stocks::where('idElem','=',$id)->where('idSuc','=', \App\Usuarios::mi('sucursal'))->get()->first();
          $s->cantidad=$s->cantidad - $cantidad;
          $s->save();
        return "ok";
        }




}