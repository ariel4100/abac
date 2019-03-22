@extends('layouts.app')
@section('content')
<div class="container">
    @include('page.partials.title', ['title' => __('Quality')])
</div>
<div class="flex-column-center">
    <img src="{{asset('img/contenido/'.$imagenes[0]->image)}}" class="responsive-img" alt="Calidad">
</div>
<div class="container">
    <div class="row mb50">
        <div class="col l6 s12" style="color: #999999;">{!! $texto->{'text_'.App::getLocale()} !!}</div>
        <div class="col l6 s12">
            <h5 class="fw6 rederino oblique">
                {{ $texto->{'title_'.App::getLocale()} }}
            </h5>
            <div class="flex mt20">
                <div style="margin-left:70px;">
                    <img src="{{asset('img/contenido/'.$imagenes[1]->image)}}" class="responsive-img" style="margin-right:20px; margin-left:10px">
                    <img src="{{asset('img/contenido/'.$imagenes[2]->image)}}" class="responsive-img">
                </div>
            </div>
        </div>
    </div>
    <div class="row mb50">
        @foreach($certificados as $c)
        <div class="col l6 m6 s12">
            <div class="calidad-ficha">
                <div class="calidad-content">
                    <div class="calidad-text">
                        <a href="{{asset('files/contenido/'.$c->ficha)}}" target="_blank" style="display:flex; flex-direction:column">
                            <p class="mb0 mt0 grayerino">{{ $c->{'title_'.App::getLocale()} }}</p>
                            <p class="mt0 mb0 grayerino">{{ __('See Certificate') }}</p>
                        </a>
                    </div>
                    <div class="calidad-go">
                        <a class="grayerino" href="{{asset('files/contenido/'.$c->ficha)}}" target="_blank" style="display:flex; flex-direction:column">
                            <i class="material-icons">file_download</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection