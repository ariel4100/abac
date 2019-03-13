@extends('layouts.app')

@section('content')

@include('page.productos.partials.breadcrumb')

<div class="container">
    <div class="row mt30 mb50">
        @foreach ($familias as $f)
                 <a class="product-item col s12 m6 l3"  href="{{route('familias.show', ['familia' => $f->id])}}">
                <div class="" style="border: 1px solid #dddddd;  ">
                    <div class="product-image" style="border-bottom: 0px solid #dddddd;">
                        <img src="{{asset('img/familias/'.$f->image)}}" alt="{{ $f->{'title_'.App::getLocale()} }}" class="responsive-img" style="height: 200px;">
                        <div class="product-overlay">
                            <div class="icon">
                                <i class="material-icons">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="display:flex; justify-content:center; align-items:center; width:100%; padding: 5%">
                    <div class="product-description rederino fw6">
                        {{ str_limit($f->{'title_'.App::getLocale()}, 25) }}
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
