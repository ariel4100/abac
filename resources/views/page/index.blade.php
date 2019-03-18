@extends('layouts.app')

@section('content')

    @include('page.partials.sliders')
    <div class="container" style="width: 85%">
        <div class="row mb50 mt50">
            @foreach($novedades as $n)
            <div class="col l6 m6 s12 ">
                <div class="novedad">
                    <div class="novedad-card" style="height: 300px !important;">
                        <h5 class="ultimas-novedades mb40">Últimas novedades</h5>
                        <div class="row">
                            <div class="col l5">
                                <img src="{{asset('img//novedades/'.$n->image)}}" class="responsive-img" alt="">
                            </div>
                            <div class="col l7 flex-novedad">

                                <h6 class="mt0 mb0">
                                    <a href="{{route('novedades.showNovedad', $n->id)}}" class="grayerino">
                                        {{ $n->{'title_'.App::getLocale()} }}
                                    </a>
                                </h6>
                                {!! str_limit($n->{'text_'.App::getLocale()}, 200) !!}
                                <p class=" mt10">
                                    <a href="{{ route('novedades.showNovedad', $n->id) }}" class="rederino">
                                        » Ver más
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row center mb50 mt30">
            <h4 class="center uppercase rederino oblique fw6 mb50">CALIDAD</h4>
            @foreach($calidad as $c)
                <div class="col s12 m4">
                    <div class="" style="border: 1px solid darkgray;">
                        <img src="{{ asset('img/calidad/'.$c->file_image) }}" style="border-radius: 50%" alt="">
                        <p class="grayerino">
                        <span class="container">
                            {!! $c->{'nombre_'.App::getLocale()} !!}
                        </span>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row" style="margin-bottom: 5%">
            <h4 class="center uppercase rederino oblique fw6 mb50">Productos destacados</h4>
            <div class="row">
                @foreach($productos as $p)
                      <a class="product-item col s12 m6 l3"  href="{{route('productos.show', $p->id)}}">
                        <div class="" style="border: 1px solid #dddddd">
                            <div class="product-image">
                                <img src="{{asset('img/productos/'.$p->image)}}" class="responsive-img">
                                <div class="product-overlay">
                                    <div class="icon">
                                        <i class="material-icons">add</i>
                                    </div>
                                </div>
                            </div>
                            <div style="display:flex; justify-content:space-between; align-items:center; width:100%; padding: 5%">
                                <div class="product-description grayerino fw6">


                                    {{ str_limit($p->{'title_'.App::getLocale()}, 25) }}
                                </div>
                                <div class="product-plus">
                                    <i class="material-icons rederino">add</i>
                                </div>
                            </div>
                        </div>
                    </a>
                <!--<div class="col l3 m6 s12 mb50">
                    <div class="product-card">
                        <div class="product-img">
                        <a  href="{{route('productos.show', $p->id)}}" class="center">
                                <p class="center">
                                    <img src="{{asset('img/productos/'.$p->image)}}" class="responsive-img">
                                </p>
                            </a>
                        </div>
                        <div class="product-text">
                            <a href="{{route('productos.show', $p->id)}}" style="display:flex; justify-content:space-between; align-items:center; width:100%;">
                                <div class="product-description grayerino fw6">
                                    VA1 VÁLVULAS AGUJA DE BLOQUEO
                                </div>
                                <div class="product-plus">
                                    <i class="material-icons rederino">add</i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>--->
                @endforeach
            </div>
        </div>
    </div>
    <div class="experiencia-rubro center">
        <div class="container flex-column-center" style="height:100%;">
            <h6 class="grayerino mb0"> {{ $text->{'title_'.App::getLocale()} }} </h6>
            <h4 class="rederino mt10 mb0">{{ $text->{'subtitle_'.App::getLocale()} }}</h4>
            <p class="grayerino">
                <span class="container">
                    {!! $text->{'text_'.App::getLocale()} !!}
                </span>
            </p>
        <a class="waves-effect waves-light btn" href="{{route('empresa')}}" style="background-color:#eb252d;">CONOCÉ MÁS</a>
        </div>
    </div>
@endsection

@push('scripts')
<script>
M.Slider.init(document.querySelector('.slider'), {height: 700});
</script>    
@endpush