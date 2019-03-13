@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 50px">
        @include('templates.error')

        @if(Auth::check())

            <ul class="tabs tabs-fixed-width tab-demo z-depth-1" style="border-bottom: 3px solid red">
                <li class="tab"><a href="#test1">Certificado de calidad</a></li>
                <li class="tab"><a class="active" href="#test2">Test 2</a></li>
                <li class="tab"><a href="#test3">Test 4</a></li>
            </ul>
            <div id="test1" class="col s12">

            </div>
            <div id="test2" class="col s12">

            </div>
            <div id="test3" class="col s12">

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
