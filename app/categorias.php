<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
	
      protected $table = "categoria"; //para conocer cual es la tabla
     public $timestamps = false; // para desactivar el timestamp
     protected $fillable= [
     	'id',
     	'nombre',
      'padre'
     	
];//las columnas de la base de datos

public static function optionadd(){ 
       
        $check = \App\categorias::where('padre','=','0')->get();
        $t = "";
        foreach ($check as $k) {
             $t .='<option value="'.$k['id'].'">'.$k['nombre'].'</option>';
        }
     return $t;
     }
public static function option(){ 
       
        $check = \App\categorias::where('padre','=','0')->get();
        $t = "";
        foreach ($check as $k) {
            $hijos = \App\categorias::where('padre','=',$k['id'])->where('padre','<>',0)->get();
             $t .='<option style="color:red;" value="'.$k['id'].'">'.$k['nombre'].'</option>';
             foreach($hijos as $h)
             {
                $t .='<option  value="'.$h['id'].'">'.$h['nombre'].'</option>';
             }         
        }
     return $t;   
     }

public static function listarRaw(){ 
       
        $check = \App\categorias::where('padre','=','0')->get();
    
        $t = array();
        foreach ($check as $k) {
            
            $hijos = \App\categorias::where('padre','=',$k['id'])->where('padre','<>',0)->get();
             $t[] =$k;
             foreach($hijos as $h)
             {
                $t[] =$h;
             }         
        }
     return $t;
     }
public static function buscar($id){ 
       
        $c = \App\categorias::find($id);
        
     return $c['nombre'];   
     }
public static function contar($id){ 
       $cat=\App\categorias::find($id);
       
        $c = \App\productos::where('idCategoria', '=' ,$id)->count('id');
        if($id == 0)
       {
        return $c;
       }
       if($cat['padre'] == "0")
        {
           
           $suma = 0;
            $p = \App\categorias::where('padre', '=' ,$id)->get();
            foreach ($p as $k) {
                $suma = $suma + \App\productos::where('idCategoria', '=' ,$k['id'])->count('id');
            }
            $c = $c + $suma;
        }    
     return $c;   
     }

public static function eliminar($id){ 
        $cat=\App\categorias::find($id);
        $listap = \App\productos::where('idCategoria', '=' ,$id)->get();
        if($id == 0)
           {
            return "no se puede eliminar";
           }    
        foreach ($listap as $k) {
            $p = \App\find($k['id']);
            $p->idCategoria = $cat['padre'];
            $p->save();
        }
        $cat->delete();
     return "ok";   
     }



}