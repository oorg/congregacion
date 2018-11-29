@extends('layouts.tema')

@section('encabezado')
    <section class="content-header">
        <h1>
            Actividades
            <small>Listado</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route ('integrantes.index')}}"><i class="fa fa-dashboard"></i> Congregación</a></li>
            <li class="active">Actividades</li>
        </ol>
    </section>
@endsection

@section('contenido')
    
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> Actividades
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
                    @if ($actividades->count())
                <table class="table" id="actividad">
                    <thead>
                        <th>ID</th>
                        <th>Actividad</th>
                        <th>Descripcion</th>
                        <th>Id Asignado</th>
                    </thead>
                    <tbody>
                            @foreach($actividades as $actividad)
                                <tr>
                                    <td>{{ $actividad->id }}</td>   
                                    <td>{{ $actividad->actividad }}</td>
                                    <td>{{ $actividad->descripcion }}</td>   
                                    <td>
                                        @if($actividad->asignado_type=="App\Integrante")
                                        Integrante: 
                                        @else
                                        Grupo: 
                                        @endif
                                        {{$actividad->asignado->nombre}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    {{-- Muestra los enlaces generados para implementar paginación --}}
                    {{ $actividades->links() }}
                    <hr>
                        @else
                            <div class="alert alert-danger" role="alert">
                            No hay actividades registradas
                            </div>
                            
                        @endif
                    
            </div>
        </div>
    </div>
</div>


</section><!-- /.content -->
@endsection
