@extends('layouts.app')

@section('content')
<div class="container"  >
    <div class="" >
        <form method="POST" action="{{ route('register') }}">
            @include('page.partials.title', ['title' =>  __('Sign up') ])
            @csrf
            <div class="row">
                <div class="col s12">
                    <div class="row">
                        <div class="input-field col l6 s12">
                            <input id="first_name" type="text" class="validate" name="username" required>
                            <label for="first_name">Nombre de Usuario</label>
                        </div>
                        <div class="input-field col l6 s12">
                            <input id="email" type="email" class="validate" name="email" required>
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col l6 s12">
                            <input id="password" type="password" class="validate" name="password" required>
                            <label for="password">Contraseña</label>
                        </div>
                        <div class="input-field col l6 s12">
                            <input id="Empresa" type="text" class="validate" name="empresa" required>
                            <label for="Empresa">Empresa</label>
                        </div>
                        <div class="input-field col l6 s12">
                            <input id="Cargo" type="text" class="validate" name="cargo" required>
                            <label for="Cargo">Cargo</label>
                        </div>
                        <div class="input-field col l6 s12">
                            <input id="Localidad" type="text" class="validate" name="localidad" required>
                            <label for="Localidad">Dirección y Localidad</label>
                        </div>
                        <div class="input-field col l6 s12">
                            <input id="Provincia" type="text" class="validate" name="provincia" required>
                            <label for="Provincia">Provincia / Estado</label>
                        </div>
                        <div class="input-field col l6 s12">
                            <input id="Pais" type="text" class="validate" name="pais" required>
                            <label for="Pais">Pais</label>
                        </div>
                        <div class="input-field col l6 s12">
                            <input id="Telefono" type="text" class="validate" name="telefono" required>
                            <label for="Telefono">Telefono</label>
                        </div>
                    </div>

                </div>
                <!--<div class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="first_name" type="text" class="validate" name="username" required>
                            <label for="first_name">Nombre de Usuario</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="email" type="email" class="validate" name="email" required>
                            <label for="email">Email</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate" name="password" required>
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="text" type="text" class="validate" name="empresa" required>
                            <label for="text">Empresa</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="Cargo" type="text" class="validate" name="cargo" required>
                            <label for="Cargo">Cargo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="Direccion" type="text" class="validate" name="localidad" required>
                            <label for="Direccion">Direccion y Localidad</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="Provincia" type="text" class="validate" name="provincia" required>
                            <label for="Provincia">Provincia / Estado</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="Pais" type="text" class="validate" name="pais" required>
                            <label for="Pais">Pais</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="Telefono" type="text" class="validate" name="telefono" required>
                            <label for="Telefono">Telefono</label>
                        </div>
                    </div>
                </div>--->
            </div>

            <button class="btn waves-effect waves-light" type="submit" name="action" style="background-color: #E1131B;">{{ __('Sign up') }}
                <i class="material-icons right">send</i>
            </button>
            <div class="black-text" style="margin-top: 20px; margin-bottom: 20px">
                <a href="{{ route('login') }}" class="black-text">{{ __('Login') }}</a> | <a href=" " class="black-text">¿{{ __('Have you forgotten your password') }}?</a>
            </div>
        </form>
    </div>
</div>
@endsection
