<?php
namespace App\Http\Controllers;

use App\Product;

use Illuminate\Http\Request;
use App\Traits\GeneradorReporte;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use GeneradorReporte;
    
    public function index()
    {
        $this->generarReporte();
        // $products = Product::all();

        // return view('products',compact('products'));
    }

    public function pdf()
    {        
        $products = Product::all(); 

        $msg = $this->crearReporte('pdf.products',compact('products'), 'listado.pdf');

        return redirect()->back()->with('message',$msg);
    }

    public function one(Product $product)
    {
        $name= 'rep-prod'.$product->id.'.pdf';
        $msg = $this->crearReporte('pdf.product',compact('product'), $name);

        return redirect()->back()->with('message', $msg);
    }

    protected function crearReporte($view, $data, $name){
        $pdf = PDF::loadView($view,$data);
        $pdf->save($name);

        return "Reporte creado";
    }
}
