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
                <div class="row">
                    <div class="col">
                        @if(isset($actividad))
                        <table class="table" id="actividad">
                            <thead>
                                <th>ID</th>
                                <th>Actividad</th>
                                <th>Descripcion</th>
                                <th>Id Asignado</th>
                                <th>Tipo de asignado</th>
                                <th>Eliminar</th>
                            </thead>
                            <tbody>
                                @foreach($actividad as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>   
                                        <td>{{ $item->actividad }}</td>
                                        <td>{{ $item->descripcion }}</td>   
                                        <td>{{ $item->asignado_id }}</td>
                                        <td>{{ $item->asignado_type }}</td>
                                        <td>
                                            {!! Form::open(['route' => ['actividades.destroy',$item->id],'method'=>'delete']) !!}
                                                {!! Form::submit('x',['class'=>'btn btn-danger']); !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                        <br><br>
                        {!! Form::open(['route' => 'actividades.create','method'=>'post']) !!}
                        {!! Form::hidden('asignado_id',$asignado->id) !!}
                        {!! Form::hidden('asignado_type',$asignado->type) !!}
                        {!! Form::submit('Agregar actividad',['class'=>'btn btn-success']); !!}
                        {!! Form::close() !!}
                    </div>
                </div>

                    
            </div>
        </div>
    </div>
</div>


</section><!-- /.content -->
@endsection
