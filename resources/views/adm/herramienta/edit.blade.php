@extends('adm.dashboard')

@section('body')
<div class="container" id="container-fluid">
    <div class="row">
        <div class="col s12">
            <form method="POST"  enctype="multipart/form-data" action="{{ route('calculo.update',$calculo->id) }}" >
                {{ csrf_field() }}
                {{ method_field('PUT')}}
                <div class="row">
                    <h5>Editar</h5>

                    <div class="row">
                        <div class="input-field col s6">
                            <input id="first_name" type="text" class="validate" name="peso" value="{{ $calculo->peso }}">
                            <label for="first_name">Nombre del Peso Español</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="first_name" type="text" class="validate" name="peso_en" value="{{ $calculo->peso_en }}">
                            <label for="first_name">Nombre del Peso Ingles</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="last_name" type="text" class="validate" name="valor" value="{{ $calculo->valor }}">
                            <label for="last_name">Valor</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="disabled" type="text" name="orden" class="validate" value="{{ $calculo->orden }}">
                            <label for="disabled">Orden</label>
                        </div>
                    </div>
                    <div class="row">

                        <div class="input-field col s6">
                            <p>
                                <label style="margin-right: 30px">
                                    <input name="tipo" type="radio" checked value="gas" {{ $calculo->tipo == 'gas' ? 'checked': '' }}/>
                                    <span>Gas</span>
                                </label>
                                <label>
                                    <input name="tipo" type="radio" value="liquido" {{ $calculo->tipo == 'liquido' ? 'checked': '' }}/>
                                    <span>Liquido</span>
                                </label>
                            </p>
                        </div>
                    </div>
                    <div class="right">
                        <a href="{{ route('calculo.index') }}" class="waves-effect waves-light btn btn-color">Cancelar</a>
                        <button class="btn waves-effect waves-light btn-color" type="submit" name="action">Editar
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