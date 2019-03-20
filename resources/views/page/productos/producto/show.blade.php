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
    </style>
@endpush
@section('product')
    <div class="row mb30">
        <div class="col l6 m12 s12"  >
            <p style="border:#dddddd 1px solid;  display: flex; justify-content: center; align-items: center" >
                <img src="{{asset('img/productos/'.$producto->image)}}" alt="{{$producto->{'title_'.App::getLocale()} }}" class="responsive-img">
            </p>
            <div class="row" id="galeria" >
                <div class="col m4">
                    <p style="border:#dddddd 1px solid;  display: flex; justify-content: center; align-items: center">
                        <img src="{{asset('img/productos/'.$producto->image)}}" alt="{{$producto->{'title_'.App::getLocale()} }}" class="responsive-img">
                    </p>
                </div>
                @foreach($galeria as $g)
                    <div class="col m4">
                        <p style="border:#dddddd 1px solid;  display: flex; justify-content: center; align-items: center">
                            <img src="{{ asset('img/galeria/'.$g->file_image) }}" class="responsive-img" style="height: 100px" alt="">
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col l6 m12 s12">
            <h6 class="rederino" style="font-size: 1.7rem">
                {{$producto->{'title_'.App::getLocale()} }}
            </h6>
            {!! $producto->{'text_'.App::getLocale()} !!}
            @if($producto->ficha !== null)
                <a class="waves-effect waves-light btn" style="background-color:#E1131B;" href="{{asset('files/productos/'.$producto->ficha)}}" target="_blank">Descargar ficha</a>
            @endif
            @if($producto->ficha_variante !== null)
                <a class="waves-effect waves-light btn " style="background-color:#E1131B;" href="{{asset('files/productos/'.$producto->ficha_variante)}}" target="_blank">Ficha Variante</a>
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

    @if(count($tabla) != 0)
        <div class=" ">
            <div class="row">
                <div class="col s12">
                    <table class="bordered responsive-table">
                        <thead>
                        <tr>
                            <th colspan="2" class="center">CONEXIONES</th>
                            <th rowspan="3" class="center">MODELO</th>
                            <th colspan="2" class="center">P máx.</th>
                            <th rowspan="3" class="center">Orificio (mm)</th>
                            <th colspan="7" class="center">DIMENSIONES (mm)</th>

                        </tr>
                        <tr>
                            <th rowspan="2" class="center">Entrada</th>
                            <th rowspan="2" class="center">Salida</th>
                            <th rowspan="2" class="center">Bar</th>
                            <th rowspan="2" class="center">Psi</th>
                            <th rowspan="2" class="center">A</th>
                            <th rowspan="2" class="center">B</th>
                            <th rowspan="2" class="center">C</th>
                            <th colspan="2" class="center">Recta</th>
                            <th colspan="2" class="center">Angulo</th>
                        </tr>
                        <tr>
                            <th class="center">D</th>
                            <th class="center">E</th>
                            <th class="center">D</th>
                            <th class="center">E</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tabla as $t)
                                <tr>
                                    <td>{{ $t->a }}</td>
                                    <td>{{ $t->b }}</td>
                                    <td>{{ $t->c }}</td>
                                    <td>{{ $t->d }}</td>
                                    <td>{{ $t->e }}</td>
                                    <td>{{ $t->f }}</td>
                                    <td>{{ $t->g }}</td>
                                    <td>{{ $t->h }}</td>
                                    <td>{{ $t->i }}</td>
                                    <td>{{ $t->j }}</td>
                                    <td>{{ $t->k}}</td>
                                    <td>{{ $t->l }}</td>
                                    <td>{{ $t->m }}</td>
                                </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
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
@push('scripts')
    <script>
        $("#galeria p").click(function () {

            let src = $(this).find("img").attr("src");
            $(this).closest("#galeria").prev().find("img").attr("src",src);
        });
    </script>
@endpush