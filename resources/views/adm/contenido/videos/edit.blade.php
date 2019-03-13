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
                    Ingresar la siguiente parte de la ruta: https://www.youtube.com/watch?v=<span class="bold">dQw4w9WgXcQ</span>
                    <div class="row">
                        <div class="input-field col s8">
                            {!!Form::label('Ruta')!!}
                            {!!Form::text('ruta',null,['class'=>'validate'])!!}
                        </div>
                        <div class="input-field col s4">
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
                    <div class="row">
                        <div class="input-field col s6">
                            {!!Form::label('Caption Español')!!}
                            {!!Form::text('text_es',null,['class'=>'validate'])!!}
                        </div>
                        <div class="input-field col s6">
                            {!!Form::label('Caption Ingles')!!}
                            {!!Form::text('text_en',null,['class'=>'validate'])!!}
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
