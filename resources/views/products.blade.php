@extends('layout')

@section('content')
    <h1 class="page-header">Listado de productos</h1>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Descripción</th>
                <th>Stock</th>
                <th>Reporte</th>
            </tr>                            
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td class="text-right">{{ $product->stock }}</td>
                <td>
                    <a type="button" class="btn" href="{{ route('product.pdf',$product->id) }}"><i class="glyphicon glyphicon-file"></i></a>
                    <a class="btn ver" type="button" data-toggle="modal" data-target="#myModal" data-name="{{'rep-prod'.$product->id.'.pdf'}}" class="btn"><i class="glyphicon glyphicon-eye-open"></i></a>
                </td>      
            </tr>
            @endforeach
        </tbody>
    </table>
<!--Inicio modal-->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Reporte PDF</h4>
        </div>
        <div class="modal-body" id="contenido">
            <embed src="" frameborder="0" width="100%" height="400px">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
<!--Fin modal-->

@endsection
