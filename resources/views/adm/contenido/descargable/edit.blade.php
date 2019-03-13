@extends('adm.dashboard')

@section('body')
<main>
    <div class="container mb30">
        <p>
            <a href="{{route('contenido.index', ['seccion' => $contenido->section, 'tipo' => $contenido->type])}}"><< Volver</a>
        </p>
        <div class="row">
            <div class="col s12">
                {!!Form::model($contenido, ['route'=>['contenido.update', $contenido->id], 'method'=>'PUT', 'files' => true])!!}
                    <div class="row">
                        @if(!($contenido->section == 'calidad'))
                        <div class="file-field input-field col s5">
                            <div class="btn">
                                <span>Imagen</span>
                                {!! Form::file('image') !!}
                            </div>
                            <div class="file-path-wrapper">
                                {!! Form::text('', $contenido->image, ['class'=>'file-path validate']) !!}
                            </div>
                        </div>
                        @endif
                        <div class="file-field input-field col s5">
                            <div class="btn">
                                <span>Ficha</span>
                                {!! Form::file('ficha') !!}
                            </div>
                            <div class="file-path-wrapper">
                                {!! Form::text('', $contenido->ficha, ['class'=>'file-path validate']) !!}
                            </div>
                        </div>
                        <div class="input-field col s2">
                            {!!Form::label('Orden')!!}
                            {!!Form::text('order',null,['class'=>'validate'])!!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            {!!Form::label('Titulo Español')!!}
                            {!!Form::text('title_es',null,['class'=>'validate'])!!}
                        </div>
                        <div class="input-field col s6">
                            {!!Form::label('Titulo Ingles')!!}
                            {!!Form::text('title_en',null,['class'=>'validate'])!!}
                        </div>
                    </div>
                    
                    <div class="col s12 no-padding">
                        {!!Form::submit('Guardar', ['class' => 'waves-effect waves-light btn right'])!!}
                    </div>
                {!!Form::close()!!} 
            </div>
        </div>
    </div>
</main>
@endsection