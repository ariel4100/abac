@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 50px">
        @include('templates.error')

        @if(Auth::check())
            @include('page.partials.title', ['title' =>  __('Quality Certificates') ])

            <div class="row">
                <div class="col s12 show-on-small hide-on-large-only hide-on-med-and-down">
                    <img src="{{ asset('img/imghover.png') }}" class="responsive-img" alt="">
                </div>
                <div class="col s12">
                    <div class="flex" style="margin-top: 30px">
                        <div class="title">
                            <h5 class="rederino">Solicitar Certificado</h5>
                        </div>
                    </div>
                    <p>Complete tantos casilleros como números ubique en el producto.</p>
                </div>
                <form class="col m6 s12" action="{{  route('privada.calidad.store') }}"  method="post" style="margin-bottom: 50px">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name" type="text" class="validate" name="numero0">
                            <label for="first_name">Número grabado en el producto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name1" type="text" class="validate" name="numero1">
                            <label for="first_name1">Número grabado en el producto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name2" type="text" class="validate" name="numero2">
                            <label for="first_name2">Número grabado en el producto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name3" type="text" class="validate" name="remito">
                            <label for="first_name3">Número de Remito</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name4" type="text" class="validate" name="social">
                            <label for="first_name4">Razon Social del Cliente</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit"  style="background-color: #E1131B;">{{ __('CERTIFICATE REQUEST') }}
                    </button>
                </form>
                <div class="col m1 s12 hide-on-small-only">
                    <div id="hover"><img src="{{ asset('img/i.png') }}" alt=""></div>
                </div>
                <div class="col m5 s12 ">
                    <img src="{{ asset('img/imghover.png') }}" alt="" style="display: none">
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
@push('scripts')
    <script>
        $('#hover').mouseover(function () {
            $(this).closest(".row").find("> .col:last-child").find("img").show();
        }).mouseleave(function () {
            $(this).closest(".row").find("> .col:last-child").find("img").hide();
        });
    </script>
@endpush