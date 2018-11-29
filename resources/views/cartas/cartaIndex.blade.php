@extends('layouts.tema')

@section('encabezado')
    <section class="content-header">
        <h1>
            Cartas 
            <small>Listado</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route ('integrantes.index')}}"><i class="fa fa-dashboard"></i> Congregación</a></li>
            <li class="active">Cartas</li>
        </ol>
        @guest
        @else
            <hr>
            <a class="btn btn-success" href="{{ route('cartas.create') }}">Agregar carta</a>
            <hr>
        @endguest
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
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-primary">
                </div>
            </div>
            <div class="card-body">
{{$cartas}}
                   @if ($cartas->count())
                <table class="table" id="cartas">
                    <thead>
                        <th>ID</th>
                        <th>Nombre</th>
                        
                        @guest
                        @else
                        @if (Auth::id() == 1)
                            <th>Eliminar</th>
                        @endif
                        @endguest
                    </thead>
                    <tbody>
                            @foreach($cartas as $carta)
                                <tr>
                                    <td>{{ $carta->id }}</td>   
                                    <td>{{ $carta->nombre_original }}</td> 
                                    
                                    
                                    @guest
                                    @else
                                    @if (Auth::id() == 1)
                                                <td>
                                                    {!! Form::open(['method' => 'delete','route' => ['cartas.destroy', $carta->id]]) !!}     
                                                    {!! Form::submit('X', ['class'=>'btn btn-danger']) !!}
                                                    {!! Form::close() !!} 
                                                </td> 
                                        
                                            @endif
                                @endguest



                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    {{-- Muestra los enlaces generados para implementar paginación--}} 
                    {{ $cartas->links() }}
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
