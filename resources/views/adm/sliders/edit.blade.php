@extends('adm.dashboard')

@section('body')
<main>
    
    <div class="container mt20 mb30">
            <div class="row mb10">
                <a href="{{route('slider.show', ['seccion' => $slider->section])}}">
                        << Volver
                    </a>
                <div class="col s12">
                {!!Form::model($slider, ['route'=>['slider.update', $slider->id], 'method'=>'PUT', 'files' => true])!!}
                    <div class="row">
                        <div class="file-field input-field col s8">
                            <div class="btn">
                                <span>Imagen</span>
                                {!! Form::file('image') !!}
                            </div>
                            <div class="file-path-wrapper">
                                {!! Form::text('', $slider->image, ['class'=>'file-path validate']) !!}
                            </div>
                        </div>
                        <div class="input-field col s4">
                            {!!Form::label('Orden')!!}
                            {!!Form::text('order',$slider->order,['class'=>'validate'])!!}
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
                    <div class="col s12 no-padding">
                        {!!Form::submit('Guardar', ['class'=>'waves-effect waves-light btn right'])!!}
                    </div>
                {!!Form::close()!!} 
                </div>
                </div>
            </div>
        </main>
@endsection