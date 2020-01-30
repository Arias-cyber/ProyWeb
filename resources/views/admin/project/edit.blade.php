@extends('admin.template')

@section('content')

<div class="container-fluit">
        <div class="page-header">
                <h1>
                    <i class="fa fa-shopping-cart"></i>
                    Proyectos <small> Editar Proyectos <small>
                </h1>
        
            </div>
        <div class="row-center">
        <div class="col-md-offset-3 col-md-6">
            <div class="page">

                @if (count($errors)>0)
                    @include('admin.partials.errors')
                    
                @endif

                {!! Form::model($project, array('route' => array('admin.project.update', $project))) !!}

                    <input type="hidden" name="_method" value="PUT"> <!-- Simulo una peticion-->

                <div class="form-group">
                        <label class="control-label" for="client_id">Cliente</label>
                        {!! Form::select ('client_id', $clients,null,['class'=>'form-control'])!!}
                </div>

                <div class="form-group">
                    <label for="name">Nombre</label>

                    {!!
                        Form::text(
                            'name',
                            null,
                            array(
                                'class'=>'form-control',
                                'placeholder'=> 'Ingrese el Nombre',
                                'required' => 'required',
                                'autofocus'=>'autofocus'
                            )
                        )

                    !!}
                </div>
            </div>
    
            <div class="form-group">
                    <label for="name">Descripcion</label>

                    {!!
                        Form::text(
                            'description',
                            null,
                            array(
                                'class'=>'form-control',
                                'placeholder'=> 'Ingrese el Cuit/Cuil',
                                'required' => 'required',
                                'autofocus'=>'autofocus'
                            )
                        )

                    !!}
            </div>

            <div class="form-group">
                <label for="name">Estado</label>

                {!!
                    Form::number(
                        'state',
                        null,
                        array(
                            'class'=>'form-control',
                            'placeholder'=> 'Seleccione un numero',
                            'required' => 'required',
                            'autofocus'=>'autofocus'
                        )
                    )

                !!}
        </div>

        <div class="form-group">
            <label for="name">Fecha de inicio</label>

            {!!
                Form::date(
                    'startDate',
                    \Carbon\Carbon::now()
            )

            !!}
            </div>

            <div class="form-group">
                {!!Form::submit('Actualizar',array('class'=>'btn btn-primary'))!!}
            <a href="{{route('admin.project.index')}}" class="btn btn-warning">Cancelar</a>

            </div>
            {!!Form::close()!!}
        
        </div>    
        
        </div>    
            
        
</div>

@stop