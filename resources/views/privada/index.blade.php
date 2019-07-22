@extends('layouts.app')

@section('content')
    @if(Auth::check())
    <div class="container" style="margin-top: 50px" >
        @include('templates.error')
        @if (session('alert'))
            <div class="col s12 card-panel lighten-4 green-text text-darken-4"  style="padding: 1%; background-color: #f8d7da">
                {{ session('alert') }}
            </div>
        @endif

            @include('page.partials.title', ['title' =>  __('Quality Certificates') ])

            <div class="row">
                <div class="col s12 show-on-small hide-on-large-only hide-on-med-and-down">
                    <img src="{{ asset('img/imghover.png') }}" class="responsive-img" alt="">
                </div>
                <div class="col s12">
                    <div class="flex" style="margin-top: 30px">
                        <div class="title">
                            <h5 class="rederino">{{ __('Automatic query') }}</h5>
                        </div>
                    </div>
                    <p style="color: #666666;">{{ __('Enter the 5-digit number recorded in the body of the Product') }}.</p>
                </div>
                <form class="col m6 s12" action="{{  route('privada.calidad.store') }}"  method="post" style="margin-bottom: 50px">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name" type="number" class="validate" name="numero0">
                            <label for="first_name">{{ __('Number engraved on the product') }}</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit"  style="background-color: #E1131B;">{{ __('Request Certificate') }}
                    </button>
                    <p class="mt50 mb50" style="color: #666666;">{{ __('If you have a problem finding the engraved number,') }} <a href="{{  route('privada.calidad') }}" style="color: #000;"><b>{{ __('Click Here') }}</b></a>.</p>
                </form>
                <div class="col m1 s12 hide-on-small-only">
                    <div id="hover"><img src="{{ asset('img/i.png') }}" alt=""></div>
                </div>
                <div class="col m5 s12 ">
                    <img src="{{ asset('img/imghover.png') }}" alt="" style="display: none">
                </div>
            </div>

    </div>
    @else
    <div class="container-fluid">
        <div class="row" style="background-color: #323032; padding-bottom: 50px">
            <div class="container">
                @include('page.partials.title', ['title' =>  __('Welcome to the Customer Area') ])
                <h6 class="mt30" style="color: white">{{ __('Access to the customer center allows the use of the following services:') }}</h6>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row"  >
            <div class="col s12 m6 l4" style="margin-top: 25px">
                <a href="{{ route('login') }}">
                    <div class="card" style="background-color: #E0E0E0;">
                        <div class="card-content white-text" style="height: 100px;">
                            <p class="center uppercase fuente" style="font-size: 24px;font-style: oblique;color: #eb262d; font-weight: 900">{{ __('Quality Certificates') }}</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col s12 m6 l4" style="margin-top: 25px">
                <a href="{{ route('login') }}">
                    <div class="card" style="background-color: #E0E0E0;">
                        <div class="card-content white-text" style="height: 100px;">
                            <p class="center uppercase fuente" style="font-size: 24px;font-style: oblique;color: #eb262d; font-weight: 900">{{ __('Certificate of Raw Material') }}</p>
                        </div>
                    </div>
                </a>
                <p  class="center" style="color: #000000; font-size: 12px"><b>{{ __('Service available for authorized users only') }}</b></p>
            </div>
            <div class="col s12 m6 l4" style="margin-top: 25px">
                <a href="{{ route('login') }}">
                    <div class="card" style="background-color: #E0E0E0;">
                        <div class="card-content white-text" style="height: 100px;">
                            <p class="center uppercase fuente" style="font-size: 24px;font-style: oblique;color: #eb262d; font-weight: 900">{{ __('Distributors Area') }}</p>
                        </div>
                    </div>
                </a>
                <p  class="center" style="color: #000000; font-size: 12px"><b>{{ __('Service available for authorized users only') }}</b></p>
            </div>
        </div>
    </div>
        @endif

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