<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    protected $table = 'recibodig';

    // function getFsalidaAttribute($fSalida)
    // {
    //     $mesCorto = array("ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV","DIC");
    //     $date = strtotime($fSalida);
    //     $fSalida = date('d',$date)."-".$mesCorto[date('n',$date)-1]. "-".date('Y',$date);
    //     return $fSalida;
    // }

    // function getFechahoyAttribute($fechaHoy)
    // {
    //     $mesCom = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
    //     $date = strtotime($fechaHoy);
    //     $fechaHoy = date('d',$date)." DE ".$mesCom[date('n',$date)-1]. " DEL ".date('Y',$date);
    //     return $fechaHoy;
    // }

    function getFsalidaAttribute($fSalida)
    {
        return Carbon::parse($fSalida)->format('d-M-Y');
    }

    function getFechahoyAttribute($fechaHoy)
    {
        return Carbon::parse($fechaHoy)->format('d \d\e F \d\e\l Y');       
    }
}
