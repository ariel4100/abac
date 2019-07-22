@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 50px">
        @include('templates.error')
        @php

            $title = [
                'title1' => __('From the Quality Certificate of the ABAC product, extract the Lot number of each component from the Materials Traceability Chart, and enter it in the box. Click on the SEARCH button and you will get Lot numbers of the related Raw Materials.'),
                'title2' => __('Print the Certificate of Raw Materials'),
                'title3' => __('Print the Raw Material Traceability Record (optional).'),
                'partidat' => __('Raw Material Item'),
                'partida' => __('departure'),
                'componente' => __('component'),
                'descripcion' => __('description'),
                'ver' => __('Certificate of Raw Material'),
                'last' => __('Repeat these steps for all required components'),
                'error' => __('Number of component not found'),
                'title4' => __('Raw Material Traceability Record'),

            ];
            $input = [
                'input1' => __('Enter Component item'),
                'input2' => __('Enter Raw Material Item'),
                'boton1' => __('Search'),
                'boton2' => __('download')
            ];
        @endphp
        @if(Auth::check())
            @include('page.partials.title', ['title' =>  __('Certificate of Raw Material') ])
            <example-component :title="{{ json_encode($title) }}" :input="{{ json_encode($input) }}"></example-component>
        @else
        <!---no es.-->
            @include('page.partials.title', ['title' =>  __('Welcome to the Customer Area') ])
            <div class="row"  >
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

@endpush