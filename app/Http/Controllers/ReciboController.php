<?php
namespace App\Http\Controllers;

use App\Recibo;

use Chumper\Zipper\Zipper;
use Illuminate\Http\Request;
use App\Traits\GeneradorReporte;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;


class ReciboController extends Controller
{    
    
    public function index()
    {
        $recibos = Recibo::where('pdf','=','')->get();
        
        return view('recibos',compact('recibos'));
    }
    
    /* 
        Genera un pdf por cada registro donde el campo PDF este vacio
    */
    public function pdf()
    {        
        $recibos = Recibo::where('pdf','')->get();; 
        if ($recibos->isEmpty()) {
            return redirect()->back()->with('message','No hay nuevos reportes por generar');
        }
        foreach($recibos as $recibo)
        {
            $pdf = PDF::loadView('pdf.recibo',compact('recibo'));
            $pdf->save('recibos/'.$recibo->folio.'.pdf');

            DB::table('recibodig')
            ->where('folio','=', $recibo->folio)
            ->update(['pdf' => 1]);
        }

        return redirect()->back()->with('message','Reportes creados');
    }

    /* 
        Descarga un archivo zip de los PDF, al finalizar actuliza
        el valor de pdf a 2 para indicar que ya se a descargado.
    */
    public function descargar(){
        set_time_limit(500);
        $recibos = Recibo::where('pdf','=','1')->get();

        if ($recibos->isEmpty()){
            return redirect()->back()->with('message','No hay nuevos reportes por descargar');
        }

        if(file_exists(public_path('recibos/recibos.zip'))){
            File::delete(public_path('recibos/recibos.zip'));
        }

        $archivos = $recibos->pluck('folio')->all();

        $zipper = new Zipper;
        $zipper->make(public_path('recibos/recibos.zip'))->folder('recibos')->add(public_path('recibos'),$archivos);
        $zipper->close();

        foreach($archivos as $folio)
        {
            DB::table('recibodig')
            ->where('folio','=', $folio)
            ->update(['pdf' => 2]);
        }
        
        return  Response::download(public_path('recibos/recibos.zip'),'reportes.zip');
    }

    protected function crearReporte($view, $data){
        $pdf = PDF::loadView($view,$data);
        $pdf->save($data->folio);

        return "Reporte creado";
    }
}
