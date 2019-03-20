@include('adm.partials.header')
    <!-- Menu derecho -->
<div class="row">
    <div id="nav-mobile" class="side-nav fixed col m3 s4 z-depth-1" style="padding: 0; height: 100%; overflow-y: auto; position: fixed;" role="navigation">
        <div class="center">
            <img class="responsive-img hide-on-med-and-down" style="padding:10px; margin:auto;" src="{{asset('img/contenido/'.$header->image)}}">
        </div>
        <ul class="collapsible z-depth-0">
            <li class="bold">
                <a class="collapsible-header waves-effect waves-admin"><i class="material-icons">home</i>Home</a>
                <div class="collapsible-body">
                    <div><a href="{{route('slider.create', ['seccion' => 'home'])}}">Crear Slider</a></div>
                    <div><a href="{{route('slider.show', ['seccion' => 'home'])}}">Editar Sliders</a></div>
                    <div><a href="{{route('contenido.calidad.index')}}">Editar Calidad</a></div>
                    <div><a href="{{route('contenido.index', ['seccion' => 'home', 'tipo' => 'texto'])}}">Editar Contenido</a></div>
                </div>
            </li>

            <li class="bold">
                <a class="collapsible-header waves-effect waves-admin"><i class="material-icons">business_center</i>Empresa</a>
                <div class="collapsible-body">
                    <div><a href="{{route('slider.create', ['seccion' => 'empresa'])}}">Crear Slider</a></div>
                    <div><a href="{{route('slider.show', ['seccion' => 'empresa'])}}">Editar Sliders</a></div>
                    <div><a href="{{route('contenido.index', ['seccion' => 'empresa', 'tipo' => 'texto'])}}">Editar Contenido</a></div>
                    <div><a href="{{route('contenido.index', ['seccion' => 'empresa_mercados', 'tipo' => 'imagen'])}}">Editar Mercados</a></div>
                    <div><a href="{{route('contenido.create', ['seccion' => 'empresa_clientes', 'tipo' => 'imagen'])}}">Crear Clientes</a></div>
                    <div><a href="{{route('contenido.index', ['seccion' => 'empresa_clientes', 'tipo' => 'imagen'])}}">Editar Clientes</a></div>
                </div>
            </li>

            <li class="bold">
                <a class="collapsible-header waves-effect waves-admin">
                    <i class="tiny material-icons">add_shopping_cart</i>Productos
                </a>
                <div class="collapsible-body">
                    <div class=""><a href="{{route('contenido.index', ['seccion' => 'productos', 'tipo' => 'imagen'])}}">Editar Contenido</a></div>
                    <div class=""><a href="{{route('familia.create')}}">Crear Familia</a></div>
                    <div class=""><a href="{{route('familia.index')}}">Editar Familias</a></div>
                    <div class=""><a href="{{route('producto.create')}}">Crear Productos</a></div>
                    <div class=""><a href="{{route('producto.index')}}">Editar Productos</a></div>
                </div>
            </li>

            <li class="bold">
                <a class="collapsible-header waves-effect waves-admin">
                    <i class="tiny material-icons">cloud_download</i>Descargas
                </a>
                <div class="collapsible-body">
                        <div class=""><a href="{{route('contenido.index', ['seccion' => 'descargas', 'tipo' => 'imagen'])}}">Editar Contenido</a></div>
                        <div class=""><a href="{{route('contenido.create', ['seccion' => 'descargas_catalogos', 'tipo' => 'descargable'])}}">Crear Catalogos</a></div>
                        <div class=""><a href="{{route('contenido.index', ['seccion' => 'descargas_catalogos', 'tipo' => 'descargable'])}}">Editar Catalogos</a></div>
                        <div class=""><a href="{{route('contenido.create', ['seccion' => 'descargas_mm', 'tipo' => 'descargable'])}}">Crear Instrucciones de Montaje</a></div>
                        <div class=""><a href="{{route('contenido.index', ['seccion' => 'descargas_mm', 'tipo' => 'descargable'])}}">Editar Instrucciones de Montaje</a></div>
                </div>
            </li>

            <li class="bold">
                    <a class="collapsible-header waves-effect waves-admin">
                        <i class="tiny material-icons">format_paint</i>Herramientas
                    </a>
                    <div class="collapsible-body">
                            <div class=""><a href="{{route('contenido.create', ['seccion' => 'herramientas', 'tipo' => 'texto'])}}">Crear Contenido</a></div>
                            <div class=""><a href="{{route('contenido.index', ['seccion' => 'herramientas', 'tipo' => 'texto'])}}">Editar Contenido</a></div>
                    </div>
                </li>

            <li class="bold">
                <a class="collapsible-header waves-effect waves-admin">
                    <i class="tiny material-icons">check_box</i>Calidad
                </a>
                <div class="collapsible-body">
                        <div class=""><a href="{{route('contenido.index', ['seccion' => 'calidad', 'tipo' => 'imagen'])}}">Editar Imagenes</a></div>
                        <div class=""><a href="{{route('contenido.index', ['seccion' => 'calidad', 'tipo' => 'texto'])}}">Editar Contenido</a></div>
                        <div class=""><a href="{{route('contenido.create', ['seccion' => 'calidad', 'tipo' => 'descargable'])}}">Crear Certificado</a></div>
                        <div class=""><a href="{{route('contenido.index', ['seccion' => 'calidad', 'tipo' => 'descargable'])}}">Editar Certificado</a></div>
                </div>
            </li>

            <li class="bold">
                <a class="collapsible-header waves-effect waves-admin">
                    <i class="tiny material-icons">video_library</i>Videos
                </a>
                <div class="collapsible-body">
                        <div class=""><a href="{{route('contenido.create', ['seccion' => 'videos', 'tipo' => 'video'])}}">Añadir Videos</a></div>
                        <div class=""><a href="{{route('contenido.index', ['seccion' => 'videos', 'tipo' => 'video'])}}">Editar Videos</a></div>
                </div>
            </li>

            <li class="bold">
                <a class="collapsible-header waves-effect waves-admin">
                    <i class="tiny material-icons">add_location</i>Distribuidores
                </a>
                <div class="collapsible-body">
                    <div class=""><a href="{{route('contenido.index', ['seccion' => 'distribuidores', 'tipo' => 'imagen'])}}">Editar Contenido</a></div>
                        <div class=""><a href="{{route('contenido.create', ['seccion' => 'distribuidores', 'tipo' => 'texto'])}}">Añadir distribuidores</a></div>
                        <div class=""><a href="{{route('contenido.index', ['seccion' => 'distribuidores', 'tipo' => 'texto'])}}">Editar distribuidores</distribuidores></div>
                </div>
            </li>

            <li class="bold">
                <a class="collapsible-header waves-effect waves-admin">
                    <i class="tiny material-icons">announcement</i>Novedades
                </a>
                <div class="collapsible-body">
                    <div class=""><a href="{{route('categoria.create')}}">Añadir Categoria</a></div>
                    <div class=""><a href="{{route('categoria.index')}}">Editar Categorias</a></div>
                    <div class=""><a href="{{route('novedad.create')}}">Crear Novedad</a></div>
                    <div class=""><a href="{{route('novedad.index')}}">Editar Novedades</a></div>
                </div>
            </li>

            <li class="bold">
                <a class="collapsible-header waves-effect waves-admin">
                    <i class="tiny material-icons">archive</i>Contacto
                </a>
                <div class="collapsible-body">
                    <div class=""><a href="{{route('contenido.index', ['seccion' => 'contacto', 'tipo' => 'texto'])}}">Editar Contenido</a></div>
                    <div class=""><a href="{{route('contenido.create', ['seccion' => 'contacto_personalizado', 'tipo' => 'texto'])}}">Agregar Contacto Personalizado</a></div>
                    <div class=""><a href="{{route('contenido.index', ['seccion' => 'contacto_personalizado', 'tipo' => 'texto'])}}">Editar Contacto Personalizado</a></div>
                </div>
            </li>

            <li class="bold">
                <a class="collapsible-header waves-effect waves-admin">
                    <i class="tiny material-icons">view_headline</i>Datos
                </a>
                <div class="collapsible-body">
                    <div class="">
                        <a href="{{route('contenido.index', ['seccion' => 'datos', 'tipo' => 'texto'])}}">Editar Contenido</a>
                    </div>
                </div>
            </li>

            <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">collections</i>Logos</a>
                <div class="collapsible-body">
                    <div class=""><a href="{{route('contenido.create', ['seccion' => 'logo', 'tipo' => 'imagen'])}}">Crear logos</a></div>
                    <div class=""><a href="{{route('contenido.index', ['seccion' => 'logo', 'tipo' => 'imagen'])}}">Editar logos</a></div>
                </div>
            </li>
            <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">data_usage</i>Metadatos</a>
                <div class="collapsible-body">
                    <div class=""><a href="{{ action('adm\MetadatoController@index') }}">Ver Metadatos</a></div>
                </div>
            </li>
            <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">account_circle</i>Zona Privada</a>
                <div class="collapsible-body">
                    <div class=""><a href="{{route('privada.descarga.create')}}">Crear Descarga</a></div>
                    <div class=""><a href="{{route('privada.descarga')}}">Editar Descarga</a></div>
                    <div class=""><a href="{{route('privada.create')}}">Crear Cliente</a></div>
                    <div class=""><a href="{{ route('privada.principal') }}">Editar Cliente</a></div>
                    <div class=""><a href="{{ route('privada.csv') }}">Cargar CSV C.Materia Prima</a></div>
                </div>
            </li>
            @if(Auth::user()->admin_status)
            <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">account_circle</i>Cliente</a>
                <div class="collapsible-body">
                    <div class=""><a href="{{route('adm.register')}}">Crear Cliente</a></div>
                    <div class=""><a href="#!">Editar Cliente</a></div>
                    <div class=""><a href="#!">Cargar CSV C.Materia Prima</a></div>
                </div>
            </li>
            @endif

        </ul>
    </div>

        <div id="page-wrapper">
            <nav class="z-depth-0 col m9 push-m3 s8 push-s4" style="padding: 0;">
                <div class="nav-wrapper nave ">
                    <ul style="margin: 0 10%;">
                        <li>
                          <div style="font-size: 1.35rem;">{{ config('app.name', 'Quimad') }}</div>
                        </li>
                    </ul>

                    <ul class="right" style="margin: 0 2rem 0 0;">
                            <li><a class="dropdown-trigger" href="{{route('logout')}}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" data-target="dropdown1">Cerrar Sesión</a></li>
                        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display:none;">
                            @csrf
                        </form>
                    </ul>
                </div>
            </nav>
            <style>

            </style>
                <div class="col s9 push-s3 pendiente">
                    <div class="container">
                            {{-- @include('adm.templates.errors')
                            @include('adm.templates.success') --}}
                    </div>
                    @include('templates.success')
                    @yield('body')
                </div>
        </div>
    </div>

@include('adm.partials.footer')
