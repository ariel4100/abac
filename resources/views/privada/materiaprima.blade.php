@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 50px">
        @include('templates.error')
        @php

            $title = [
                'title1' => __('The ABAC product quality certificate, the results of the Traceability of materials table, the starting number of each component and the entry into the cell. Press the SEARCH button and the starting numbers of the related raw materials.'),
                'title2' => __('Print the Certificate of Raw Materials'),
                'title3' => __('Print the Raw Material Traceability Record (optional).'),
                'partidat' => __('Raw Material Item'),
                'partida' => __('departure'),
                'componente' => __('component'),
                'descripcion' => __('description'),
                'ver' => __('See Certificate'),
                'last' => __('Repeat these steps for all required components'),

            ];
            $input = [
                'input1' => __('Enter Component item'),
                'input2' => __('Enter Raw Material Item'),
                'boton1' => __('Search'),
                'boton2' => __('Print')
            ];
        @endphp
        @if(Auth::check())
            @include('page.partials.title', ['title' =>  __('Certificate of Raw Material') ])
            <example-component :title="{{ json_encode($title) }}" :input="{{ json_encode($input) }}"></example-component>
        @else
            @include('page.partials.title', ['title' =>  __('Welcome to the Customer Area') ])
            <div class="row" style="margin-bottom: 50px">
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