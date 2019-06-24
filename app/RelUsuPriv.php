<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelUsuPriv extends Model
{
	
      protected $table = "rel_usuario_privilegio"; //para conocer cual es la tabla
     public $timestamps = false; // para desactivar el timestamp
     protected $fillable= ['id','idUsuario','idPrivilegio'];//las columnas de la base de datos


}