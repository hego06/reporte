@extends('layout')

@section('content')

<table>
    <h1 class="page-header">Recibos</h1>
</table>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li><a href="{{route('recibos.pdf')}}" class="btn"> <i class="fa fa-plus"></i><strong>Generar reportes</strong></a></li>
      <li><a href="{{route('download.recibos')}}" class="btn"> <i class="fa fa-plus"></i><strong>Descargar reportes</strong></a></li>
    </ul>
  </div>
</nav>

</div>
    <div id="scroll">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Folio</th>
                <th>Nombre</th>
                <th>Recibos</th>
            </tr>                            
        </thead>
        <tbody>
            @foreach($recibos as $recibo)
            <tr>
                <td>{{ $recibo->folio }}</td>
                <td>{{ $recibo->nombre }}</td>
                <td>
                    @if(!empty($recibo->pdf))
                        <a class="btn ver" type="button" data-toggle="modal" data-target="#myModal" data-name="{{$recibo->folio.'.pdf'}}" class="btn"><i class="glyphicon glyphicon-eye-open"></i></a>
                    @else
                        Reporte no genrado
                    @endif
                </td>      
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

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
