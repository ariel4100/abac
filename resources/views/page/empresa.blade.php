@extends('layouts.app')

@section('content')
    @include('page.partials.sliders')
    <div class="container">
        <div class="row mt30 mb30">
            <div class="col l6">
                @include('page.partials.title', ['title' => $empresa[0]->{'title_'.App::getLocale()} ])
                {!! $empresa[0]->{'text_'.App::getLocale()} !!}
            </div>
            <div class="col l6">
            <img src="{{asset('img/contenido/'.$empresa[0]->image)}}" class="responsive-img" alt="{{ $empresa[0]->{'title_'.App::getLocale()} }}">
            </div>
        </div>
        <div class="row center">
            <h5 class="rederino oblique">{{ $empresa[1]->{'title_'.App::getLocale()} }}</h5>
            {!! $empresa[1]->{'text_'.App::getLocale()} !!}
            <div class="container">
                <div class="row mt30 mb10">
                @foreach($mercados as $m)
                    <div class="col l3 m6 s12 mb20">
                        <img src="{{asset('img/contenido/'.$m->image)}}">
                    </div>
                @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col l6">
                <h5 class="rederino oblique">{{ $empresa[2]->{'title_'.App::getLocale()} }}</h5>
                {!! $empresa[2]->{'text_'.App::getLocale()} !!}
            </div>
            <div class="col l6">
                <h5 class="rederino oblique">{{ $empresa[3]->{'title_'.App::getLocale()} }}</h5>
                {!! $empresa[3]->{'text_'.App::getLocale()} !!}
            </div>
        </div>
    </div>
    <div >
        <h4 class="rederino oblique center">{{ __('Main customers') }}</h4>
        <div class="container">
            <div class="clientes-images" style="display: flex; justify-content: center; align-items: center; margin-top:40px; margin-bottom: 40px">
                @foreach($clientes as $c)
                    <div class="cliente-img" style="display: flex; justify-content: center; align-items: center;">
                        <img src="{{ asset('img/contenido/'.$c->image) }}" alt="img" class="">
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection

@push('scripts')
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
M.Slider.init(document.querySelector('.slider'), {height: 420});

$('.clientes-images').slick({
  infinite: true,
  slidesToShow: 5,
  slidesToScroll: 3
});

</script>    
@endpush