@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 50px">
        @include('templates.error')

        @if(Auth::user()->distribuidor == 'Exclusivo')
            @include('page.partials.title', ['title' =>  __('Materials for Distributors') ])
            <div class="row" style="margin-top: 10%; margin-bottom: 10%;">
                @foreach($dexclusivo as $d)
                    <div class="col l3 mb20" style="margin-left:-10px; margin-right:10px;">
                        <div class="descarga flex-column-center" style="border:1px #9a9a9a solid">
                            <img src="{{asset('img/descarga/'.$d->file_image)}}" class="responsive-img">
                        </div>
                        <p class="mt10 mb10" style="color:#666666;">
                            {{ $d->{'nombre_'.App::getLocale()} }}
                        </p>
                        <div class="light-separator"></div>
                        <div class="download-actions">
                            <div class="download-cta">
                                <a href="{{ route('downloadFiledistribuidores', ['file' => $d->file]) }}" style="color:white">
                                    <i class="material-icons">file_download</i>
                                </a>
                            </div>
                            <div class="download-see">
                                <a href="{{asset('files/descarga/'.$d->file)}}" style="color:white" target="_blank">
                                    <i class="material-icons">remove_red_eye</i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        @if(Auth::user()->distribuidor == 'No Exclusivo')
            @include('page.partials.title', ['title' =>  __('Materials for Distributors') ])
            <div class="row" style="margin-top: 10%; margin-bottom: 10%;">
                @foreach($dnoexclusivo as $d)
                    <div class="col l3 mb20" style="margin-left:-10px; margin-right:10px;">
                        <div class="descarga flex-column-center" style="border:1px #9a9a9a solid">
                            <img src="{{asset('img/descarga/'.$d->file_image)}}" class="responsive-img">
                        </div>
                        <p class="mt10 mb10" style="color:#666666;">
                            {{ $d->{'nombre_'.App::getLocale()} }}
                        </p>
                        <div class="light-separator"></div>
                        <div class="download-actions">
                            <div class="download-cta">
                                <a href="{{ route('downloadFiledistribuidores', ['file' => $d->file]) }}" style="color:white">
                                    <i class="material-icons">file_download</i>
                                </a>
                            </div>
                            <div class="download-see">
                                <a href="{{asset('files/descarga/'.$d->file)}}" style="color:white" target="_blank">
                                    <i class="material-icons">remove_red_eye</i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        @if(Auth::user()->distribuidor == 'Exterior')
            @include('page.partials.title', ['title' =>  __('Materials for Distributors') ])
            <div class="row" style="margin-top: 10%; margin-bottom: 10%;">
                @foreach($dexterior as $d)
                    <div class="col l3 mb20" style="margin-left:-10px; margin-right:10px;">
                        <div class="descarga flex-column-center" style="border:1px #9a9a9a solid">
                            <img src="{{asset('img/descarga/'.$d->file_image)}}" class="responsive-img">
                        </div>
                        <p class="mt10 mb10" style="color:#666666;">
                            {{ $d->{'nombre_'.App::getLocale()} }}
                        </p>
                        <div class="light-separator"></div>
                        <div class="download-actions">
                            <div class="download-cta">
                                <a href="{{ route('downloadFiledistribuidores', ['file' => $d->file]) }}" style="color:white">
                                    <i class="material-icons">file_download</i>
                                </a>
                            </div>
                            <div class="download-see">
                                <a href="{{asset('files/descarga/'.$d->file)}}" style="color:white" target="_blank">
                                    <i class="material-icons">remove_red_eye</i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
