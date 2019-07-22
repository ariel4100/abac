@extends('page.productos.partials.layout')

@push('style')
<style>
    p span{
        font-size: 14px !important;
        color: #666666;
    }
</style>
@endpush
@section('product')
    @php($title = explode('@', $familia->{'descripcion_'.App::getLocale()},2))
    {!! isset($title[0]) ? $title[0] : '' !!} {!! isset($title[1]) ? $title[1] : '' !!}
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
                <div style="display: flex; flex-direction: column;  width:100%;  margin-bottom: 10px; height: 50px;">
                    <div class="product-description rederino center fw6" style="    padding: 5px 0px;">
                        {{ str_limit($p->{'title_'.App::getLocale()}, 50) }}
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
