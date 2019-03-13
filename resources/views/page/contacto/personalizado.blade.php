@extends('layouts.app')

@section('content')
<div class="container">
    <p class="">
        <a href="{{ route('contacto') }}" class="hoverino">
            < Regresar a Contacto
        </a>
    </p>

    @include('page.partials.title', ['title' => 'Contacto Personalizado'])

    <div class="row mb50">
        @foreach($personalizado as $p)
        <div class="col l4 m6 s12 mt30 mb10">
            <div class="row">
                <div class="col s5">
                    <img src="{{ asset('img/contenido/'.$p->image) }}" alt="{{ $p->{'title_'.App::getLocale()} }}">
                </div>
                <div class="col s7 personalized-paragraph" style="color:#4B4B4B;">
                    <h5 class="mt0" style="color:#4B4B4B;">{{ $p->{'title_'.App::getLocale()} }}</h5>
                    <h6 class="mt0" style="color:#E40A07;">{{ $p->{'subtitle_'.App::getLocale()} }}</h6>
                    {!! $p->{'text_'.App::getLocale()} !!}
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection