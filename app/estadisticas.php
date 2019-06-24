<?php

namespace App;
use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class estadisticas extends Model
{

        public static function cantidadVentas($id){ //Asigna nombre al status
            	$date = Carbon::now();
            switch ($id) {
            	case 'countHoy':
            	$d = \App\ventas::where('created_at', '>', $date->toDateString())->get()->count();
                return $d;
        		break;

            	case 'sumaHoy':
            	$d = \App\productosVendidos::where('created_at', '>', $date->toDateString())->get()->sum('cantidad');
                return $d;
        		break;

        		case 'gananciaHoy':
            	$d = \App\productosVendidos::where('created_at', '>', $date->toDateString())->get()->sum('gananciaTotal');
                return number_format($d , 2);
        		break;

        		case 'acomuladoHoy':
                $d = \App\ventas::where('created_at', '>', $date->toDateString())->get()->sum('costoTotal');
                return number_format($d , 2);
                break;
                case 'mejorVendidosMes':
                $month = $date->subMonth();
                $d = \App\productosVendidos::where('created_at', '>', $date->toDateString())->groupBy('idProducto')->selectRaw('sum(cantidad) as sum, nombre, idProducto')->get()->take('10');
                
                $t="";
                foreach ($d as $ventas => $v) {
                    $t.='<tr>
                            <td class="text-center" style="width: 100px;"><a href="producto-ver-'.$v['idProducto'].'"><strong>'.\App\productos::info($v['idProducto'],'abrev').'</strong></a></td>
                            <td><a href="#">'.$v['nombre'].'</a></td>
                            <td class="text-center"><strong>'.$v['sum'].'</strong> ventas</td>
                            <td class="hidden-xs text-center">
                                                            
                            </td>
                        </tr>';
                }
                return $t;
                break;
                
                case 'ultimasVentasDia':
                 $month = $date->subMonth(); 

                $d = \App\ventas::where('updated_at', '>', $date->toDateString())->orderBy('created_at','desc')->get()->take('10');
                $t = '';
                foreach ($d as $v) {
                    $t.='<tr>
                            <td class="text-center" style="width: 100px;"><a href="venta-ver-'.$v["id"].'"><strong>'.$v["id"].'</strong></a></td>
                            <td class="hidden-xs">'.\App\Usuarios::buscar($v['idUsuario'],'Nom').'</td>
                            <td class="hidden-xs">'.\App\sucursal::buscar($v['idSucursal'],'nombre').'</td>
                            <td class="text-right"><strong>$'.number_format($v['costoTotal'], 2).'</strong></td>
                            <td class="text-right">'.\App\ventas::status($v['status']).'</td>
                        </tr>';
                }
                return $t;
                break;
                
            	default:
            		return "nay nay";
            		break;
            }
        }


    public static function stockMinimo(){
        $d = \App\stocks::orderByRaw('cantidad - stockMinimo')
                ->get()->take('10');
                
                $t="";
                foreach ($d as $ventas => $v) {
                    $t.='<tr>
                            <td class="text-center"><a href="producto-ver-'.$v['idElem'].'"><strong>'.\App\productos::info($v['idElem'],'nombre').'</strong></a></td>
                            <td>'.$v['stockminimo'].' '.\App\productos::info($v['idElem'],'uMedida').'</td>
                            <td class="text-center"><strong>'.$v['cantidad'].' '.\App\productos::info($v['idElem'],'uMedida').'</strong></td>
                           
                        </tr>';
                }
                return $t;
    } 
}