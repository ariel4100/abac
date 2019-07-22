@extends('adm.dashboard')

@section('body')
<div class="container" id="container-fluid">
    <div class="row">
        <div class="col s12">


            <form method="POST"  enctype="multipart/form-data" action="{{action('adm\MetadatoController@update', $metadato->id)}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
                {{ csrf_field() }}
                {{ method_field('PUT')}}

                <div class="row">
                    <h5>Editar</h5>
                    <div class="divider"></div>

                    <div class="input-field col s6">
                        <i class="material-icons prefix">keyboard_arrow_right</i>
                        <input id="icon_prefix" type="text" class="validate" name="seccion"  readonly value="{{$metadato->seccion}}" >
                        <label for="icon_prefix">Sección</label>
                    </div>

                    <div class="input-field col s6">
                        <i class="material-icons prefix">keyboard_arrow_right</i>
                        <input id="icon_prefix" type="text" class="validate" name="keyword"   value="{{$metadato->keyword}}" >
                        <label for="icon_prefix">Keyword</label>
                    </div>


                    <div class="input-field col s12">
                        <i class="material-icons prefix">keyboard_arrow_right</i>
                        <input id="icon_prefix" type="text" class="validate" name="url"  readonly value="{{$metadato->url}}" >
                        <label for="icon_prefix">Ubicación</label>
                    </div>


                    <div class="col s12">
                        <h6 for="textarea1">Descripción</h6>
                    </div>
                    <div class="input-field col s12">

                        <textarea id="descripcion" name="descripcion"> {{ $metadato->descripcion }} </textarea>
                    </div>

                    <div class="right">
                        <a href="{{ action('adm\MetadatoController@index') }}" class="waves-effect waves-light btn btn-color">Cancelar</a>
                        <button class="btn waves-effect waves-light btn-color" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('descripcion');

        CKEDITOR.config.height = '150px';

        CKEDITOR.config.width = '100%';


    </script>
@endpush