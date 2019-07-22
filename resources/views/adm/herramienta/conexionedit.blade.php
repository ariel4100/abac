@extends('adm.dashboard')

@section('body')
<div class="container" id="container-fluid">
    <div class="row">
        <div class="col s12">
            <form method="POST"  enctype="multipart/form-data" action="{{ route('conexion.update',$conexion->id) }}" >
                {{ csrf_field() }}
                {{ method_field('PUT')}}
                <div class="row">
                    <h5>Editar</h5>

                    <div class="row">
                        @if(isset($conexion->diametro))
                        <div class="input-field col s6">
                            <input id="Diametro" type="text" class="validate" name="diametro" value="{{ $conexion->diametro }}">
                            <label for="Diametro">Diametro</label>
                        </div>
                        @endif
                        @if(isset($conexion->tipo))
                        <div class="input-field col s6">
                            <input id="tipo" type="text" class="validate" name="tipo" value="{{ $conexion->tipo }}">
                            <label for="tipo">Tipo</label>
                        </div>
                        @endif
                            <div class="input-field col s6">
                                <input id="Orden" type="text" name="orden" class="validate" value="{{ $conexion->orden }}">
                                <label for="Orden">Orden</label>
                            </div>
                    </div>
                    <!--<div class="row">

                        <div class="input-field col s6">
                            <p>
                                <label style="margin-right: 30px">
                                    <input name="conexion" type="radio" checked value="entrada" />
                                    <span>Entrada</span>
                                </label>
                                <label>
                                    <input name="tipo" type="radio" value="salida" />
                                    <span>Salida</span>
                                </label> 
                            </p>
                        </div>
                    </div>-->
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

<script>
    $(document).ready(function(){
        $('select').formSelect();
    });
</script>

@endpush