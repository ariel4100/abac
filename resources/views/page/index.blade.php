@extends('layouts.app')
@push('style')
    <style>
        @media screen and (max-width: 1000px) {
            .caja {
                height: auto  !important;
            }
            .input-field{
                width: 100% !important;
            }
            .material-icons{
                margin-left: unset !important;
            }
        }
    </style>
@endpush
@section('content')

    @include('page.partials.sliders')
    <div class="container" style="width: 85%">
        <div class="row mb50 mt50">
            <h4 class="center uppercase rederino fuente oblique fw6 mb50">{{ __('Latest news') }}</h4>
        @foreach($novedades as $n)
                <div class="col l6 m6 s12 mb30">
                <div class="novedad">
                    <div class="novedad-card caja" style=" height: 250px ">
                        <h5 class="rederino  fw6">{{ $n->{'title_'.App::getLocale()} }}</h5>
                        <hr style="margin: 15px 0px">
                        <div class="row">
                            <div class="col l5">
                                <img src="{{asset('img//novedades/'.$n->image)}}" class="responsive-img" alt="">
                            </div>
                            <div class="col l7 flex-novedad">

                                <h6 class="mt0 mb0">
                                    <a href="{{route('novedades.showNovedad', $n->id)}}" class="grayerino">

                                    </a>
                                </h6>
                                {!! str_limit($n->{'text_'.App::getLocale()}, 170) !!}
                                <p class=" mt10">
                                    <a href="{{ route('novedades.showNovedad', $n->id) }}" class="rederino">
                                         <p>» {{ __('Read more') }}</p>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @if($calidad)
            <div class="row center mb50 mt30">
                <h4 class="center uppercase rederino fuente oblique fw6 mb50">{{ __('OUR QUALITY CERTIFICATIONS') }}</h4>
                @foreach($calidad as $c)
                    <div class="col s12 m4">
                        <div class="" style="border: 1px solid rgb(221, 221, 221);">
                            <img src="{{ asset('img/calidad/'.$c->file_image) }}"  style="width: 100%; height: 215px; display: block;" class="responsive-img" alt="">

                            <div class=" "  style="border-top: 1px solid rgb(221, 221, 221);">
                                <p class="grayerino" style="margin-bottom: 0.2rem">
                                    <span class=" " style="font-weight: bold">
                                        {!! $c->{'nombre_'.App::getLocale()} !!}
                                    </span>
                                </p>
                                <p style="margin-top: 0px;"><a href="{{asset('files/calidad/'.$c->pdf)}}" style="color: #e1131b; display: flex; justify-content: center; align-items: center" target="_blank"><i class="material-icons" style="font-size: 20px;">file_download</i> {{ __('Download') }} </a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="row" style="margin-bottom: 5%">
            <h4 class="center uppercase rederino oblique fuente fw6 mb50 mt50">{{ __('Featured Products') }}</h4>
            <div class="row">
                @foreach($productos as $p)
                      <a class="product-item col s12 m6 l3 mb30"  href="{{route('productos.show', $p->id)}}">
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
        <div class="container flex-column-center" style="height:100%; padding: 30px;">
            <h6 class="grayerino mb0 "> {{ $text->{'title_'.App::getLocale()} }} </h6>
            <h4 class="rederino mt10 mb0 oblique fuente fw6">{{ $text->{'subtitle_'.App::getLocale()} }}</h4>
            <p class="grayerino">
                <span class="container">
                    {!! $text->{'text_'.App::getLocale()} !!}
                </span>
            </p>
        <a class="waves-effect waves-light btn" href="{{route('empresa')}}" style="background-color:#eb252d;">{{ __('More') }}</a>
        </div>
    </div>
    <!-----NEWSLETTER----->
    <div class="row" style="margin-bottom: 0px;display: flex; justify-content: center;align-items: center; height: 250px;background-image: url({{asset('imagenes/newsletter.fw.png')}}); background-size: cover; background-position: center; background-repeat: no-repeat; ">
        <div class="container white-text">
            @include('templates.success')
            @include('templates.error')
            <div class="col s12 m6 l6" style="display: flex; justify-content: center">
                <div class="" >
                    <h4>{{ __('Subscribe to our Newsletter') }}</h4>
                    <p>{{ __('Receive our latest news') }}</p>
                </div>
            </div>
            <div class="col s12 m6 l6">
                <form action="{{ route('newsletter.store') }}" method="post" class="">
                    <div class="" style="display: flex; justify-content: start; align-items: center">
                    @csrf
                    <div class="input-field white-text" style="width: 50%;">
                        <input id="email" type="email" name="email" class="validate white-text" required>
                        <label for="email">{{ __('Enter Email') }}</label>
                    </div>
                        <button class="btn" type="submit" style="background-color: #eb252d">{{ __('Submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
M.Slider.init(document.querySelector('.slider'), {height: 420});
</script>    
@endpush