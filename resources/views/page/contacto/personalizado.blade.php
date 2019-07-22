@extends('layouts.app')
@push('style')
    <style>
        p{
            line-height: 1.3rem !important;
        }
    </style>
@endpush
@section('content')
<div class="container">
    <p class="">
        <a href="{{ route('contacto') }}" class="hoverino">
            < {{__('Return to Contact')}}
        </a>
    </p>

    @include('page.partials.title', ['title' => __('Custom Contact')])

    <div class="row mb50">
        @foreach($personalizado as $p)
        <div class="col l4 m6 s12 mt30 mb10" style="height:140px">
            <div class="row">
                <div class="col s4">
                    <img src="{{ asset('img/contenido/'.$p->image) }}" alt="{{ $p->{'title_'.App::getLocale()} }}" class="responsive-img">
                </div>
                <div class="col s8 personalized-paragraph" style="color:#4B4B4B; padding-right: 1px">
                    <h5 class="mt0" style="color:#4B4B4B; margin-bottom: 0.2rem !important; line-height: 1.4rem !important;">{{ $p->{'title_'.App::getLocale()} }}</h5>
                    <h6 class="mt0" style="color:#E40A07; font-size: 1rem !important;">{{ $p->{'subtitle_'.App::getLocale()} }}</h6>
                    {!! $p->{'text_'.App::getLocale()} !!}
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection