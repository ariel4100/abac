@extends('layouts.app')

@section('content')
<div class="container">
    <div class="video-text mb20" style="display:flex;">
        @include('page.partials.title', ['title' => 'Videos'])
    </div>
    <div class="row">
        @foreach($videos as $v)
        <div class="col l4 m6 s12">
            <div class="card">
                <iframe class="responsive-video" src="https://www.youtube.com/embed/{{$v->ruta}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="video-content">
                    <h6 class="title fw6" style="color:#4b4b4b; height: 40px">
                        {{ $v->{'title_'.App::getLocale()} }}
                    </h6>
                    <p class="caption" style="height:80px; color:#4b4b4b;">
                        {{ $v->{'text_'.App::getLocale()} }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
