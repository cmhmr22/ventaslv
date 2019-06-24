<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilegios extends Model
{
      protected $table = "privilegios"; //para conocer cual es la tabla
     //public $timestamps = false; // para desactivar el timestamp
     protected $fillable= ['id','padre','nombre'];//las columnas de la base de datos

	public static function verificar($idAcceso){ //verifica si el usuario tiene el privilegio que necesita
        $x =  session()->get('SUser'); // obtiene el usuario
        $check = \App\RelUsuPriv::where('idUsuario', '=', $x['id'])
        ->where('idPrivilegio', '=', $idAcceso)->first(); // check revisa si existe el privilegio 
        if (!$check) {
        	return 0; // si no hay registros devuelve 0, o false
        }
        else
        {
        	return 1; // si existe devuelve true o 1
        }	
        
        }
}