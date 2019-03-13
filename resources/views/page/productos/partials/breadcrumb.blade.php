    <div class="container mb30" style="display:flex; flex-direction:column; justifiy-content:center; align-items:center;">
        <img src="{{asset('img/contenido/'.$contenido->image)}}" class="responsive-img" alt="Productos">
        <div class="row breadcrumbsillo mt0" style="padding:0 20px; display:flex;">
            <p style="margin-right:5px;">
                <a href="{{route('productos')}}" class="dark-grayerino fw6">Productos</a>
            </p>
            @isset($productos)
                <p style="margin-right:5px; margin-top:15px">|</p>
                <p>
                    <a href="{{route('familias.show', $familia->id)}}" class="dark-grayerino breadcrumb-hover fw6">
                        {{$familia->{'title_'.App::getLocale()} }}
                    </a>
                </p>
            @endisset
            @isset($producto)
                <p style="margin-left:5px; margin-right:5px; margin-top:15px">|</p>
                <p>
                    <a href="{{route('producto.show', $familia->id)}}" class="dark-grayerino breadcrumb-hover fw6">
                        {{$producto->{'title_'.App::getLocale()} }}
                    </a>
                </p>
            @endisset
        </div>
    </div>
