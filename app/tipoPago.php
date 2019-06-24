<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipoPago extends Model
{

public static function ver($t){ //verifica si el usuario tiene el privilegio que necesita
      switch ($t) {
        case '1':
          return "Efectivo";
          break;
        case '2':
          return "Tarjeta de credito";
          break;
        case '3':
          return "Deposito";
          break;
        default:
          return "Desconocido";
          break;
      }

  }
}
