<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
      protected $table = "usuarios"; //para conocer cual es la tabla
     //public $timestamps = false; // para desactivar el timestamp
     protected $fillable= ['id','correo','usuario','pass','bajalogica', 'nombre', 'telefono', 'direccion','sucursal'];//las columnas de la base de datos

    public static function mi($id){ //verifica si el usuario tiene el privilegio que necesita
        $check = session()->get('SUser');

        switch ($id) {
            case 'Nom':
                return $check['nombre'];
                break;
            case 'Usu':
                return $check['usuario'];
                break;    
            case 'email':
                return $check['correo'];
                break;
            case 'id':
                return $check['id'];
                break;
            case 'sucursal':
                return $check['sucursal'];
                break;
            case 'todo':
            return $check;
                break;
            default:
                return "no encontramos el comando, revisa modelo usuarios";
                break;
        }
        
    }//fin public static "mi" usuario

    public static function buscar($id, $c){ //verifica los datos del usuario segun su id
        $check =  \App\usuarios::find($id);
        
        switch ($c) {
            case 'Nom':
                return $check['nombre'];
                break;
            case 'email':
                return $check['correo'];
                break;
            case 'tel':
                return $check['telefono'];
                break;
            case 'dir':
                return $check['direccion'];
                break;
            
            case 'status':
                
                // switch para el status
                switch ($check['bajalogica']) {
                    case '0':
                        return 'Baja temporal';
                        break;
                    case '1':
                        return 'Activo actualmente';
                        break;
                    case '3':
                        return 'Eliminado permanente';
                        break;
                    
                    default:
                        return 'No existe la persona';
                        break;
                }
                //end swithc status
                break;
            
            default:
                return "No encontramos el comando, revisa modelo usuarios";
                break;
        }
        
    }

    public static function status($id){ //Asigna nombre al status

        switch ($id) {
            case '0':
                return "<span class='label label-warning'>Inactivo</span>";
                break;
            case '1':
                return "<span class='label label-success'>Activo</span>";
                break;
            case '3':
                return "<span class='label label-danger'>Eliminado</span>";
                break;
            
            default:
                return "no encontramos el comando, revisa modelo usuarios/status";
                break;
        }
    } //fin status   

   
        
    

}