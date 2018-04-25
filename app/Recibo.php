<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
setlocale(LC_TIME, 'Spanish');
class Recibo extends Model
{
    protected $table = 'recibodig';
    
    function getFsalidaAttribute($fSalida)
    {
        return Carbon::parse($fSalida)->formatLocalized('%d-%b-%Y');
    }

    function getFechahoyAttribute($fechaHoy)
    {
        return Carbon::parse($fechaHoy)->formatLocalized('%d de %B del %Y');
    }

    function getFechatcAttribute($fechaTipoCambio)
    {
        return Carbon::parse($fechaTipoCambio)->formatLocalized('%d-%b-%Y');
    }

    function getFechsaopAttribute($fechaOperacion)
    {
        return Carbon::parse($fechaOperacion)->formatLocalized('%d-%b-%Y');
    }

}
