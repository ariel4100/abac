@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb40 mt30">
        @include('page.partials.title', ['title' => __('News')])
    </div>
    <div class="row">
        <div class="col l10">
            <div class="row mb30">
                @foreach($novedades as $n)
                <div class="col l6 mb20">
                    <div class="novedad-card" style="padding: 10px 40px; height: 550px">
                        <div class="row flex-column">
                            <div style="display:flex; justify-content:center; align-items:center">
                                <p class="center">
                                    <a href="{{route('novedades.showNovedad', $n->id)}}">
                                        <img src="{{asset('img/novedades/'.$n->image)}}" class="responsive-img" alt="">
                                    </a>
                                </p>
                            </div>
                            <div class="categoria-novedad">
                                <p class="uppercase mb0" style="width:30%; font-size:0.8rem">
                                    <a href="{{route('novedades.showCategory', $n->categoria->id)}}" class="grayerino">
                                        {{$n->categoria->{'title_'.App::getLocale()} }}
                                    </a>
                                </p>
                                <div style="width:80%; background-color:#B0B0B0; height:1px; margin-top:14px"></div>
                            </div>
                            <h6 class="mt20 mb0" style="color:#2B2B2B">
                                <a href="{{route('novedades.showNovedad', $n->id)}}" class="grayerino">
                                    {{ $n->{'title_'.App::getLocale()} }}
                                </a>
                            </h6>
                            <span style="margin-top:5px">{{ $n->created_at->diffForHumans() }}</span>
                            {!! str_limit($n->{'text_'.App::getLocale()}, 150) !!}
                            <p class="mt0">
                                <a href="{{route('novedades.showNovedad', $n->id)}}" class="rederino">
                                    » {{__('Read more')}}
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col l2">
            <div class="flex-column">
                <p class="uppercase rederino mb0" style="margin-bottom:5px;">{{__('Categories')}}</p>
                <div class="separatorsillo mb20"></div>
                    <a href="{{route('novedades')}}" class="categoriaa mb10">» {{__('All')}}</a>
                @foreach($categorias as $c)
                    <a href="{{route('novedades.showCategory', $c->id)}}" class="categoriaa mb10">» {{$c->{'title_'.App::getLocale()} }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection