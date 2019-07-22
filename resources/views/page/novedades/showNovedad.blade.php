@extends('layouts.app')

@section('content')
<div class="container">
    <div class="breadcrumbsish mt10" class="categoriaa">
        <a href="{{route('novedades')}}" class="categoriaa">{{__('News')}}</a> |
        <a href="{{route('novedades.showCategory', $novedad->categoria->id)}}" class="categoriaa">{{$novedad->categoria->{'title_'.App::getLocale()} }}</a> | 
        <a href="{{route('novedades.showNovedad', $novedad->id)}}" class="categoriaa">
            {{$novedad->{'title_'.App::getLocale()} }}
        </a>
    </div>
    <div class="row mt30 mb70">
        <div class="col l10">
            <div style="display:flex; align-items:center;">
                <p class="uppercase mb0 parte2ytal">
                    <a href="{{route('novedades.showCategory', $novedad->categoria->id)}}" class="grayerino">
                        {{$novedad->categoria->{'title_'.App::getLocale()} }}
                    </a>
                </p>
                <div class="ya-saquenme-de-aqui" ></div>
            </div>
            <p class="center">
                <img src="{{asset('img/novedades/'.$novedad->image)}}" class="responsive-img">
            </p>
            <h5 class="rederino">{{$novedad->{'title_'.App::getLocale()} }}</h5>
            <p class="grayerino">{{ $novedad->created_at->diffForHumans() }}</p>
            <div class="grayerino">
                {!! $novedad->{'text_'.App::getLocale()} !!}
            </div>
        </div>
        <div class="col l2">
            <div class="flex-column">
                <p class="uppercase rederino mb0" style="margin-bottom:5px;">{{__('Categories')}}</p>
                <div class="separatorsillo mb20"></div>
                <a href="{{route('novedades')}}" class="categoriaa mb10">» {{__('All')}}</a>
                @foreach($categorias as $c)
                    <a href="{{route('novedades.showCategory', $c->id)}}" class="categoriaa">
                        » {{$c->{'title_'.App::getLocale()} }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection