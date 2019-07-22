@extends('adm.dashboard')

@section('body')
<main>
    <div class="container mb30">
            <div class="row">
                <div class="col s12">
                    {!!Form::open(['route'=>'contenido.store', 'method'=>'POST', 'files' => true])!!}
                    @if($section == 'distribuidores')
                    <div class="row">
                        <div class="file-field input-field col s8">
                            <div class="btn">
                                <span>Imagen</span>
                                {!! Form::file('image') !!}
                            </div>
                            <div class="file-path-wrapper">
                                {!! Form::text('', null, ['class'=>'file-path validate']) !!}
                            </div>
                        </div>
                        <div class="input-field col s4">
                            {!!Form::label('Orden')!!}
                            {!!Form::text('order',null,['class'=>'validate'])!!}
                        </div>
                    </div>
                    @endif
                    <input type="hidden" name="type" value="{{$tipo}}">
                    <input type="hidden" name="section" value="{{$section}}">
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
                    
                    @if( $section == 'distribuidores' )
                    <div class="row">
                        <div class="col s6">
                            <select name="subtitle_es" class="select" id="pais">
                                <option value="" disabled selected required>Elija una opción</option>
                                <option value="arg">Argentina</option>
                                <option value="ww">Mundo</option>
                            </select>
                        </div>
                        <div class="col s6">
                            <select name="provincia" class="select" id="provincia">

                            </select>
                        </div>
                    </div>

                    @else
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
                    @endif
                    
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
                    @if($section != 'distribuidores')
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
                    @endif
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

@push('scripts')
<script>

    $(document).ready(function(){
        $('select').formSelect();
        window.provincia = ['Ciudad Autónoma de Buenos Aires (CABA)','Buenos Aires','Catamarca','Córdoba','Corrientes','Entre Ríos','Jujuy','Mendoza','La Rioja','Salta','San Juan','San Luis','Santa Fe','Santiago del Estero','Tucumán','Chaco','Chubut','Formosa','Misiones','Neuquén','La Pampa','Río Negro','Santa Cruz','Tierra del Fuego'];
        $("#pais").on("change", function () {
            if ($(this).val() == 'arg')
            {
                html = "";
                window.provincia.forEach(function (e) {
                    html += `<option>${e}</option>`;
                });
                $("#provincia").html(html);
                $('select').formSelect();
            }else{
                html = "";
                $("#provincia").hide(html);
                $('select').formSelect();
            }
        })

    });
</script>
@endpush