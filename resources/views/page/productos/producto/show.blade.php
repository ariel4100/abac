@extends('page.productos.partials.layout')

@section('product')
    <div class="row mb30">
        <div class="col l6 m12 s12" style="display:flex; justify-content:center; align-items:center">
            <p style="border:#dddddd 1px solid;">
                <img src="{{asset('img/productos/'.$producto->image)}}" alt="{{$producto->{'title_'.App::getLocale()} }}" class="responsive-img">
            </p>
        </div>
        <div class="col l6 m12 s12">
            <h6 class="rederino" style="font-size: 1.7rem">
                {{$producto->{'title_'.App::getLocale()} }}
            </h6>
            {!! $producto->{'text_'.App::getLocale()} !!}
            @if($producto->ficha !== null)
                <a class="waves-effect waves-light btn" style="background-color:#E1131B;" href="{{asset('files/productos/'.$producto->ficha)}}" target="_blank">Descargar ficha</a>
            @endif
        </div>
    </div>
    @if($producto->{'especificaciones_'.App::getLocale()} !== null)
        <div class="row mb30">
            <div class="especificaciones">
                <p class="uppercase mt0 mb0 fw6 dark-grayerino">Especificaciones</p>
            </div>
            {!! $producto->{'especificaciones_'.App::getLocale()} !!}
        </div>
    @endif

    @if($producto->video_url !== null)
    <div class="row especificaciones flex-center">
        <div class="col l6">
            <h5 class="mt0 mb0 rederino" style="margin-top:-80px">Para mas informacion, mira el video a continuacion</h5>
        </div>
        <div class="col l6">
            <iframe class="responsive-video" src="https://www.youtube.com/embed/{{$producto->video_url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
    @endif

    @if(count($randomProducts) >= 0)
        <div class="row mt30 mb50">
            <h5 class="mb30 rederino">Productos Relacionados</h5>
            @foreach($randomProducts as $p)
                         <a class="product-item col s12 m6 l4"  href="{{route('productos.show', $p->id)}}">
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
                    <!--
                <div class="col l4 m6 s12">
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
                                    {{$p->{'title_'.App::getLocale()} }}
                                </div>
                                <div class="product-plus">
                                    <i class="material-icons rederino">add</i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>-->
            @endforeach
        </div>
    @endif
@endsection
