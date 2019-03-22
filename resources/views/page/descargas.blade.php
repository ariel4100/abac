@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt30 mb10">
        <div class="col l4 m4 s12 right-border-download">
            <div class="img-wrapper flex-column-center">
                <img src="{{asset('img/contenido/'.$headerLogos[0]->image)}}" class="responsive-img" alt="">
                <img src="{{asset('img/contenido/'.$headerLogos[1]->image)}}" class="responsive-img" alt="">
            </div>
        </div>
        <div class="col l4 m4 s12 right-border-download">
            <div class="img-wrapper flex-column-center" style="margin-top:-10px; max-height:138px">
                <img src="{{asset('img/contenido/'.$headerLogos[2]->image)}}" class="responsive-img" alt="">
            </div>
        </div>
        <div class="col l4 m4 s12 " style="height:100%;">
            <div class="img-wrapper flex-column-center imagensilla">
                <img src="{{asset('img/contenido/'.$headerLogos[3]->image)}}" class="responsive-img" alt="">
            </div>
        </div>
    </div>
    <div class="three-download-logo-separator mb50"></div>
    <div class="row mb30">
        <h4 class="rederino mb20">{{ __('Catalogs') }}</h4>
        @foreach($catalogos as $cat)
        <div class="col l3 mb20" style="margin-left:-10px; margin-right:10px;">
            <div class="descarga flex-column-center" style="border:1px #9a9a9a solid">
                <img src="{{asset('img/contenido/'.$cat->image)}}" alt="{{ $cat->{'title_'.App::getLocale()} }}" class="responsive-img">
            </div>
            <p class="mt10 mb10" style="color:#666666;">
                {{ $cat->{'title_'.App::getLocale()} }}
            </p>
            <div class="light-separator"></div>
            <div class="download-actions">
                <div class="download-cta">
                    <a href="{{ route('downloadFile', ['file' => $cat->ficha]) }}" style="color:white">
                        <i class="material-icons">file_download</i>
                    </a>
                </div>
                <div class="download-see">
                    <a href="{{asset('files/contenido/'.$cat->ficha)}}" style="color:white" target="_blank">
                        <i class="material-icons">remove_red_eye</i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row mb30">
        <h4 class="rederino mb20">{{ __('Assembly / Maintenance instructions') }}</h4>
        @foreach($mm as $m)
        <div class="col l3 mb20" style="margin-left:-10px; margin-right:10px;">
            <div class="descarga flex-column-center" style="border:1px #9a9a9a solid">
                <img src="{{asset('img/contenido/'.$m->image)}}" alt="{{ $m->{'title_'.App::getLocale()} }}" class="responsive-img">
            </div>
            <p class="mt10 mb10" style="color:#666666;">
                {{ $m->{'title_'.App::getLocale()} }}
            </p>
            <div class="light-separator"></div>
            <div class="download-actions">
                <div class="download-cta">
                    <a href="{{ route('downloadFile', ['file' => $m->ficha]) }}" style="color:white">
                        <i class="material-icons">file_download</i>
                    </a>
                </div>
                <div class="download-see">
                    <a href="{{asset('files/contenido/'.$m->ficha)}}" style="color:white" target="_blank">
                        <i class="material-icons">remove_red_eye</i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
