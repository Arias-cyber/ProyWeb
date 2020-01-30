@extends('admin.template')
@section('content')
<div class="contanier text-center">
    <div class="page-header">
        <h1>
            <i class="fa-fa-shopping-cart"></i>
        Proyectos <a href="{{ route ('admin.project.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle" aria-hidden="true"></i>Proyecto</a>
        </h1>
    </div>
<div class="page">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Estado</th>
                    <th>Fecha de inicio</th>
                    <th>Eliminar</th>
                    <th>Modificar</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                            <td>{{$project->client_id}}</td>
                            <td>{{$project->name}}</td>
                            <td>{{$project->description}}</td>
                            <td>{{$project->state}}</td>
                            <td>{{$project->startDate}}</td>

                            <td>
                                {!! Form::open(['route' => ['admin.project.destroy', $project]]) !!}
                                <input type="hidden" name="_method" value="DELETE"> 
                                <button onclick="return confirm('Eliminar Proyecto?')" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                </button>
          
                                {!! Form::close() !!}

                            </td>
                            <td>
                            <a href="{{ route ('admin.project.edit', $project) }}" class="btn btn-primary">
                                    <i class="fa fa-pencil"></i>
                                </a>
        
                            </td>

                    </tr>

                    
                @endforeach
            </tbody>
        </table>
    </div>
    
    <hr>
    <?php echo $projects ->render(); ?> <!--paginado -->
    

 </div>
</div>

@stop
