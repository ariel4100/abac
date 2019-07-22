@extends('layouts.app')
@push('style')
    <style>
        .tabs .tab {
            height: auto !important;
        }
        .tabs .tab a:hover, .tabs .tab a.active {
            background-color: unset !important; ;
            color: unset !important;
        }
        .tabs .indicator {
            background-color: #eb252d !important;
        }

    </style>
@endpush
@section('content')
<div class="container">
    <ul class="tabs row " style="display: flex; height: auto; margin-bottom: 10px; margin-top: 30px; border-bottom: 1px solid #eaeaea">

        @foreach($headerLogos as $key=>$l )
        <li class="tab col l4 s12 right-border-download">
            <a class="active" href="#test_{{ $key+1 }}">
                <div class="img-wrapper flex-column-center">
                    <img src="{{asset('img/contenido/'.$l->image)}}" class="responsive-img" alt="">
                </div>
            </a>
        </li>
        @endforeach

    </ul>
    @foreach($headerLogos as $key=>$l )
    <div id="test_{{ $key+1 }}" class="col s12">
        @if(count($l->descargas))
        <div class="row mb30">
            @php($grupo = '')
            @php($descargas = collect($l->descargas ->toArray())->sortBy('grupo_es'))
            @foreach($descargas as $cat)
                @if($cat['grupo_es'] != $grupo)
                    <div class="col l12"><h4 class="rederino mb20">{{ $cat['grupo_'.App::getLocale()] }}</h4></div>
                    @php($grupo = $cat['grupo_es'] )
                @endif
                <div class="col l3 mb20" style="margin-left:-10px; margin-right:10px;">
                    <div class="descarga flex-column-center" style="border:1px #9a9a9a solid; height: 370px">
                        <img src="{{asset('img/contenido/'.$cat['image'] )}}" alt="{{ $cat['title_'.App::getLocale()] }}" class="responsive-img">
                    </div>
                    <p class="mt10 mb10" style="color:#666666;">
                        {{ $cat['title_'.App::getLocale()] }}
                    </p>
                    <div class="light-separator"></div>
                    <div class="download-actions">

                        @if(App::getLocale() == 'es')
                        <div class="download-cta">
                            <a href="{{ route('downloadFile', ['file' => $cat['ficha'] ]) }}" style="color:white">
                                <i class="material-icons">file_download</i>
                            </a>
                        </div>
                        <div class="download-see">
                            <a href="{{asset('files/contenido/'.$cat['ficha'] )}}" style="color:white" target="_blank">
                                <i class="material-icons">remove_red_eye</i>
                            </a>
                        </div>
                        @else
                            <div class="download-cta">
                                <a href="{{ route('downloadFile', ['file' => $cat['subtitle_en'] ]) }}" style="color:white">
                                    <i class="material-icons">file_download</i>
                                </a>
                            </div>
                            <div class="download-see">
                                <a href="{{asset('files/contenido/'.$cat['subtitle_en'] )}}" style="color:white" target="_blank">
                                    <i class="material-icons">remove_red_eye</i>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        @endif
    </div>
    @endforeach


</div>
@endsection
