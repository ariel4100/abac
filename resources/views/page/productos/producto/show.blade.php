@extends('page.productos.partials.layout')
@push('style')
    <style>
        .bordered tr th {
            background-color: rgba(0,0,0,0.12);
            border-left: 1px solid rgba(0,0,0,0.12);
        }
        .bordered tr td {
            border-right: 1px solid rgba(0,0,0,0.12);
        }

        .materialboxed {
             border-bottom: 1px solid #dddddd;
            border-top: 1px solid #dddddd;
        }

        @media only screen and (max-width: 400px) {
            p .boxed{
                width: 100%;
            }
        }

    </style>
@endpush
@section('meta')
{{ $producto->keyword }}
@endsection
@section('product')
    <div class="row mb30">
        <div class="col l6 m12 s12"  >
            <p style="border:#dddddd 1px solid;  display: flex; justify-content: center; align-items: center" class="" >
                <img src="{{asset('img/productos/'.$producto->image)}}" alt="{{$producto->{'title_'.App::getLocale()} }}" class="boxed  materialboxed" height="259px"  style="  border-bottom: 1px solid #dddddd; border-top: 1px solid #dddddd">
            </p>
            <div class="row" id="galeria" >
                <div class="col m4 s4">
                    <p style="border:#dddddd 1px solid;  display: flex; justify-content: center; align-items: center">
                        <img src="{{asset('img/productos/'.$producto->image)}}" alt="{{$producto->{'title_'.App::getLocale()} }}" class="responsive-img  " style="width: 135px;height: 125px;  border: 1px solid #dddddd;  ">
                    </p>
                </div>
                @foreach($galeria as $g)
                    <div class="col m4 s4">
                        <p style="border:#dddddd 1px solid;  display: flex; justify-content: center; align-items: center">
                            <img src="{{ asset('img/galeria/'.$g->file_image) }}" class="responsive-img" style="width: 135px;height: 125px;" alt="">
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col l6 m12 s12">
            <h6 class="uppercase rederino oblique fuente    fw6" style="font-size: 1.7rem; ">
                @php($title = explode(' ', $producto->{'title_'.App::getLocale()},2))
                {{ isset($title[0]) ? $title[0] : '' }}  <span class="fuente" style="color:#7C6F67">{{ isset($title[1]) ? $title[1] : '' }}</span>
            </h6>
            {!! $producto->{'text_'.App::getLocale()} !!}
            @if(App::getLocale() == 'es')
                @if($producto->catalogo !== null)
                    <p>
                        <i class="fas fa-file-pdf" style="color:#E1131B "></i>
                        <a class=" " style="color:#E1131B;width: 250px;" href="{{asset('files/contenido/'.$producto->catalogo)}}" target="_blank"> {{__('Products Catalogue')}} <span style="color: darkgray">(PDF)</span></a>
                    </p>
                @endif
            @else
                @php($catalogo_en = \App\Contenido::where('type','descargable')->where('ficha',$producto->catalogo)->first())
                @if($catalogo_en !== null)
                    <p>
                        <i class="fas fa-file-pdf" style="color:#E1131B "></i>
                        <a class=" " style="color:#E1131B;width: 250px;" href="{{asset('files/contenido/'.$catalogo_en->subtitle_en)}}" target="_blank"> {{__('Products Catalogue')}} <span style="color: darkgray">(PDF)</span></a>
                    </p>
                @endif

            @endif
            @if(App::getLocale() == 'es')
                @if($producto->ficha !== null)

                    <p>
                        <i class="fas fa-file-pdf" style="color:#E1131B "></i>
                        <a class="  " style="color:#E1131B;width: 250px;" href="{{asset('files/productos/'.$producto->ficha)}}" target="_blank"> {{__('Datasheet')}} <span style="color: darkgray">(PDF)</span></a>
                    </p>
                @endif
            @else
                @if($producto->ficha_variante !== null)
                    <p>
                        <i class="fas fa-file-pdf" style="color:#E1131B "></i>
                        <a class="  " style="color:#E1131B;width: 250px;" href="{{asset('files/productos/'.$producto->ficha_variante)}}" target="_blank"> {{__('Datasheet')}} <span style="color: darkgray">(PDF)</span></a>
                    </p>
                @else
                    @if($producto->ficha !== null)

                        <p>
                            <i class="fas fa-file-pdf" style="color:#E1131B "></i>
                            <a class="  " style="color:#E1131B;width: 250px;" href="{{asset('files/productos/'.$producto->ficha)}}" target="_blank"> {{__('Datasheet')}} <span style="color: darkgray">(PDF)</span></a>
                        </p>
                    @endif
                @endif
            @endif

            @if($producto->montaje !== null)
                <p>
                    <i class="fas fa-file-pdf" style="color:#E1131B "></i>
                    <a class=" " style="color:#E1131B;width: 250px;" href="{{asset('files/contenido/'.$producto->montaje)}}" target="_blank"> {{__('Mounting / Maintenance')}} <span style="color: darkgray">(PDF)</span></a>
                </p>
            @endif
        </div>
    </div>
    @if($producto->{'especificaciones_'.App::getLocale()} !== null)
        <div class="row mb30">
            <div class="especificaciones">
                <p class="uppercase mt0 mb0 fw6 dark-grayerino">{{__('Specifications')}}</p>
            </div>
            <div class=""  style="overflow-x: scroll">
                {!! $producto->{'especificaciones_'.App::getLocale()} !!}
            </div>
        </div>
    @endif
    @if(App::getLocale() == 'es')
        @if($producto->img !== null)
            <div class=" mb30">
                <p class="uppercase fw6 dark-grayerino">{{__('Information to order')}}</p>
                <img src="{{ asset('img/productos/'.$producto->img) }}" alt="" class="responsive-img">
            </div>
        @endif
    @else
        @if($producto->img_en !== null)
            <div class=" mb30">
                <p class="uppercase fw6 dark-grayerino">{{__('Information to order')}}</p>
                <img src="{{ asset('img/productos/'.$producto->img_en) }}" alt="" class="responsive-img">
            </div>
            @else
            @if($producto->img !== null)
                <div class=" mb30">
                    <p class="uppercase fw6 dark-grayerino">{{__('Information to order')}}</p>
                    <img src="{{ asset('img/productos/'.$producto->img) }}" alt="" class="responsive-img">
                </div>
            @endif
        @endif
    @endif

    @if($producto->video_url !== null)
    <div class="row   flex-center">
        {{--<div class="col l6">--}}
            {{--<h5 class="mt0 mb0 rederino" style="margin-top:-80px">{{__('For more information, watch the video below')}}</h5>--}}
        {{--</div>--}}
        <div class="col l12">
            <iframe class="responsive-video" src="https://www.youtube.com/embed/{{$producto->video_url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
    @endif

    @if(count($tabla) != 0)
        <div class="row">
            <div class="col s12">
                <div class=" " style="overflow-x: scroll">
                    <table class="bordered">
                            <thead>
                            <tr>
                                <th colspan="2" class="center">{{ __('CONNECTIONS') }}</th>
                                <th rowspan="3" class="center">{{ __('MODEL') }}</th>
                                <th   class="center">P máx.</th>
                                <th rowspan="3" class="center">CV</th>
                                <!--<th colspan="7" class="center">DIMENSIONES (mm)</th>__-->

                            </tr>
                            <tr>
                                <th rowspan="2" class="center">{{__('Input')}}</th>
                                <th rowspan="2" class="center">{{__('Output')}}</th>
                                <th rowspan="2" class="center">Bar</th>
                                <!--<th rowspan="2" class="center">Psi</th>
                                <th rowspan="2" class="center">A</th>
                                <th rowspan="2" class="center">B</th>
                                <th rowspan="2" class="center">C</th>
                                <th colspan="2" class="center">Recta</th>
                                <th colspan="2" class="center">Angulo</th>-->
                            </tr>
                            <!--<tr>
                                <th class="center">D</th>
                                <th class="center">E</th>
                                <th class="center">D</th>
                                <th class="center">E</th>
                            </tr>-->
                            </thead>
                            <tbody  >
                            @foreach($tabla as $t)
                                    <tr>
                                        @if(App::getLocale() == 'es')
                                            <td>{{ $t->diametro1 }} {{ $t->tipo }}</td>
                                            <td>{{ $t->diametro2 }} {{ $t->tipo2 }}</td>
                                        @else
                                            <td>{{ $t->diametro1 }} {{ $t->tipo == 'H' ? 'F' : $t->tipo }}</td>
                                            <td>{{ $t->diametro2 }} {{ $t->tipo2 == 'H' ? 'F' : $t->tipo2 }}</td>
                                        @endif
                                        <td>{{ $t->c }}</td>
                                        <td>{{ $t->d }}</td>
                                        <!--<td>{{ $t->e }}</td>-->
                                        <td>{{ $t->f }}</td>
                                        <!--<td>{{ $t->g }}</td>
                                        <td>{{ $t->h }}</td>
                                        <td>{{ $t->i }}</td>
                                        <td>{{ $t->j }}</td>
                                        <td>{{ $t->k}}</td>
                                        <td>{{ $t->l }}</td>
                                        <td>{{ $t->m }}</td>-->
                                    </tr>
                            @endforeach

                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    @endif
    @if(App::getLocale() == 'es')
    <p>{{ __('See the') }} <a href="{{asset('files/productos/'.$producto->ficha)}}" target="_blank" style="color: #FA0D1B;">{{ __('product datasheet') }}</a> {{ __('to obtain dimensions') }}</p>
    @else
        <p>{{ __('See the') }} <a href="{{asset('files/productos/'.$producto->ficha_variante)}}" target="_blank" style="color: #FA0D1B;">{{ __('product datasheet') }}</a> {{ __('to obtain dimensions') }}</p>
    @endif
    @if(count($randomProducts) != 0)
        <div class="row mt30 mb50">
            <h5 class="mb30 uppercase rederino oblique fuente fw6">{{__('Related products')}}</h5>
            @foreach($randomProducts as $p)
                         <a class="product-item col s12 m6 l4 mb30"  href="{{route('productos.show', $p->id)}}">
                        <div class="" style="border: 1px solid #dddddd">
                            <div class="product-image">
                                <img src="{{asset('img/productos/'.$p->image)}}" style="height: 250px;" class="responsive-img">
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
@push('scripts')
    <script>
        $("#galeria p").click(function () {

            let src = $(this).find("img").attr("src");
            $(this).closest("#galeria").prev().find("img").attr("src",src);
        });


    </script>
@endpush