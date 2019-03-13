@extends('adm.dashboard')

@section('body')
<main>
    <div class="container mb30">
        <p>
            <a href="{{route('logo.index')}}"><< Volver</a>
        </p>
            <div class="row">
                <div class="col s12">
                {!!Form::model($logo, ['route'=>['logo.update', $logo->id], 'method'=>'PUT', 'files' => true])!!}
                    <div class="row">
                        <div class="file-field input-field col s8">
                            <div class="btn">
                                <span>Imagen</span>
                                {!! Form::file('image') !!}
                            </div>
                            <div class="file-path-wrapper">
                                {!! Form::text('', $logo->image, ['class'=>'file-path validate']) !!}
                            </div>
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
        CKEDITOR.replace('text');
        CKEDITOR.config.width = '100%';
    </script>
@endsection