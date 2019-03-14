@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 50px">
        @include('templates.error')

        @if(Auth::check())
            @include('page.partials.title', ['title' =>  __('Certificado de Materia Prima') ])
            <example-component></example-component>

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
@push('scripts')

@endpush