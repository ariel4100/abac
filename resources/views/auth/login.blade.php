@extends('layouts.app')

@section('content')
    <div class="container">
        @include('templates.error')
        @include('page.partials.title', ['title' =>  __('Login') ])
        <form action="{{ route('login') }}" method="POST" class="row mb50">
            @csrf
            <div class="row mt20">
                <div class="input-field col m6 s12">
                    <input id="username" name="username" type="text" class="validate" required>
                <label for="username">{{ __('Username') }}</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col m6 s12">
                    <input id="password" name="password" type="password" class="validate" required>
                    <label for="password">{{ __('Password') }}</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action" style="background-color: #E1131B;">{{ __('Login') }}
                <i class="material-icons right">send</i>
            </button>
        </form>
        <div class="black-text" style="margin-top: 20px; margin-bottom: 20px">
            <a href="{{ route('register') }}" class="black-text">{{ __('Sign in') }}</a> | <a href=" " class="black-text">¿{{ __('Have you forgotten your password') }}?</a>
        </div>
    </div>
    <!-- Modal Structure -->
    <div id="modal1" class="modal modal-fixed-footer">
        <form action="">
            <div class="modal-content">
                <h4>Regístrate en este sitio</h4>
                <div class="row">
                    <div class="col s12">
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
                                <input id="text" type="text" class="validate" name="cargo" required>
                                <label for="text">Cargo</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="text" type="text" class="validate" name="localidad" required>
                                <label for="text">Direccion y Localidad</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="text" type="text" class="validate" name="provincia" required>
                                <label for="text">Provincia / Estado</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="text" type="text" class="validate" name="pais" required>
                                <label for="text">Pais</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="text" type="text" class="validate" name="telefono" required>
                                <label for="text">Telefono</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit" name="action" style="background-color: #E1131B;">{{ __('Login') }}
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>
@endsection
