<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products',compact('products'));
    }

    public function pdf()
    {        
        $products = Product::all(); 
        $pdf = PDF::loadView('pdf.products', compact('products'));
        $pdf->save('listado.pdf');

        return  redirect()->back()->with('menssage','Reporte creado');
    }

    public function one(Product $product)
    {
        $pdf = PDF::loadView('pdf.product', compact('product'));
        $pdf->save('rep-prod'.$product->id.'.pdf');

        return  redirect()->back()->with('menssage','Reporte creado');
    }
}
