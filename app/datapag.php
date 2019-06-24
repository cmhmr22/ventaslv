<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datapag extends Model
{
      protected $table = "configuracion"; //para conocer cual es la tabla
     public $timestamps = false; // para desactivar el timestamp
     protected $fillable= ['NombreEmpresa','Url','CorreoContacto','ColorTheme', 'HeaderTheme'];//las columnas de la base de datos

public static function ver($id){ //verifica si el usuario tiene el privilegio que necesita
        $check = \App\datapag::find('0'); // check revisa si existe el privilegio 
        switch ($id) {
        	case 'NomE':
        		return $check['NombreEmpresa'];
        		break;
        	case 'Url':
        		return $check['Url'];
        		break;
        	case 'CorreoC':
        		return $check['CorreoContacto'];
        		break;
        	case 'Theme':
                return $check['ColorTheme'];
                break;
            case 'HTheme':
                return $check['HeaderTheme'];
                break;
        	
        	default:
        		return "no encontrado, revisa modelo de datapag";
        		break;
        }
        return "no encontrado, revisa modelo de datapag";	
        
        }
}