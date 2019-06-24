<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productosVendidos extends Model
{
	
     protected $table = "prodvendidos"; //para conocer cual es la tabla
     //public $timestamps = false; // para desactivar el timestamp
     protected $fillable= [
     'id',
     'idVenta',
     'idProducto',
     'nombre',
     'cantidad',
     'costoUnitario',
     'costoTotal',
     'descuento',
     'precioCompra',
     'gananciaPorUnidad',
     'gananciaTotal',];//las columnas de la base de datos
     public static function listarTicket($id){ //
          $prod =\App\productosVendidos::where('idVenta','=',$id)->get();
          $t = "";
          foreach ($prod as $p) {
               $t.= "<tr>
                        <td>{$p['nombre']}</td>
                        <td>$ ".number_format($p['costoUnitario'] , 2)."</td>
                        <td>{$p['cantidad']}</td>
                        <td>$ ".number_format($p['costoTotal'] , 2)."</td>
                    </tr>";
          }
          return $t;
        }
    public static function verxprod($id){ //
          $prod =\App\productosVendidos::where('idProducto','=',$id)->get()->take('50');
          $t = "";
          foreach ($prod as $p) {
               $t.= "<tr>
                        <td>{$p['nombre']}</td>
                        <td>".\App\sucursal::buscarxVenta($p['idVenta'])."</td>
                        <td>{$p['cantidad']}</td>
                        <td>$ ".number_format($p['costoUnitario'] , 2)."</td>
                        <td>$ ".number_format($p['costoTotal'] , 2)."</td>
                        <td>".$p['created_at'] ."</td>
                        
                    </tr>";
          }
          return $t;
        }

}