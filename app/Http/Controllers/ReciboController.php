<?php
namespace App\Http\Controllers;

use App\Recibo;

use Chumper\Zipper\Zipper;
use Illuminate\Http\Request;
use App\Traits\GeneradorReporte;
use Barryvdh\DomPDF\Facade as DPDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;


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
            return redirect()->back()->with('no-recibo','No hay nuevos recibos por generar');
        }

        foreach($recibos as $recibo)
        {
            $pdf = DPDF::loadView('pdf.recibo',compact('recibo'));
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
        $recibos = Recibo::where('pdf','!=','')->get();

        if ($recibos->isEmpty()){
            return redirect()->back()->with('no-descarga','Aun no ha generado recibos o ya han sido descargados');
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
        $pdf = DPDF::loadView($view,$data);
        $pdf->save($data->folio);

        return "Recibo creado";
    }

    public function imprimir(){
        $recibos = Recibo::where('pdf','!=','')->get();
        if ($recibos->isEmpty()){
            return redirect()->back()->with('no-descarga','No hay archivos pendientes por imprimir');
        }

        $archivos = $recibos->pluck('folio')->all();

        $oMerger = PDFMerger::init();
        foreach($recibos as $recibo){
            $oMerger->addPDF('recibos/'.$recibo->folio.'.pdf', 'all');
        }
        $oMerger->merge();
        $oMerger->stream('recibos/general.pdf');

        Recibo::query()->truncate();

    }
}
