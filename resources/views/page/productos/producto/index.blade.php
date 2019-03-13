@extends('page.productos.partials.layout')

@section('product')
    <div class="row productos mb50">
        @forelse($productos as $p)
                   <a class="product-item col s12 m6 l4"  href="{{route('productos.show', ['producto' => $p->id])}}">
                <div class="" style="border: 1px solid #dddddd;  ">
                    <div class="product-image" style="border-bottom: 0px solid #dddddd;">
                        <img src="{{asset('img/productos/'.$p->image)}}" alt="{{ $p->{'title_'.App::getLocale()} }}" class="responsive-img" style="height: 200px;">
                        <div class="product-overlay">
                            <div class="icon">
                                <i class="material-icons">add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="display:flex; justify-content:center; align-items:center; width:100%; padding: 5%">
                    <div class="product-description rederino center fw6">
                        {{ str_limit($p->{'title_'.App::getLocale()}, 25) }}
                    </div>
                </div>
            </a>
            <!--
        <div class="col l4">
            <div class="producterino">
                <div class="product-img" style="max-height: 250px; display:flex; justify-content:center; align-items:center">
                    <a href="{{route('productos.show', ['producto' => $p->id])}}" style="display:flex; justify-content:center; align-items:center">
                        <img src="{{asset('img/productos/'.$p->image)}}" alt="{{ $p->{'title_'.App::getLocale()} }}" class="responsive-img">
                    </a>
                </div>
                <div class="product-description center mt10">
                    <a href="{{route('familias.show', ['familia' => $p->id])}}" class="rederino fw6">
                        {{ $p->{'title_'.App::getLocale()} }}
                    </a>
                </div>
            </div>
        </div>--->
        @empty
            <p>No se encontraron productos para {{ $familia->{'title_'.App::getLocale()} }}</p>
        @endforelse
    </div>
@endsection
