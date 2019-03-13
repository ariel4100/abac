@extends('adm.dashboard')

@section('body')
<main>
    <div class="container mb30">
            <div class="row mb50">
                <div class="col s12">
                    {!!Form::open(['route'=>'producto.store', 'method'=>'POST', 'files' => true])!!}
                    <div class="row">
                        <div class="file-field input-field col s5">
                            <div class="btn">
                                <span>Imagen</span>
                                {!! Form::file('image') !!}
                            </div>
                            <div class="file-path-wrapper">
                                {!! Form::text('', null, ['class'=>'file-path validate']) !!}
                            </div>
                        </div>
                        <div class="file-field input-field col s5">
                            <div class="btn">
                                <span>Ficha tecnica</span>
                                {!! Form::file('ficha') !!}
                            </div>
                            <div class="file-path-wrapper">
                                {!! Form::text('', null, ['class'=>'file-path validate']) !!}
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
                        <label class="col s12" for="texto_es">Especificaciones Español</label>
                        <div class="input-field col s12">
                            {!!Form::textarea('especificaciones_es',null,['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
                        </div>
                    </div>
                    <div class="row">
                        <label class="col s12" for="texto_en">Especificaciones Ingles</label>
                        <div class="input-field col s12">
                            {!!Form::textarea('especificaciones_en',null,['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
                        </div>
                    </div>
                    Ingresar la siguiente parte de la ruta: https://www.youtube.com/watch?v=<span class="bold">dQw4w9WgXcQ</span> (opcional)
                    <div class="row">
                        <div class="input-field col s6">
                            {!!Form::label('Ruta del video')!!}
                            {!!Form::text('video_url',null,['class'=>'validate'])!!}
                        </div>
                        <p style="display:flex; justify-content:center; align-items:center;" class="col s6">
                            <label>
                              <input type="checkbox" name="destacado" />
                              <span>Producto destacado?</span>
                            </label>
                          </p>
                    </div>

                    <div class="input-field col s12">
                            <select name="familia_id" id="familia">
                                <option value="" disabled selected>Elija una familia</option>
                                @foreach($familias as $f)
                                    <option value="{{$f->id}}">{{$f->title_es}}</option>
                                @endforeach
                            </select>
                            <label>Familia de producto</label>
                      </div>

                      @push('scripts')
                    <script>
                        M.FormSelect.init(document.querySelector('#familia'));
                    </script>
                      @endpush

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
        CKEDITOR.replace('especificaciones_es');
        CKEDITOR.replace('especificaciones_en');
        CKEDITOR.config.width = '100%';
    </script>
@endsection
