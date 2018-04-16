<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
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

        return $pdf->download('listado.pdf');
    }

    public function one($id)
    {        
        $product = Product::find($id); 

        $pdf = PDF::loadView('pdf.product', compact('product'));

        return $pdf->download('producto.pdf');
    }
}
