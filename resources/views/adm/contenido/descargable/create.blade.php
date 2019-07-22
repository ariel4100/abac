@extends('adm.dashboard')

@push('style')
    <style>
        .select-dropdown li img {
            height: 50px;
            width: auto;

        }


    </style>
@endpush
@section('body')
<main>
    <div class="container mb30">
            <div class="row">
                <div class="col s12">
                    {!!Form::open(['route'=>'contenido.store', 'method'=>'POST', 'files' => true])!!}
                    <div class="row">
                        @if(!($section == 'calidad'))
                        <div class="file-field input-field col s6">
                            <div class="btn">
                                <span>Imagen</span>
                                {!! Form::file('image') !!}
                            </div>
                            <div class="file-path-wrapper">
                                {!! Form::text('', null, ['class'=>'file-path validate']) !!}
                            </div>
                        </div>
                        @endif
                            <div class="input-field col s6">
                                {!!Form::label('Orden')!!}
                                {!!Form::text('order',null,['class'=>'validate'])!!}
                            </div>
                        <div class="file-field input-field col s6">
                            <div class="btn">
                                <span>Ficha Es</span>
                                {!! Form::file('ficha') !!}
                            </div>
                            <div class="file-path-wrapper">
                                {!! Form::text('', null, ['class'=>'file-path validate']) !!}
                            </div>
                        </div>
                        @if($section == 'descargas_catalogos')
                            <div class="file-field input-field col s6">
                                <div class="btn">
                                    <span>Ficha En</span>
                                    {!! Form::file('subtitle_en') !!}
                                </div>
                                <div class="file-path-wrapper">
                                    {!! Form::text('', null, ['class'=>'file-path validate']) !!}
                                </div>
                            </div>
                        @endif

                    </div>
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
                    @if($section == 'descargas_catalogos' || $section == 'descargas_mm')
                    <div class="row">
                        <div class="input-field col s6">
                            {!!Form::label('Grupo Español')!!}
                            {!!Form::text('grupo_es',null,['class'=>'validate'])!!}
                        </div>
                        <div class="input-field col s6">
                            {!!Form::label('Grupo Ingles')!!}
                            {!!Form::text('grupo_en',null,['class'=>'validate'])!!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12  ">
                            <select class="icons" name="para">
                                <option value=""  disabled selected>Elegi una opcion</option>
                                @foreach($descarga as $d)
                                <option value="{{ $d->title_es  }}" data-icon="{{ asset('img/contenido/'.$d->image) }}" class="left">{{ $d->title_es }}</option>
                                @endforeach
                            </select>
                            <label>Selecciona una Seccion</label>
                        </div>

                    </div>
                    @endif
                    <div class="col s12 no-padding mt20">
                        {!!Form::submit('Guardar', ['class' => 'waves-effect waves-light btn right'])!!}
                    </div>
                {!!Form::close()!!} 
                </div>
            </div>
    </div>
</main>
@endsection
@push('scripts')
    <script>

        $(document).ready(function(){
            $('select').formSelect();

        });
    </script>
@endpush