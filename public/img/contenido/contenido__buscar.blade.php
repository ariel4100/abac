<!DOCTYPE html>

<html lang="es">

<head>
    @include('page.template.metas')
    @include('page.template.links')
</head>

<body>
    @include('page.template.header')

    <div style="background: #00446F; margin-bottom: 45px;">
        <section style="padding: 70px;background-image: url('{{asset('img/banner/'.$banner->imagen)}}'); background-repeat: no-repeat; background-size: cover; ">
            <div class="container" style="width: 70%;">
              <nav class="z-depth-0" style="">

                  <div class="nav-wrapper z-depth-0">

                      {!! Form::open(['route'=>'buscador', 'method' => 'POST']) !!}

                          <div class="input-field" style="background: white; border: 1px solid gray;">
                              <input id="busqueda" name="busqueda" type="search" placeholder="{!!$banner->{'titulo_'.$idioma}!!}" required>

                              <label class="label-icon" for="search"><i class="material-icons" style="color: #AFAFAF; font-weight: 600;">search</i></label>

                              <i class="material-icons azul" style="color: #3E4EB8;">chevron_right</i>

                          </div>

                      {!! Form::close() !!}

                  </div>

              </nav>
            </div>
        </section>
    </div>

    <style media="screen">
        .noPadNS {
            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }

        .colorCat {
            color: #454545;
        }

        .colorPro {
            color: #A3A3A3;
        }
    </style>

    <div class="container" style="margin-bottom: 132px;">
      <!--
        <nav class="z-depth-0" style="margin-top: 70px; margin-bottom: 132px;">

            <div class="nav-wrapper z-depth-0">

                {!! Form::open(['route'=>'buscador', 'method' => 'POST']) !!}

                    <div class="input-field" style="background: white; border: 1px solid gray;">
                        <input id="busqueda" name="busqueda" type="search" placeholder="@lang('general.buscador')" required>

                        <label class="label-icon" for="search"><i class="material-icons" style="color: #AFAFAF; font-weight: 600;">search</i></label>

                        <i class="material-icons azul" style="color: #3E4EB8;">chevron_right</i>

                    </div>

                {!! Form::close() !!}

            </div>

        </nav>
         -->
    	<div class="row">
        @if($busca==1)
            @foreach ($productos as $producto)
            <div class="col s12 m6 l4">
                <div class="card z-depth-0">
                    <div class="card-image center-align">
                        <a href="{{route('producto', $producto->id)}}">
                            <div class="efecto">
                                <span class="central"><i class="material-icons">add</i></span>
                            </div>
                            <img src="{{asset('img/productos/'.$producto->imagen)}}" style="border: 1px solid #DDD;">
                        </a>
                    </div>
                    <div class="card-content cero center-align " style="border: 1px solid #DDD; height: 100px; display:flex; justify-content: center; align-items:center;">
                        <div class=" fw5 fs16 gris13">{!!$producto->{'titulo_'.$idioma} !!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
        @if($busca==1)
            @foreach ($presentacion as $presentaciones)
            <div class="col s12 m6 l4">
                <div class="card z-depth-0">
                    <div class="card-image center-align">
                        <a href="{{route('producto', $presentaciones->id_producto)}}">
                            <div class="efecto">
                                <span class="central"><i class="material-icons">add</i></span>
                            </div>
                            @if($presentaciones->imagen1)
                            <img src="{{asset('img/presentaciones/'.$presentaciones->imagen1)}}" style="border: 1px solid #DDD;">
                            @elseif($presentaciones->imagen2)
                            <img src="{{asset('img/presentaciones/'.$presentaciones->imagen1)}}" style="border: 1px solid #DDD;">
                            @elseif($presentaciones->imagen3)
                            <img src="{{asset('img/presentaciones/'.$presentaciones->imagen1)}}" style="border: 1px solid #DDD;">
                            @elseif($presentaciones->imagen4)
                            <img src="{{asset('img/presentaciones/'.$presentaciones->imagen1)}}" style="border: 1px solid #DDD;">
                            @else
                            <img src="{{asset('img/productos/'.$presentaciones->productos->imagen)}}" style="border: 1px solid #DDD;">
                            @endif
                        </a>
                    </div>
                    <div class="card-content cero center-align " style="border: 1px solid #DDD; height: 100px; display:flex; justify-content: center; align-items:center;">
                        <div class=" fw5 fs16 gris13"><span style="color: gray;">{!!$presentaciones->productos->{'titulo_'.$idioma}!!}</span> <br> {!!$presentaciones->{'titulo_'.$idioma} !!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
        </div>
    </div>

    @include('page.template.footer')
</body>

</html>

@include('page.template.scripts')

<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            selectYears: 200,
            min: new Date(2018, 11, 23),
            max: new Date(2080, 12, 31)
        });
    });

    $(document).ready(function() {
        $('select').formSelect();
    });
</script>
