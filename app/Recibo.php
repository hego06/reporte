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
        return strtoupper(Carbon::parse($fSalida)->formatLocalized('%d-%b-%Y'));
    }

    function getFechahoyAttribute($fechaHoy)
    {
        return strtoupper(Carbon::parse($fechaHoy)->formatLocalized('%d de %B del %Y'));
    }

    function getFechatcAttribute($fechaTipoCambio)
    {
        return strtoupper(Carbon::parse($fechaTipoCambio)->formatLocalized('%d-%b-%Y'));
    }

    function getFechsaopAttribute($fechaOperacion)
    {
        return strtoupper(Carbon::parse($fechaOperacion)->formatLocalized('%d-%b-%Y'));    
    }

}
