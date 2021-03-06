@extends('adm.dashboard')

@section('body')
<main>

    <div class="container mt20 mb30">
            <div class="row mb10">
                <a href="{{route('privada.principal')}}" class="right">
                        << Volver
                    </a>
                <form class="col s12" style="margin-top: 10px" method="POST" action="{{ route('privada.update', $user->id) }}">
                @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="input-field col s12">
                            <input  id="first_name" type="text" class="validate" name="name" value="{{ $user->name }}">
                            <label for="first_name">Nombre</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input  id="first_name1" type="text" class="validate" name="username" value="{{ $user->username }}">
                            <label for="first_name1">Nombre de Usuario</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" name="email" value="{{ $user->email }}">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m12">
                            <input id="password" type="password" class="validate" name="password"  >
                            <label for="password">Contraseña</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="Empresa" type="text" class="validate" name="empresa" value="{{ $user->empresa }}">
                            <label for="Empresa">Empresa</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="Cargo" type="text" class="validate" name="cargo" value="{{ $user->cargo }}">
                            <label for="Cargo">Cargo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="Localidad" type="text" class="validate" name="localidad" value="{{ $user->localidad }}">
                            <label for="Localidad">Dirección y Localidad</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="Provincia" type="text" class="validate" name="provincia" value="{{ $user->provincia }}">
                            <label for="Provincia">Provincia / Estado</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="Pais" type="text" class="validate" name="pais" value="{{ $user->pais }}">
                            <label for="Pais">Pais</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="Telefono" type="text" class="validate" name="telefono" value="{{ $user->telefono }}">
                            <label for="Telefono">Telefono</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m6">
                            <select name="nivel_id" >
                                <option value="" disabled selected>Seleccionar nivel</option>
                                @foreach($nivel as $n)
                                    <option value="{{ $n->id }}" {{ $n->id==$user->nivel_id ? 'selected': ''  }}>{{ $n->nombre }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="input-field col m6">

                            <i class="material-icons prefix">keyboard_arrow_right</i>

                            <select id="icon_prefix" class="select_all" name="distribuidor">
                                <option value=""selected>Ninguno</option>
                                @foreach($distribuidor as $c)
                                    <option value = "{{ $c }}" {{ $c == $user->distribuidor ? 'selected': '' }} >{{ $c }}</option>
                                @endforeach
                            </select>
                            <label for="icon_prefix">Seleccionar si es Nivel Distribuidor</label>
                        </div>

                        <div class="col s12 ">
                            <p>
                                <label class="right">
                                    <input type="checkbox" name="nivel" value="1" {{ $user->nivel == '1' ? 'checked' : '' }}/>
                                    <span>Doblador de tubos?</span>
                                </label>
                            </p>
                        </div>
                    </div>

                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </form>
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