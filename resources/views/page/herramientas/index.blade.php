@extends('layouts.app')

@section('content')
<div class="container">
    @include('page.partials.title', ['title' => __('Tools') ])
    <div class="row mt50 mb70">
        @foreach($herramientas as $h)
        <div class="col l6 m6 s12 mb30">
            <div class="herramienta" 
            style="background:url({{ asset('img/contenido/'.$h->image) }}); background-repeat: no-repeat;
             background-color: #e1131b; background-blend-mode: multiply; background-position: center; border-bottom: 4px solid red;
            ">
                <h5 style="color:white">{{ $h->{'title_'.App::getLocale()} }}</h5>
                <div style="color:white !important">
                    {!! $h->{'text_'.App::getLocale()} !!}
                </div>
                <a class="waves-effect waves-light btn" href="{{ route($h->ruta) }}" style="background-color:#e1131b; margin-top: 30px">{{ __('login') }}</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection