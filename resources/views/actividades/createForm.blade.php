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
                        {!! Form::open(['route' => 'actividades.store','method'=>'post']) !!}
                        {!! Form::hidden('asignado_id',$asignado->id) !!}
                        {!! Form::hidden('asignado_type',$asignado->type) !!}

                        {!! Form::text('actividad',null,['class'=>'form-control','placeholder'=>'Titulo']) !!}
                        {!! Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Descripcion']) !!}

                        {!! Form::submit('Registrar actividad',['class'=>'btn btn-success']); !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</section><!-- /.content -->
@endsection
