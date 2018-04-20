<?php
namespace App\Http\Controllers;

use App\Recibo;

use Illuminate\Http\Request;
use App\Traits\GeneradorReporte;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ReciboController extends Controller
{    
    public function index()
    {
        $recibos = Recibo::where('pdf','=',1);
        dd($recibos);
        return view('recibos',compact('recibos'));
    }

    public function pdf()
    {        
        $recibos = Recibo::where('pdf','2')->get();; 
        foreach($recibos as $recibo)
        {
            $pdf = PDF::loadView('pdf.recibo',compact('recibo'));
            $pdf->save($recibo->folio.'.pdf');

            DB::table('recibodig')
            ->where('folio','=', $recibo->folio)
            ->update(['pdf' => 2]);
        }
        return redirect()->back()->with('message','Reportes creados');
    }

    protected function crearReporte($view, $data){
        $pdf = PDF::loadView($view,$data);
        $pdf->save($data->folio);

        return "Reporte creado";
    }
}
