@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 50px">
        @include('templates.error')

        @if(Auth::check())
            @include('page.partials.title', ['title' =>  __('Materiales para Distribuidores') ])
            <div class="row" style="margin-top: 10%; margin-bottom: 10%;">
                <div class="col l3 mb20" style="margin-left:-10px; margin-right:10px;">
                    <div class="descarga flex-column-center" style="border:1px #9a9a9a solid">
                        <img src=" " class="responsive-img">
                    </div>
                    <p class="mt10 mb10" style="color:#666666;">

                    </p>
                    <div class="light-separator"></div>
                    <div class="download-actions">
                        <div class="download-cta">
                            <a href=" " style="color:white">
                                <i class="material-icons">file_download</i>
                            </a>
                        </div>
                        <div class="download-see">
                            <a href=" " style="color:white" target="_blank">
                                <i class="material-icons">remove_red_eye</i>
                            </a>
                        </div>
                    </div>
                </div>
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
