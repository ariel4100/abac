@extends('layouts.app')
@push('style')
    <style>
        .product-description p {
            margin-top: 0px;
            padding-top: 0px;
            margin-bottom: 0px;
        }
    </style>
@endpush
@section('content')

@include('page.productos.partials.breadcrumb')

<div class="container">
    <div class="row mt30 mb50">
        @foreach ($familias as $f)
                 <a class="product-item mb20 col s12 m6 l3"  href="{{route('familias.show', ['familia' => $f->id])}}">
                <div class="" style="border: 1px solid #dddddd;">
                    <div class="product-image" style="border-bottom: 0px solid #dddddd;">
                        <img src="{{asset('img/familias/'.$f->image)}}" alt="{{ $f->{'title_'.App::getLocale()} }}" class="responsive-img" style="height: 200px;">
                        <div class="product-overlay">
                            <div class="icon">
                                <i class="material-icons">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="display: flex; flex-direction: column;  width:100%;   margin-bottom: 10px; height: 70px;">
                    <div class=""  >
                        <h6 class="uppercase rederino fuente oblique fw6" style="margin-bottom: 0px">{{ str_limit($f->{'title_'.App::getLocale()}, 100) }}</h6>
                    </div>
                    <div class="product-description " style="height: 70px">
                         @php($title = explode('@', $f->{'descripcion_'.App::getLocale()},2))
                        {!! isset($title[0]) ? $title[0] : '' !!}
                        <!--{!! str_limit($f->{'descripcion_'.App::getLocale()}, 70)  !!}-->
                    </div>
                </div>
            </a>
            <!--
            <div class="col s12 m6 l3">
                <div class="producterino">
                    <div class="product-img" style="height: 280px; display:flex; justify-content:center; align-items:center">
                        <a href="{{route('familias.show', ['familia' => $f->id])}}" style="display:flex; justify-content:center; align-items:center">
                            <img src="{{asset('img/familias/'.$f->image)}}" alt="{{ $f->{'title_'.App::getLocale()} }}" class="responsive-img">
                        </a>
                    </div>
                    <div class="product-description center mt10">
                        <a href="{{route('familias.show', ['familia' => $f->id])}}" class="rederino fw6">
                            {{ $f->{'title_'.App::getLocale()} }}
                        </a>
                    </div>
                </div>
            </div>-->
        @endforeach
    </div>
</div>

@endsection
