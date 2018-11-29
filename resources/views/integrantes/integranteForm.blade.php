@extends('layouts.tema')

@section('encabezado')
    <section class="content-header">
        <h1>
           Datos del Integrante
            <small>Nuevo/Actualización</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route ('integrantes.index')}}"><i class="fa fa-dashboard"></i>integrantes</a></li>
            <li class="active">Datos</li>
        </ol>
    </section>
@endsection


@section('contenido')

<section class="invoice">
    <!-- title row -->
    <div class="row">
    <div class="col-xs-12">
        <h2 class="page-header">
            <i class="fa fa-globe"></i> Capturar Datos
        </h2>
    </div><!-- /.col -->
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            
        @include('partials.formErrors')
        
        @if (isset($integrante))
            {!! Form::model($integrante, ['method' => 'PUT','route' => ['integrantes.update', $integrante->id]])!!}
        @else
        {!! Form::open(['route' => 'integrantes.store']) !!}
        @endif
          {!! Form::hidden('grupo_id', $grupo_id) !!}

        <div class="form-group">
          <label for="grupo">Nombre</label>
          {!! Form::text('nombre', null, ['class' => 'form-control']); !!}
        </div>
        <div class="form-group">
          <label for="grupo">Edad</label>
          {!! Form::text('edad', null, ['class' => 'form-control']); !!}
        </div>
        <div class="form-group">
          <label for="grupo">telefono</label>
          {!! Form::text('telefono', null, ['class' => 'form-control']); !!}
        </div>
        
        <div class="tile-footer">
          <button class="btn btn-primary" type="submit">Aceptar</button>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>


</section><!-- /.content -->
@endsection
