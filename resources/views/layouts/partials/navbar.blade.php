@push('style')
    <style>
        @media only screen and (max-width: 768px) {
            .menu-negro {
                display: none;
            }
        }

        @media only screen and (max-width: 1200px){
            .hide-menu {
                display: none !important;
            }
        }

    </style>

@endpush

<nav class="sub-nav" style="height: 55px;">
    <div class="nav-wrapper container">
        <ul id="nav-mobile" class="right" style="height: 55px;">
            <li>
                @if(Auth::check())
                    <div class="sub-nav-text" style="display:flex;">
                    <a href="{{route('privada.index')}}" style="padding-right:5px;">
                        {{ __('Welcome') }} {{ ucwords(Auth::user()->name) }}
                        </a>
                        <a href="{{route('logout')}}" class="sub-nav-text" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" style="padding-left:0px;">({{__('Logout')}})</a>
                        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display:none;">
                            @csrf
                        </form>
                    </div>
                @else
                    <a href="{{route('acceso')}}" class="uppercase sub-nav-text">{{ __('Customer Access') }}</a>
                @endif
            </li>
            <li class="hide-on-med-and-down"><a href="#" class="uppercase sub-nav-text" style="padding:0">|</a></li>
            <li class="hide-on-med-and-down"><a href="{{route('novedades')}}" class="uppercase sub-nav-text">{{ __('News') }}</a></li>
            <li class="hide-on-med-and-down"><a href="#" class="uppercase sub-nav-text" style="padding:0">|</a></li>
            <li class="hide-on-med-and-down"><a href="{{route('contacto')}}" class="uppercase sub-nav-text" style="margin-right: 0; padding-right: 5px">{{ __('Contact') }}</a></li>
            <li><a href="https://www.facebook.com/pages/category/Industrial-Company/ABAC-SRL-165035077562951/" target="_blank" class="hide-on-med-and-down" style="height: 64px;"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="https://www.youtube.com/channel/UCAUMO65Z8Tcg-bj-7JXOmLw" class="hide-on-med-and-down" target="_blank" style="height: 64px;"><i class="fab fa-youtube"></i></a></li>
             <li>
                 {{--<buscador-component></buscador-component>--}}
                 <form  class="hide-on-med-and-down" action="{{ route('buscar.store') }}" method="post" autocomplete="off">
                     @csrf
                     @method('POST')
                     <buscador-component input="{{ __('Search') }}"></buscador-component>
                 </form>
                 {{--<form  class="hide-on-med-and-down" action="{{ route('buscar.store') }}" method="post"  >--}}
                     {{--@csrf--}}
                     {{--@method('POST')--}}
                     {{--<div class="" id="buscador" style="display: flex; align-items: center">--}}
                         {{--<button type="submit" style="cursor: pointer; border: unset;color: #fff;background-color: unset; padding-right: 0;"><i class="fas fa-search"></i></button>--}}
                         {{--<input type="search" id="buscar" name="nombre" placeholder="{{ __('Search') }}...">--}}

                     {{--</div>--}}
                 {{--</form>--}}
             </li>
            <li>
                <a class='dropdown-trigger btn-small' href='#' style="background-color:rgb(235, 37, 45); margin: 0" data-target='dropdown1'>{{ strtoupper(App::getLocale()) }}</a>
            </li>
        </ul>
    </div>
</nav>
<nav class="nav-primary">
    <div class="nav-wrapper container nav-second">
        <a href="{{route('index')}}" class="brand-logo">
            <img class="responsive-img" src="{{ asset('img/contenido/'.$header->image) }}">
        </a>
        <a href="#!" data-target="mobile-demo" class="sidenav-trigger show-on-large hide-menu-mobile left" id="sidenavsillo" style="color:black;"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-menu">
            <li><a href="{{route('empresa')}}" @if(\Request::is('nosotros')) class="activerino" @endif>{{ __('About Us') }}</a></li>
            <li><a class="dropdown-triggers" style="position: relative; padding-right: 30px;" href="{{route('productos')}}" data-target="productos" @if(\Request::is('productos*')) class="activerino" @endif>{{ __('Products') }}<i class="material-icons right" style="height: 50px;top: -10px;right: 0px;    position: absolute;">arrow_drop_down</i></a></li>
            <li><a href="{{route('descargas')}}" @if(\Request::is('descargas')) class="activerino" @endif>{{ __('Downloads') }}</a></li>
            <li><a class="dropdown-triggers" style="position: relative; padding-right: 30px;" href="{{route('herramientas')}}" data-target="herramientas" @if(\Request::is('herramientas*')) class="activerino" @endif>{{ __('Tools') }}<i class="material-icons right" style="height: 50px;top: -10px;right: 0px;    position: absolute;">arrow_drop_down</i></a></li>
            <li><a href="{{route('calidad')}}" @if(\Request::is('calidad*')) class="activerino" @endif>{{ __('Quality') }}</a></li>
            <li><a href="{{route('videos')}}" @if(\Request::is('videos')) class="activerino" @endif>{{ __('Videos') }}</a></li>
            <li><a href="{{route('distribuidores')}}" @if(\Request::is('distribuidores')) class="activerino" @endif>{{ __('Distributors') }}</a></li>
        </ul>
    </div>
</nav>
@php($items = \App\Familia::orderBy('order')->limit(8)->get())
@php($items1 = \App\Contenido::seccionTipo('herramientas', 'texto')->orderBy('order')->get())
<!-- Dropdown Structure -->
<ul id="productos" class="dropdown-content">
    <li><a href="{{route('productos')}}">{{ __('All') }}</a></li>
    @foreach($items as $item)
        <li><a href="{{route('familias.show', ['familia' => $item->id])}}">{{ $item->{'title_'.App::getLocale()} }}</a></li>
    @endforeach
</ul>

<ul id="herramientas" class="dropdown-content">
    <li><a href="{{route('herramientas')}}">{{ __('All') }}</a></li>
    @foreach($items1 as $h)
        <li><a href="{{ route($h->ruta) }}">{{ $h->{'title_'.App::getLocale()} }}</a></li>
    @endforeach
</ul>
<!-- Dropdown Structure -->
<ul id='dropdown1' class='dropdown-content'>
    <li><a href="{{ url('/'.'setlocale/es') }}" style="color:#eb262d;">ES</a></li>
    <li><a href="{{ url('/'.'setlocale/en') }}" style="color:#eb262d;">EN</a></li>
</ul>   

<ul class="sidenav" id="mobile-demo">
    <li><a href="{{route('empresa')}}" @if(\Request::is('nosotros')) class="activerino" @endif>{{ __('About Us') }}</a></li>
            <li><a href="{{route('productos')}}" @if(\Request::is('productos*')) class="activerino" @endif>{{ __('Products') }}</a></li>
            <li><a href="{{route('descargas')}}" @if(\Request::is('descargas')) class="activerino" @endif>{{ __('Downloads') }}</a></li>
            <li><a href="{{route('herramientas')}}" @if(\Request::is('herramientas*')) class="activerino" @endif>{{ __('Tools') }}</a></li>
            <li><a href="{{route('calidad')}}" @if(\Request::is('calidad*')) class="activerino" @endif>{{ __('Quality') }}</a></li>
            <li><a href="{{route('videos')}}" @if(\Request::is('videos')) class="activerino" @endif>{{ __('Videos') }}</a></li>
            <li><a href="{{route('distribuidores')}}" @if(\Request::is('distribuidores')) class="activerino" @endif>{{ __('Distributors') }}</a></li>
    <li><a href="{{route('novedades')}}" @if(\Request::is('novedades')) class="activerino" @endif>{{ __('News') }}</a></li>
    <li><a href="{{route('contacto')}}" @if(\Request::is('contacto')) class="activerino" @endif>{{ __('Contact') }}</a></li>
    <li class=" " style="display:  flex;">
        <a href="https://www.facebook.com/pages/category/Industrial-Company/ABAC-SRL-165035077562951/" target="_blank" class="hide-on-large-only" style="height: 64px;"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.youtube.com/channel/UCAUMO65Z8Tcg-bj-7JXOmLw" class="hide-on-large-only" target="_blank" style="height: 64px;"><i class="fab fa-youtube"></i></a>
    </li>
    <li>
        <form  class="hide-on-large-only" action="{{ route('buscar.store') }}" method="post" autocomplete="off">
            @csrf
            @method('POST')
            <buscador-component input="{{ __('Search') }}"></buscador-component>
        </form>
        {{--<form id="buscador1" class=" hide-on-large-only" action="{{ route('buscar.store') }}" method="post"  style="display: flex; align-items: center">--}}
            {{--@csrf--}}
            {{--@method('POST')--}}
            {{--<button type="submit" style="cursor: pointer; border: unset;color: #000;background-color: unset; padding-right: 0;"><i class="fas fa-search"></i></button>--}}
            {{--<input type="search" id="buscar" name="nombre" placeholder="{{ __('Search') }}...">--}}
        {{--</form>--}}
    </li>
</ul>

@push('scripts')
<script>
    M.Sidenav.init(document.querySelector('#sidenavsillo'))
    var elems = document.querySelectorAll('.dropdown-triggers');
    var instances = M.Dropdown.init(elems, {
        hover: true,
        coverTrigger: false
    });

</script>
@endpush