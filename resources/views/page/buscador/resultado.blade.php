@extends('layouts.app')

@section('content')

    <div class="container container-fluid" style="padding-top: 5%">
        <div class="row">

            @forelse($resultado as $s)
                <a class="product-item col s12 m6 l4"  href="{{route('productos.show', ['producto' => $s->id])}}">
                    <div class="" style="border: 1px solid #dddddd;  ">
                        <div class="product-image" style="border-bottom: 0px solid #dddddd; display: flex;justify-content: center;   align-items: center;">
                            <img src="{{asset('img/productos/'.$s->image)}}" alt="{{ $s->{'title_'.App::getLocale()} }}" class="responsive-img" style="height: 200px;">
                            <div class="product-overlay">
                                <div class="icon">
                                    <i class="material-icons">add</i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="display:flex; justify-content:center; align-items:center; width:100%; padding: 5%">
                        <div class="product-description rederino center fw6">
                            {{ str_limit($s->{'title_'.App::getLocale()}, 25) }}
                        </div>
                    </div>
                </a>

            @empty
                <p>
                    No conseguimos productos relacionados a esta categoría
                </p>
            @endforelse
        </div>
    </div>
@endsection
