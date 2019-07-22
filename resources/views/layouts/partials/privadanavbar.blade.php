@push('style')
<style>
    @media (max-width: 1000) {
        .menu{
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
                    <a href="{{route('privada.index')}}" style="padding-right:5px; font-size: 12px">
                        {{ __('Welcome') }} {{ ucwords(Auth::user()->name) }}
                        </a>
                        <a href="{{route('logout')}}" class="sub-nav-text" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" style="padding-left:0px; font-size: 12px">({{__('Logout')}})</a>
                        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display:none;">
                            @csrf
                        </form>
                    </div>
                @else
                    <a href="{{route('acceso')}}" class="uppercase sub-nav-text">{{ __('Customer Access') }}</a>
                @endif
            </li>
            <li class="hide-on-med-and-down"><a href="#" class="uppercase sub-nav-text" style="padding:0">|</a></li>
            <li class="hide-on-med-and-down"><a href="{{route('herramientas')}}" class="uppercase sub-nav-text">{{ __('Tools') }}</a></li>
            <li><a href="https://www.facebook.com/pages/category/Industrial-Company/ABAC-SRL-165035077562951/" target="_blank" class="hide-on-med-and-down" style="height: 64px;"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="https://www.youtube.com/channel/UCAUMO65Z8Tcg-bj-7JXOmLw" class="hide-on-med-and-down" target="_blank" style="height: 64px;"><i class="fab fa-youtube"></i></a></li>
            <li>
                <form id="buscador" class="hide-on-med-and-down"  style="display: flex; align-items: center">
                    <a href="" style="background-color: unset; padding-right: 0;"><i class="fas fa-search"></i></a>
                    <input type="search" id="buscar" name="buscar" placeholder="{{ __('Search') }}...">
                </form>
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
            @switch(Auth::user()->nivel_id)
                @case('2')
                <li><a href="{{route('privada.index')}}" @if(\Request::is('privada')) class="activerino" @endif>{{ __('Quality Certificates') }}</a></li>
                <li><a href="{{route('privada.materiaprima')}}" @if(\Request::is('privada/materia-prima')) class="activerino" @endif>{{ __('Certificado de Materia Prima') }}</a></li>
                    @break
                @case('3')
                <li><a href="{{route('privada.index')}}" @if(\Request::is('privada')) class="activerino" @endif>{{ __('Quality Certificates') }}</a></li>
                <li><a href="{{route('privada.materiaprima')}}" @if(\Request::is('privada/materia-prima')) class="activerino" @endif>{{ __('Certificate of Raw Material') }}</a></li>
                <li><a href="{{route('privada.distribuidor')}}" @if(\Request::is('privada/distribuidor')) class="activerino" @endif>{{ __('Materials for Distributors') }}</a></li>
                    @break
                @default
                <li><a href="{{route('privada.index')}}" @if(\Request::is('privada')) class="activerino" @endif>{{ __('Quality Certificates') }}</a></li>
            @endswitch

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
<!-- cambiar url /abac -->
<ul id='dropdown1' class='dropdown-content'>
    <li><a href="{{ url('/'.'setlocale/es') }}" style="color:#eb262d;">ES</a></li>
    <li><a href="{{ url('/'.'setlocale/en') }}" style="color:#eb262d;">EN</a></li>
</ul>   

<ul class="sidenav" id="mobile-demo">
    <li><a href="{{route('herramientas')}}" @if(\Request::is('nosotros')) class="activerino" @endif>{{ __('Tools') }}</a></li>
    @switch(Auth::user()->nivel_id)
        @case('2')
        <li><a href="{{route('privada.index')}}" @if(\Request::is('privada')) class="activerino" @endif>{{ __('Quality Certificates') }}</a></li>
        <li><a href="{{route('privada.materiaprima')}}" @if(\Request::is('privada/materia-prima')) class="activerino" @endif>{{ __('Certificado de Materia Prima') }}</a></li>
        @break
        @case('3')
        <li><a href="{{route('privada.index')}}" @if(\Request::is('privada')) class="activerino" @endif>{{ __('Quality Certificates') }}</a></li>
        <li><a href="{{route('privada.materiaprima')}}" @if(\Request::is('privada/materia-prima')) class="activerino" @endif>{{ __('Certificate of Raw Material') }}</a></li>
        <li><a href="{{route('privada.distribuidor')}}" @if(\Request::is('privada/distribuidor')) class="activerino" @endif>{{ __('Materials for Distributors') }}</a></li>
        @break
        @default
        <li><a href="{{route('privada.index')}}" @if(\Request::is('privada')) class="activerino" @endif>{{ __('Quality Certificates') }}</a></li>
    @endswitch
</ul>

@push('scripts')
<script>
    M.Sidenav.init(document.querySelector('#sidenavsillo'))
    M.Dropdown.init(document.querySelector('.dropdown-trigger'))
</script>
@endpush