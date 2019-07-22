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

                        <div class="input-field col s12">
                            {!!Form::label('Orden')!!}
                            {!!Form::text('order',null,['class'=>'validate'])!!}
                        </div>
                        <div class="file-field input-field col s6">
                            <div class="btn">
                                <span>Imagen Es</span>
                                {!! Form::file('image') !!}
                            </div>
                            <div class="file-path-wrapper">
                                {!! Form::text('', $contenido->image, ['class'=>'file-path validate']) !!}
                            </div>
                        </div>
                        @if($contenido->section == 'calidad' && $contenido->type == 'imagen')
                        <div class="file-field input-field col s6">
                            <div class="btn">
                                <span>Imagen En</span>
                                {!! Form::file('icon') !!}
                            </div>
                            <div class="file-path-wrapper">
                                {!! Form::text('', $contenido->icon, ['class'=>'file-path validate']) !!}
                            </div>
                        </div>
                        @endif
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
                        {!!Form::submit('Guardar', ['class'=>'waves-effect waves-light btn right'])!!}
                    </div>
                {!!Form::close()!!} 
                </div>
            </div>
    </div>
</main>
@endsection