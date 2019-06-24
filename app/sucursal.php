<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sucursal extends Model
{
	
     protected $table = "sucursal"; //para conocer cual es la tabla
     //public $timestamps = false; // para desactivar el timestamp
     protected $fillable= [
     'id',
     'nombre',
     'direccion',
     ];//las columnas de la base de datos
     public static function buscar($id, $tipo){ //
          $s =\App\sucursal::find($id);
         switch ($tipo) {
           case 'nombre':
             return $s['nombre'];
             break;

           case 'direccion':
            return  $s['direccion'];
             break;
           
           default:
             return "sin datos";
             break;
         }
          return $t;
        }

    public static function option(){ //verifica si el usuario tiene el privilegio que necesita
       
        $check = \App\sucursal::all();
        $t = "";
        foreach ($check as $k) {
          $t .='<option value="'.$k['id'].'">'.$k['nombre'].'</option>';
        }
     return $t;   
     }

    public static function actual(){ 
        
        $mi = \App\Usuarios::mi('sucursal');
        
        $k = \App\sucursal::find($mi);
        
          $t='<option value="'.$k['id'].'">'.$k['nombre'].' (Actual)</option>';
        
     return $t;   
     }
    public static function nombre(){
        $mi = \App\Usuarios::mi('sucursal');
        $k = \App\sucursal::find($mi);
        return $k['nombre'];   
     }
    

    public static function buscarxVenta($id){
        $mi = \App\ventas::where('idSucursal', '=' ,$id)->first();
        return \App\sucursal::buscar($mi['idSucursal'], 'nombre');
            
     }
    

}