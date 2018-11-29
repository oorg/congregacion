@extends('layouts.tema')

@section('encabezado')
    <section class="content-header">
        <h1>
            Nombramientos
            <small>Asignar</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('grupos.show', $grupo_id) }}"><i class="fa fa-dashboard"></i>Grupo {{ $grupo_id }}</a></li>
            <li class="active">Nombramientos</li>
        </ol>
    </section>
@endsection

@section('contenido')
    
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i>     {{ $integrante->nombre }}
              </h2>
            </div><!-- /.col -->
          </div>
<div class="row">
    <div class="col-md-12">
        @include('partials.formErrors')
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-primary">
                    <div class="custom-title">Detalles</div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Grupo</th>
                        <th>Edad</th>
                        <th>Telefono</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $integrante->id }}</td>
                            <td>{{ $grupo_id }}</td>
                            <td>{{ $integrante->edad }}</td>
                            <td>{{ $integrante->telefono }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-primary">
                    <div class="custom-title">Nombramientos Adquiridos</div>
                </div>
            </div>
            <table class="table table-striped condensed">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Edad al adquirirlo</th>
                        <th>Comentario</th>
                    </tr>
                </thead>
                @foreach($integrante->nombramiento as $nombramiento)
                <tr>
                    {{--
                    <td>
                        <a class="btn btn-sm btn-info" href="{{ route('integrantes.edit', [$integrante->id,$grupo->id]) }}">{{ $integrante->id }}</a>
                    </td>
                        <td>{{ $integrante->id }}</td> 
                        --}}
                    <td>{{ $nombramiento->nombramiento }}</td>
                    <td>{{ $nombramiento->pivot->edad }}</td>
                    <td>{{ $nombramiento->pivot->comentario }}</td>
                </tr>
                @endforeach
            </table>
                {!! Form::open(['route' => 'nombramiento.create', 'class' => 'form']) !!}
                {!!Form::label('Selecciona un nombramiento');!!}
                {!! Form::select('nombramiento_id[]', $nombramientos, $selected, ['class' => 'form-control', 'id' => 'sel-nombramientos', 'multiple' => 'multiple']); !!}
                {{--
                {!! Form::select('nombramiento_id[]', $nombramientos, $selected, ['placeholder' => 'Selecciona una urg','class'=>'custom-select','multiple'=>'multiple','style'=>'height:300px;']); !!}
                    !! Form::select('nombramiento_id[]', $nombramientos, $integrante->nombramiento->pluck('id')->toArray(), ['class' => 'form-control', 'id' => 'sel-nombramientos', 'multiple' => 'multiple']) !!
                    --}}
                <div class="form-group">
                <label for="nombramiento">Edad actual del integrante</label>
                {!! Form::text('edad', null, ['class' => 'form-control']); !!}
                </div>
                <div class="form-group">
                <label for="nombramiento">Comentario</label>
                {!! Form::text('comentario', null, ['class' => 'form-control']); !!}
                </div>
                {!! Form::hidden('integrante_id', $integrante->id) !!}
                {!! Form::hidden('grupo_id', $grupo_id) !!}
                {!! Form::submit('Aceptar', ['class' => 'btn btn-sm btn-success']) !!}
                {!! Form::close() !!}
        </div>
    </div>
</div>


</section><!-- /.content -->
@endsection