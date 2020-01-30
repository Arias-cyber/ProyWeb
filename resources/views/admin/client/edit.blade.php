@extends('admin.template')

@section('content')

<div class="container-fluit">
        <div class="page-header">
                <h1>
                    <i class="fa fa-shopping-cart"></i>
                    CLIENTES <small> Editar Cliente <small>
                </h1>
        
            </div>
        <div class="row-center">
        <div class="col-md-offset-3 col-md-6">
            <div class="page">

                @if (count($errors)>0)
                    @include('admin.partials.errors')
                    
                @endif

                {!! Form::model($client, ['route' => ['admin.client.update', $client]]) !!}

                    <input type="hidden" name="_method" value="PUT"> <!-- Simulo una peticion-->

                <div class="form-group">
                    <label for="name">Nombre</label>

                    {!!
                        Form::text(
                            'name',
                            null,
                            array(
                                'class'=>'form-control',
                                'placeholder'=> 'Ingrese el Nombre',
                                'autofocus'=>'autofocus'
                            )
                        )

                    !!}
                </div>
            </div>
    
            <div class="form-group">
                    <label for="name">Cuit/Cuil</label>

                    {!!
                        Form::text(
                            'cuit',
                            null,
                            array(
                                'class'=>'form-control',
                                'placeholder'=> 'Ingrese el Cuit/Cuil',
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
                            'autofocus'=>'autofocus'
                        )
                    )

                !!}
        </div>

            <div class="form-group">
                {!!Form::submit('Actualizar',array('class'=>'btn btn-primary'))!!}
            <a href="{{route('admin.client.index')}}" class="btn btn-warning">Cancelar</a>

            </div>
            {!!Form::close()!!}
        
        </div>    
        
        </div>    
            
        
</div>

@stop