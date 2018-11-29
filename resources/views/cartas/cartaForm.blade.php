@extends('layouts.tema')

@section('encabezado')
    <section class="content-header">
        <h1>
            Cartas 
            <small>Subir</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route ('cartas.index')}}"><i class="fa fa-dashboard"></i> Cartas</a></li>
            <li class="active">Subir</li>
        </ol>
    </section>
@endsection

@section('contenido')
    
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> Cartas
              </h2>
            </div><!-- /.col -->
          </div>

<div class="row">
    <div class="col-md-12">

        @include('partials.formErrors')

        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-primary">
                </div>
            </div>
            <div class="card-body">
                {!! Form::open(['route' => 'cartas.store', 'files' => true]) !!}
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="cartas[]" multiple>
                    {{--{!! Form::file ('customFile') !!} --}}
                    </div>
                    <br>
                    <div class="tile-footer">
                        <button class="btn btn-success" type="submit">Compartir Carta</button>
                    </div>
                {!! Form::close() !!}                
            </div>
        </div>
    </div>
</div>


</section><!-- /.content -->
@endsection
