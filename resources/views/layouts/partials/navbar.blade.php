@push('style')
    <style>

    </style>
@endpush
<nav class="sub-nav">
    <div class="nav-wrapper">
        <ul id="nav-mobile" class="right">
            <li>
                @if(Auth::check())
                    <div class="sub-nav-text" style="display:flex;">
                    <a href="{{route('privada.index')}}" style="padding-right:5px;">
                            {{Auth::user()->name}}
                        </a>
                        <a href="{{route('logout')}}" class="sub-nav-text" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" style="padding-left:0px;">(salir)</a>
                        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display:none;">
                            @csrf
                        </form>
                    </div>
                @else
                    <a href="{{route('acceso')}}" class="uppercase sub-nav-text">Acceso Clientes</a>
                @endif
            </li>
            <li><a href="#" class="uppercase sub-nav-text" style="padding:0">|</a></li>
            <li><a href="{{route('novedades')}}" class="uppercase sub-nav-text">Novedades</a></li>
            <li><a href="#" class="uppercase sub-nav-text" style="padding:0">|</a></li>
            <li><a href="{{route('contacto')}}" class="uppercase sub-nav-text" style="margin-right: 0; padding-right: 5px">Contacto</a></li>
            <li><a href="https://www.facebook.com/pages/category/Industrial-Company/ABAC-SRL-165035077562951/" target="_blank" class="hide-on-med-and-down" style="height: 64px;"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="https://www.youtube.com/channel/UCAUMO65Z8Tcg-bj-7JXOmLw" class="hide-on-med-and-down" target="_blank" style="height: 64px;"><i class="fab fa-youtube"></i></a></li>
             <li><a href="{{ route('buscador') }}" class="hide-on-med-and-down" style="height: 64px;"><i class="fas fa-search"></i></a></li>
            <li>
                <a class='dropdown-trigger btn' href='#' style="background-color:rgb(235, 37, 45); margin: 0" data-target='dropdown1'>{{ strtoupper(App::getLocale()) }}</a> 
            </li>
        </ul>
    </div>
</nav>
<nav class="nav-primary">
    <div class="nav-wrapper nav-second">
        <a href="{{route('index')}}" class="brand-logo">
            <img class="responsive-img" src="{{ asset('img/contenido/'.$header->image) }}">
        </a>
        <a href="#!" data-target="mobile-demo" class="sidenav-trigger left" id="sidenavsillo" style="color:black;"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="{{route('empresa')}}" @if(\Request::is('nosotros')) class="activerino" @endif>{{ __('About Us') }}</a></li>
            <li><a class="dropdown-trigger" style="position: relative; padding-right: 30px;" href="{{route('productos')}}" data-target="productos" @if(\Request::is('productos*')) class="activerino" @endif>{{ __('Products') }}<i class="material-icons right" style="height: 50px;top: -10px;right: 0px;    position: absolute;">arrow_drop_down</i></a></li>
            <li><a href="{{route('descargas')}}" @if(\Request::is('descargas')) class="activerino" @endif>{{ __('Downloads') }}</a></li>
            <li><a class="dropdown-trigger" style="position: relative; padding-right: 30px;" href="{{route('productos')}}" data-target="herramientas" @if(\Request::is('herramientas*')) class="activerino" @endif>{{ __('Tools') }}<i class="material-icons right" style="height: 50px;top: -10px;right: 0px;    position: absolute;">arrow_drop_down</i></a></li>
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
    <li><a href="{{route('productos')}}">Todos</a></li>
    @foreach($items as $item)
        <li><a href="{{route('familias.show', ['familia' => $item->id])}}">{{ $item->title_es }}</a></li>
    @endforeach
</ul>

<ul id="herramientas" class="dropdown-content">
    <li><a href="{{route('herramientas')}}">Todos</a></li>
    @foreach($items1 as $h)
        <li><a href="{{ route($h->ruta) }}">{{ $h->{'title_'.App::getLocale()} }}</a></li>
    @endforeach
</ul>
<!-- Dropdown Structure -->
<ul id='dropdown1' class='dropdown-content'>
    <li><a href="/abac/setlocale/es" style="color:#eb262d;">ES</a></li>
    <li><a href="/abac/setlocale/en" style="color:#eb262d;">EN</a></li>
</ul>   

<ul class="sidenav" id="mobile-demo">
    <li><a href="{{route('empresa')}}" @if(\Request::is('nosotros')) class="activerino" @endif>{{ __('About Us') }}</a></li>
            <li><a href="{{route('productos')}}" @if(\Request::is('productos*')) class="activerino" @endif>{{ __('Products') }}</a></li>
            <li><a href="{{route('descargas')}}" @if(\Request::is('descargas')) class="activerino" @endif>{{ __('Downloads') }}</a></li>
            <li><a href="{{route('herramientas')}}" @if(\Request::is('herramientas*')) class="activerino" @endif>{{ __('Tools') }}</a></li>
            <li><a href="{{route('calidad')}}" @if(\Request::is('calidad*')) class="activerino" @endif>{{ __('Quality') }}</a></li>
            <li><a href="{{route('videos')}}" @if(\Request::is('videos')) class="activerino" @endif>{{ __('Videos') }}</a></li>
            <li><a href="{{route('distribuidores')}}" @if(\Request::is('distribuidores')) class="activerino" @endif>{{ __('Distributors') }}</a></li>
</ul>

@push('scripts')
<script>
    M.Sidenav.init(document.querySelector('#sidenavsillo'))
    M.Dropdown.init(document.querySelector('.dropdown-trigger'))
</script>
@endpush