@extends('adm.dashboard')

@section('body')
<div class="container" id="container-fluid">
    <div class="row">
        <div class="col s12">
            <form method="POST"  enctype="multipart/form-data" action="{{ route('privadanivel.update',$nivel->id) }}" >
                {{ csrf_field() }}
                {{ method_field('PUT')}}
                <div class="row">
                    <h5>Editar</h5>

                    <div class="row">
                        <div class="input-field col s6">
                            <input id="first_name" type="text" class="validate" name="nombre" value="{{ $nivel->nombre }}">
                            <label for="first_name">Nombre</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="last_name" type="text" class="validate" name="orden" value="{{ $nivel->orden }}">
                            <label for="last_name">Orden</label>
                        </div>
                    </div>
                    <div class="right">
                        <a href="{{ route('privadanivel.index') }}" class="waves-effect waves-light btn btn-color">Cancelar</a>
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
