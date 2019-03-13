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
                        <div class="file-field input-field col s8">
                            <div class="btn">
                                <span>Imagen</span>
                                {!! Form::file('image') !!}
                            </div>
                            <div class="file-path-wrapper">
                                {!! Form::text('', $contenido->image, ['class'=>'file-path validate']) !!}
                            </div>
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
                            {!!Form::label('Subtitulo Español')!!}
                            {!!Form::text('subtitle_es',null,['class'=>'validate'])!!}
                        </div>
                        <div class="input-field col s6">
                            {!!Form::label('Subtitulo Ingles')!!}
                            {!!Form::text('subtitle_en',null,['class'=>'validate'])!!}
                        </div>
                    </div>
                    <div class="row">
                        <label class="col s12" for="texto_es">Texto Español</label>
                        <div class="input-field col s12">
                            {!!Form::textarea('text_es',null,['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
                        </div>
                    </div>
                    <div class="row">
                        <label class="col s12" for="texto_en">Texto Ingles</label>
                        <div class="input-field col s12">
                            {!!Form::textarea('text_en',null,['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            {!!Form::label('Ruta')!!}
                            {!!Form::text('ruta',null,['class'=>'validate'])!!}
                        </div>
                        <div class="input-field col s6">
                            {!!Form::label('Icono')!!}
                            {!!Form::text('icon',null,['class'=>'validate'])!!}
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
    
    <script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('text_es');
        CKEDITOR.replace('text_en');
        CKEDITOR.config.width = '100%';
    </script>
@endsection