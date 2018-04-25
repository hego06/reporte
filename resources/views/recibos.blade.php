@extends('layout')

@section('content')
<div class="row">
    <div class="col-xs-12">
        @if (Session::has('message'))
            <div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;">
                {{ Session::get('message') }}
            </div>
        @endif
        @if (Session::has('no-recibo'))
            <div class="alert alert-info fade in alert-dismissible" style="margin-top:18px;">
                {{ Session::get('no-recibo') }}
            </div>
        @endif
        @if (Session::has('no-descarga'))
            <div class="alert alert-warning fade in alert-dismissible" style="margin-top:18px;">
                {{ Session::get('no-descarga') }}
            </div>
        @endif
    </div>
</div>
<br>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">RECIBOS</a>
    </div>
    <ul class="nav navbar-nav">
        <li>
            <a href="{{route('recibos.pdf')}}" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-cog"></span>Generar recibos</a>
        </li>
        <li>
            <a href="{{route('download.recibos')}}" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-save"></span>Descargar recibos</a>
        <li>
    </ul>
    <ul class="nav navbar-nav pull-right">
        <li>
            <a class="btn ver btn-default btn-lg" href="{{route('imprimir.recibos')}}">
            <span class="glyphicon glyphicon-print"></span> Imprimir recibos
            </a>
        </li>
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
                        <span class="glyphicon glyphicon-exclamation-sign"></span>
                        Recibo no generado
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
