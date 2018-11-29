@extends('layouts.tema')

@section('encabezado')
    <section class="content-header">
        <h1>
            Grupo
            <small>Detalles</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route ('grupos.index')}}"><i class="fa fa-dashboard"></i>Grupos</a></li>
            <li class="active">Grupo {{ $grupo->id }}</li>
        </ol>
    </section>
@endsection

@section('contenido')
    
<section class="invoice">
    <!-- title row -->
    <div class="row">
    <div class="col-xs-12">
        <h2 class="page-header">
        <i class="fa fa-globe"></i> Integrantes de este grupo
        </h2>
    </div><!-- /.col -->
    </div>
    
<div class="row">
    <div class="col-md-12">
        @include('partials.formErrors')
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-primary">
                    <div class="custom-title">Detalle del Grupo</div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Administrador</th>
                    </thead>
                    <tbody>
                        <tr>              
                            <td>{{ $grupo->id }}</td>
                            <td>{{ $grupo->nombre }}</td>
                            <td>{{ $grupo->user->name }}</td>
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
                    <div class="custom-title">Integrantes</div>
                    </div>
                </div>            
                <table class="table table-striped condensed">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Telefono</th>
                            <th>Nombramiento</th>
                        </tr>
                    </thead>
                    @foreach($grupo->integrantes as $integrante)
                        <tr>
                            <td>
                                <a class="btn btn-sm btn-info" href="{{ route('integrantes.edit', [$integrante->id,$grupo->id]) }}">{{ $integrante->id }}</a>
                            </td>
                            {{--<td>{{ $integrante->id }}</td> --}}
                            <td>{{ $integrante->nombre }}</td>
                            <td>{{ $integrante->edad }}</td>
                            <td>{{ $integrante->telefono }}</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="{{ route('nombramientos.agrega', [$integrante->id, $grupo->id]) }}">Añadir √</a>
                            </td> 
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <hr>
            <a class="btn btn-success" href="{{ route('integrantes.create', $grupo->id) }}">Agregar integrante</a>
        <hr>
    </div>
</div>

</section><!-- /.content -->
@endsection