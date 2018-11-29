@extends('layouts.tema')
{{--
@section('usuario')
<div class="user-panel">
    <div class="pull-left image">
        <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
    </div>
    <h3>
        <font color="white">Vista General</font>
    </h3>
    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    <div class="pull-left info">
    </div>
</div>
@endsection
--}}

@section('encabezado')
    <section class="content-header">
        <h1>
            Integrantes
            <small>Listado</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route ('integrantes.index')}}"><i class="fa fa-dashboard"></i> Congregación</a></li>
            <li class="active">Integrantes</li>
        </ol>
    </section>
@endsection

@section('contenido')
    
    <section class="invoice">
        <!-- title row -->
        <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
            <i class="fa fa-globe"></i> Integrantes totales
            </h2>
        </div><!-- /.col -->
        </div>

        <div class="row">
            <div class="col-md-12">
        @include('partials.formErrors')
                <div class="card card-shadow mb-4">
                    <div class="card-header border-0">
                        <div class="custom-title-wrap bar-primary">
                            <div class="custom-title">Listado Integrantes</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table" id="integrantes">
                            <thead>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Grupo</th>
                                <th>Edad</th>
                                <th>Telefono</th>
                                <th>Miembros desde</th>
                                <th>Actividades</th>
                            </thead>
                            <tbody>
                                @foreach($integrantes as $integrante)
                                    <tr>
                                        <td>
                                            <a class="btn btn-sm btn-info" href="{{ route('integrantes.edit', [$integrante->id, $integrante->grupo_id]) }}">{{ $integrante->id }}</a>
                                        </td> 
                                        {{--
                                            <td>{{ $integrante->id }}</td>       
                                        --}}                               
                                        <td>{{ $integrante->nombre }}</td>
                                        <td>{{ $integrante->grupo_id }}</td>
                                        <td>{{ $integrante->edad }}</td>
                                        <td>{{ $integrante->telefono }}</td>
                                        <td>{{ $integrante->created_at }}</td>
                                        <td>
                                            <a class="btn btn-success" href="{{route('actividades.integrantes.index',$integrante->id)}}">
                                                Actividades
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        {{-- Muestra los enlaces generados para implementar paginación --}}
                        {{ $integrantes->links() }}
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.content -->
@endsection
