@extends('layouts.tema')

@section('encabezado')
    <section class="content-header">
        <h1>
            Grupos
            <small>Listado</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route ('integrantes.index')}}"><i class="fa fa-dashboard"></i> Congregación</a></li>
            <li class="active">Grupos</li>
        </ol>
    </section>
@endsection

@section('contenido')
    
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> Grupos
              </h2>
            </div><!-- /.col -->
          </div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-primary">
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="integrantes">
                    <thead>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>ID del usurio</th>
                    </thead>
                    <tbody>
                        @foreach($grupos as $grupo)
                            <tr>
                                <td>
                                  <a class="btn btn-sm btn-info" href="{{ route('grupos.show', $grupo->id) }}">{{ $grupo->id }}</a>
                                </td>                                
                                <td>{{ $grupo->nombre }}</td>
                                <td>{{ $grupo->user->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                {{-- Muestra los enlaces generados para implementar paginación --}}
                {{ $grupos->links() }}
                <hr>
            </div>
        </div>
    </div>
</div>


</section><!-- /.content -->
@endsection
