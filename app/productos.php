<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
class productos extends Model
{
	
      protected $table = "elementos"; //para conocer cual es la tabla
     //public $timestamps = false; // para desactivar el timestamp
     protected $fillable= [
     	'id',
     	'nombre',
     	'created_at',	
     	'updated_at',	
     	'status',
     	'tipo',
      'abrev',
          'idUnidadMedida',
          'idCategoria',
     	
     	'codigoBarras'
];//las columnas de la base de datos


     public static function agregar($data){ //
          \App\productos::create([
                'codigoBarras'=>$data['codigoBarras'],
                'abrev'=>$data['abrev'],
                'nombre'=>$data['nombre'],
                'idUnidadMedida'=>$data['unidadMedida'],
                'idCategoria'=>$data['categoria'],
                'tipo'=>1,
                
            ]);
          $buscarid = \App\productos::all()->last();
          return $buscarid['id'];
        }
    public static function modificar($data){ //
          
          $p=\App\productos::find($data['idProducto']);
          $p->codigoBarras=$data['codigoBarras'];
          $p->abrev=$data['abrev'];
          $p->nombre=$data['nombre'];
          $p->idUnidadMedida=$data['unidadMedida'];
          $p->idCategoria=$data['categoria'];
          $p->save();
          return "ok";
        }

    public static function datos($id,$accion){ //
          $b = \App\stocks::where('idElem','=',$id)->where('idSuc','=',\App\Usuarios::mi('sucursal'))->first();

          switch ($accion) {
             case 'costo':
               return $b['precioVenta'];
               break;
              case 'costoCompra':
               return $b['precioCompra'];
               break;
             case 'cantidad':
               return $b['cantidad'];
               break;
              case 'descuento':
               return $b['descuento'];
               break;
             
             default:
               return "no encontramos informacion";
               break;
           } 
          
        }
    public static function info($id,$accion){ //
          $b = \App\productos::find($id);

          switch ($accion) {
             case 'abrev':
               return $b['abrev'];
               break;
              case 'codigoBarras':
               return $b['codigoBarras'];
               break;
              case 'nombre':
               return $b['nombre'];
               break;

              case 'uMedida':
               return \App\umedida::buscar($b['idUnidadMedida'], 'nombre');
               break;
              case 'categoria':
               return \App\categorias::buscar($b['idCategoria']);
               break;
             
             default:
               return "no encontramos informacion";
               break;
           } 
          
        }


    public static function listarHtml($opcion){ //
          if (!Cache::has('productos')) {
            $value = Cache::get('productos',  function () {
                return \App\productos::where('status','=','1')->get();
            });
          }
          $t="";
          switch ($opcion) {
            case 'nombre':
              foreach ($value as $k) {
                $t .= "<option value='{$k['id']}'>{$k['nombre']}</option>";  
              }
              break;
            case 'codigoBarras':
              foreach ($value as $k) {
                if ($k['codigoBarras'] != "") {
                $t .= "<option value='{$k['id']}'>{$k['codigoBarras']}</option>";
                }  
              }
              break;
            case 'abrev':
              
              foreach ($value as $k) {
                if ($k['abrev'] != "") {
                $t .= "<option value='{$k['id']}'>{$k['abrev']}</option>";  
              
                }
              }
              break;
            
            default:
              return "sin datos";
              break;
          }
          
          return $t;
        }

        public static function listarxSucursal($id){ //
        
          $value = \App\stocks::where('idElem','=', $id)->get();
          $t="";
          foreach ($value as $v) {
            $t.="<tr>
                        <td>".\App\sucursal::buscar('1','nombre')."</td>
                        <td>{$v['stockminimo']} </td>
                        <td>{$v['cantidad']}</td>
                        
                    </tr>";
          }
          return $t;
        }

}