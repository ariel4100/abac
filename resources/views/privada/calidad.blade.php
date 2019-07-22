@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 50px">
        @include('templates.error')
        @if (session('alert'))
            <div class="col s12 card-panel lighten-4 green-text text-darken-4"  style="padding: 1%; background-color: #f8d7da">
                {{ session('alert') }}
            </div>

        @endif
        @if(Auth::check())
            @include('page.partials.title', ['title' =>  __('Quality Certificates') ])

            <div class="row">
                <div class="col s12 show-on-small hide-on-large-only hide-on-med-and-down">
                    <img src="{{ asset('img/imghover.png') }}" class="responsive-img" alt="">
                </div>
                <div class="col s12">
                    <div class="flex" style="margin-top: 30px">
                        <div class="title">
                            <h5 class="rederino">{{ __('Request Certificate') }}</h5>
                        </div>
                    </div>
                    <p>{{ __('Complete as many boxes as numbers located on the product') }}.</p>
                    <p>{{ __('Once the request is made, the certificate will be sent as soon as possible to the contact email') }}.</p>
                </div>
                <form class="col m6 s12" action="{{  route('privada.solicitud.store') }}"  method="post" style="margin-bottom: 50px">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name" type="text" class="validate" name="numero0" required >
                            <label for="first_name">{{ __('Number engraved on the product') }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name1" type="text" class="validate" name="numero1" required>
                            <label for="first_name1">{{ __('Number engraved on the product') }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name2" type="text" class="validate" name="numero2" required>
                            <label for="first_name2">{{ __('Number engraved on the product') }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name3" type="text" class="validate" name="remito" required>
                            <label for="first_name3">{{ __('Delivery note number') }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name4" type="text" class="validate" name="social" required>
                            <label for="first_name4">{{ __('Business Name of the Client') }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" name="email" required>
                            <label for="email">{{ __('Contact email') }}</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit"  style="background-color: #E1131B;">{{ __('Request Certificate') }}
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
            @include('page.partials.title', ['title' =>  __('Welcome to the Customer Area') ])
        <!---no es.-->
            <div class="row" >
                <div class="col s12 m6 l4" style="margin-top: 25px">
                    <a href="{{ route('login') }}">
                        <div class="card" style="background-color: #E0E0E0;">
                            <div class="card-content white-text" style="height: 120px;">
                                <p style="font-size: 24px;font-style: oblique;color: #eb262d;">{{ __('Download Quality Certificates') }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s12 m6 l4" style="margin-top: 25px">
                    <a href="{{ route('login') }}">
                        <div class="card" style="background-color: #E0E0E0;">
                            <div class="card-content white-text" style="height: 120px;">
                                <p style="font-size: 24px;font-style: oblique;color: #eb262d;">{{ __('Download Certificates of Raw Material') }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s12 m6 l4" style="margin-top: 25px">
                    <a href="{{ route('login') }}">
                        <div class="card" style="background-color: #E0E0E0;">
                            <div class="card-content white-text" style="height: 120px;">
                                <p style="font-size: 24px;font-style: oblique;color: #eb262d;">{{ __('Distributors Area') }}</p>
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