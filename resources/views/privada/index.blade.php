@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 50px">
        @include('templates.error')

        @if(Auth::check())
            @include('page.partials.title', ['title' =>  __('Quality Certificates') ])

            <div class="row">
                <div class="col s12">
                    <div class="flex" style="margin-top: 30px">
                        <div class="title">
                            <h5 class="rederino">Solicitar Certificado</h5>
                        </div>
                    </div>
                    <p>Complete tantos casilleros como números ubique en el producto.</p>
                </div>
                <form class="col s6" style="margin-bottom: 50px">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name" type="text" class="validate">
                            <label for="first_name">Número grabado en el producto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name1" type="text" class="validate">
                            <label for="first_name1">Número grabado en el producto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name2" type="text" class="validate">
                            <label for="first_name2">Número grabado en el producto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name3" type="text" class="validate">
                            <label for="first_name3">Número de Remito</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name4" type="text" class="validate">
                            <label for="first_name4">Razon Social del Cliente</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action" style="background-color: #E1131B;">{{ __('CERTIFICATE REQUEST') }}
                    </button>
                </form>
            </div>

        @else
            @include('page.partials.title', ['title' =>  __('Bienvenido al Área de Clientes') ])
            <div class="row" style="margin-bottom: 50px">
                <div class="col s12 m6 l4" style="margin-top: 25px">
                    <a href="{{ route('login') }}">
                        <div class="card" style="background-color: #E0E0E0;">
                            <div class="card-content white-text" style="height: 120px;">
                                <p style="font-size: 24px;font-style: oblique;color: #eb262d;">Descargar Certificados de Calidad</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s12 m6 l4" style="margin-top: 25px">
                    <a href="{{ route('login') }}">
                        <div class="card" style="background-color: #E0E0E0;">
                            <div class="card-content white-text" style="height: 120px;">
                                <p style="font-size: 24px;font-style: oblique;color: #eb262d;">Descargar Certificados
                                    de Materia Prima</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s12 m6 l4" style="margin-top: 25px">
                    <a href="{{ route('login') }}">
                        <div class="card" style="background-color: #E0E0E0;">
                            <div class="card-content white-text" style="height: 120px;">
                                <p style="font-size: 24px;font-style: oblique;color: #eb262d;">Área de Distribuidores</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endif
    </div>
@endsection
