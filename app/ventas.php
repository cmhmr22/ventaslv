<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
	
      protected $table = "ventas"; //para conocer cual es la tabla
     //public $timestamps = false; // para desactivar el timestamp
     protected $fillable= [
     'id',
     'idUsuario',
     'idSucursal',
     'tipoPago',
     'subTotal',
     'descuento',
     'costoTotal',
     'status'];//las columnas de la base de datos

     public static function agregar($data){ //
          \App\ventas::create([
                'idUsuario'=>$data['idUsuario'],
                'idSucursal'=>$data['sucursal'],
                'tipoPago'=>$data['tipoPago'],
                'subTotal'=>$data['subTotal'],
                'descuento'=>$data['descCompra'],
                'costoTotal'=>$data['costoTotal'],
                'status'=>1,
                
            ]);
          $buscarid = \App\ventas::all()->last();
          return $buscarid['id'];
        }
    public static function status($d){ //
          switch ($d) {
              case '0':
                  return '<span class="label label-danger">Cancelada</span>';
                  break;
              case '1':
                  return '<span class="label label-success">Venta</span>';
                  break;
              
              case '2':
                  return '<span class="label label-info">Facturada</span>';
                  break;
             case '3':
                  return '<span class="label label-warning">Devolucion</span>';
                  break;
              
              
              default:
                  return "No encontramos información";
                  break;
          }
        }

}