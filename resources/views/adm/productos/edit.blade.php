@extends('adm.dashboard')
@push('style')
    <style>
        input[type=search]:not(.browser-default){
            background-color: transparent;
            border: none;
            border-bottom: 1px solid #9e9e9e;
            border-radius: 0;
            outline: none;
            height: 2.2rem;
            width: 100%;
            font-size: 16px;
            margin: 0 0 0px 0;
            padding: 0;
            -webkit-box-shadow: none;
            box-shadow: none;
            -webkit-box-sizing: content-box;
            box-sizing: content-box;
            -webkit-transition: border .3s, -webkit-box-shadow .3s;
            transition: border .3s, -webkit-box-shadow .3s;
            transition: box-shadow .3s, border .3s;
            transition: box-shadow .3s, border .3s, -webkit-box-shadow .3s;
        }

        .select2-container .select2-search--inline .select2-search__field {
            box-sizing: border-box;
            border: none;
            font-size: 100%;
            margin-top: 0px;
            padding: 0;
        }
    </style>
@endpush
@section('body')
<main>
    <div class="container mb30">
        <p>
            <a href="{{route('producto.show', $producto->familia->id)}}"><< Volver</a>
        </p>
            <div class="row mb50">
                <div class="col s12">
                    {!!Form::model($producto, ['route'=> ['producto.update', $producto->id], 'method'=>'PUT', 'files' => true])!!}
                    <div class="row">
                        <div class="file-field input-field col s6">
                            <div class="btn">
                                <span>Imagen</span>
                                {!! Form::file('image') !!}
                            </div>
                            <div class="file-path-wrapper">
                                {!! Form::text('', $producto->image, ['class'=>'file-path validate']) !!}
                            </div>
                        </div>
                        <div class="input-field col s6">
                            {!!Form::label('Orden')!!}
                            {!!Form::text('order',null,['class'=>'validate'])!!}
                        </div>
                        <div class="input-field col s12 m6">
                            <select name="montaje">
                                <option value=""  selected>Ninguno</option>
                                @foreach($montaje as $m)
                                    <option value="{{ $m->ficha }}" {{ $producto->montaje == $m->ficha ? 'selected' : '' }}>{{ $m->title_es }}</option>
                                @endforeach
                            </select>
                            <label>Selecciona una Instruccion de Montaje</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <select name="catalogo">
                                <option value=""  selected>Ninguno</option>
                                @foreach($catalogo as $c)
                                    <option value="{{ $c->ficha }}" {{ $producto->catalogo == $c->ficha ? 'selected' : '' }}>{{ $c->title_es }}</option>
                                @endforeach
                            </select>
                            <label>Selecciona un Catalogo</label>
                        </div>
                        <div class="file-field input-field col s6">
                            <div class="btn">
                                <span>Ficha de Producto Es</span>
                                {!! Form::file('ficha') !!}
                            </div>
                            <div class="file-path-wrapper">
                                {!! Form::text('', $producto->ficha, ['class'=>'file-path validate']) !!}
                            </div>
                        </div>
                        <div class="file-field input-field col s6">
                            <div class="btn">
                                <span>Ficha de Producto En</span>
                                {!! Form::file('ficha_variante') !!}
                            </div>
                            <div class="file-path-wrapper">
                                {!! Form::text('', $producto->ficha_variante, ['class'=>'file-path validate']) !!}
                            </div>
                        </div>
                        <div class="file-field input-field col s12 m6">
                            <div class="btn">
                                <span>Imagen Inf.Ordenar Es</span>
                                {!! Form::file('img') !!}
                            </div>
                            <div class="file-path-wrapper">
                                {!! Form::text('', $producto->img, ['class'=>'file-path validate']) !!}
                            </div>
                        </div>
                        <div class="file-field input-field col s12 m6">
                            <div class="btn">
                                <span>Imagen Inf.Ordenar En</span>
                                {!! Form::file('img_en') !!}
                            </div>
                            <div class="file-path-wrapper">
                                {!! Form::text('', $producto->img_en, ['class'=>'file-path validate']) !!}
                            </div>
                        </div>
                         <!--<div class="file-field input-field col s6">
                            <div class="btn">
                                <span>Ficha de Producto</span>

                            </div>
                            <div class="file-path-wrapper">

                            </div>
                        </div>-->
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
                    <div class="row">
                        <div class="input-field col s12">
                            {!!Form::label('Keywords')!!}
                            {!!Form::text('keyword',$producto->keyword,['class'=>'validate'])!!}
                            <span class="helper-text" data-error="wrong" data-success="right">Palabras separados por signo coma ( , )</span>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 10px; margin-top: 10px">
                        <div class="input-field col s6">
                            <select onchange="selectFamilia(this)" name="familia_id" id="familia">
                                @foreach($familias as $f)
                                    <option value="{{$f->id}}" >{{$f->title_es}}</option>
                                @endforeach
                            </select>
                            <label>Familia de producto</label>
                        </div>
                        <div class=" col s6">
                            <label>Productos Relacionados</label>
                            <select class="js-example-basic-multiple browser-default"  name="relacionados[]" multiple="multiple">
                                @foreach($productos as $key=>$f)
                                    <option value="{{$f->id}}" {{ in_array($f->id, $pr->toArray())?'selected':''}}>{{$f->title_es}}</option>
                                @endforeach
                            </select>
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
                              <input type="checkbox" name="destacado" @if($producto->destacado) checked @endif/>
                              <span>Producto destacado?</span>
                            </label>
                          </p>
                        <!---<p style=" " class="col s12">
                            <label>
                                <input type="checkbox" name="buscado" @if($producto->buscado) checked @endif/>
                                <span>Es Buscado?</span>
                            </label>
                        </p>--->
                    </div>

                    <div class="col s12 no-padding">
                        <button type="submit" class="waves-effect waves-light btn right">Guardar</button>

                    </div>
                {!!Form::close()!!}
                </div>
            </div>
    </div>
</main>

@endsection

@push('scripts')
    <script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.1/js/i18n/es.js"></script>
    <script>
        M.FormSelect.init(document.querySelector('#familia'));
        //window.productos = JSON.parse('{{ $pr }}');
        $(document).ready(function() {
            $('select').formSelect();
            $('.js-example-basic-multiple').select2({
                placeholder: 'Seleccionar producto',
                maximumSelectionLength: 3,
                language: "es"
            });


            selectFamilia = function(t) {
                var category_id = $(t).val();

                $.get('{{ url('/') }}/api/categoria/'+category_id+'/productos', function (data) {
                    //console.log(data);
                    $('#sepro').empty();
                    //$('#sepro').append('<option value="0" disable="true" selected="true">Seleccionar producto</option>');
                    for (i=0; i<data.length; i++){
                        $('#sepro').append('<option value="'+ data[i].id +'">'+ data[i].title_es +'</option>');
                    }
                    //buscas
                    $('#sepro').val(window.productos).trigger("change");
                });
            };
            $(function () {
                console.log('{{$producto->familia_id}}');
                $('#familia').val('{{$producto->familia_id}}').trigger("change");


            });
        });



        CKEDITOR.replace('text_es');
        CKEDITOR.replace('text_en');
        CKEDITOR.replace('especificaciones_es');
        CKEDITOR.replace('especificaciones_en');
        CKEDITOR.config.width = '100%';
    </script>
@endpush