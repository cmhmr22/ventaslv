<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class umedida extends Model
{
	
      protected $table = "unidad_medida"; //para conocer cual es la tabla
     public $timestamps = false; // para desactivar el timestamp
     protected $fillable= [
     	'id',
     	'nombre',
          'signo'
     	
];//las columnas de la base de datos


public static function option(){ //verifica si el usuario tiene el privilegio que necesita
       
        $check = \App\umedida::all();
        $t = "";
        foreach ($check as $k) {
          $t .='<option value="'.$k['id'].'">'.$k['nombre'].' ('.$k['signo'].')'.'</option>';
        }
     return $t;   
     }
public static function buscar($id, $medida){ 
       
        $c = \App\umedida::find($id);
       
        switch ($medida) {
          case 'signo':
            return $c['signo'];   
            break;
          case 'nombre':
            return $c['nombre'];   
            break;
          
          default:
            return "sin encontrar";
            break;
        }
      }

}