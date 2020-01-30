@extends('admin.template')
@section('content')
<div class="contanier text-center">
    <div class="page-header">
        <h1>
            <i class="fa-fa-shopping-cart"></i>
        CLIENTES <a href="{{ route ('admin.client.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle" aria-hidden="true"></i>Cliente</a>
        </h1>
    </div>
<div class="page">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cuit/Cuil</th>
                    <th>Estado</th>
                    <th>Eliminar</th>
                    <th>Modificar</th>
                    <th>Detalle</th>
                    <th>Agregar proyecto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                            <td>{{$client->name}}</td>
                            <td>{{$client->cuit}}</td>
                            <td>{{$client->state}}</td>
                            <td>
                                {!! Form::open(['route' => ['admin.client.destroy',$client]]) !!}
                                <input type="hidden" name="_method" value="DELETE"> 
                                <button onclick="return confirm('Eliminar Cliente?')" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                </button>
          
                                {!! Form::close() !!}

                            </td>
                            <td>
                            <a href="{{ route ('admin.client.edit', $client) }}" class="btn btn-primary">
                                    <i class="fa fa-cloud"></i>
                                </a>
        
                            </td>
                            <td>Detalle</td>
                            <td>Agregar proyecto</td>
                    </tr>

                    
                @endforeach
            </tbody>
        </table>
    </div>
 </div>
</div>
   <!-- @foreach ($clients as $client)
        <h3>{{$client}}</h3>
    @endforeach -->
@stop
