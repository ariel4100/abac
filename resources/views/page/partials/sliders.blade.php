@isset($sliders)
<!--<div class="slider">
    <ul class="slides">
        @foreach($sliders as $slider)
        <li>
            <img src="{{ asset('img/sliders/'.$slider->image) }}" class="responsive-img">

            @if (!($slider->{'title_'.App::getLocale()} === null))
                <div class="caption left" style="width:700px; margin-top:50px; margin-left: 0px; background-color: rgba( 235, 37, 45,0.8);
                display:flex; justify-content:center; align-items:center;   background-blend-mode: multiply;">
                <i class="material-icons medium" style="margin-left: 40px;">keyboard_arrow_right</i>
                    <h3 class="slider-title oblique fw6 uppercase" style="padding:20px 20px 20px 0px; font-stretch:condensed">
                        {!! $slider->{'title_'.App::getLocale()} !!}</h3>
                </div>
            @endif
        </li>
        @endforeach
    </ul>
</div>--->
@push('style')
    <style>
        .cajap::before {
            mix-blend-mode: multiply;
            position: absolute;
            content: '';
            background-color: red;
        top: 0;
            left: 0;
            bottom: 0;
            right: 0;
        }
        .cajap{
            position: relative;
        /*/background-color: rgba(170, 0, 0,0.7);/*/
        /*/background-blend-mode: multiply;/*/
        }
        .slider-title{
            z-index: 1;
        }
        i.material-icons.medium{
            z-index: 1;
        }
        .cajap {
            width:700px;
            margin-top:50px;
            margin-left: 0px;
            /*background-color: rgba(170, 0, 0,0.7);*/
            display:flex;
            justify-content:center;
            align-items:center;
            background-blend-mode: multiply;
        }


        @media screen and (max-width: 1000px) {
            .cajap {
                width: auto  !important;
            }
            h4.slider-title{
                font-size: 2rem;
            }

        }

</style>
@endpush
<div class="carousel carousel-slider" style="height: 420px">
    @foreach($sliders as $slider)
        <div class="carousel-item white-text" href="#one!" style="display:flex; justify-content:start; align-items:center; background-image: url('{{ asset('img/sliders/'.$slider->image) }}'); background-position: center; background-size: cover; background-repeat: no-repeat">
                <div class=" container">
                    @if (!($slider->{'title_'.App::getLocale()} === null))
                        <div class=" ">
                            <div class="caption  cajap " style=" ">
                                <i class="material-icons medium" style="margin-left: 40px;">keyboard_arrow_right</i>
                                <h4 class="slider-title oblique fw6 uppercase " style=" padding:20px 20px 20px 0px; font-family: Roboto Condensed; letter-spacing: -0.06rem;" >
                                    {!! $slider->{'title_'.App::getLocale()} !!}</h4>
                            </div>
                        </div>
                    @endif
                </div>
        </div>
    @endforeach


</div>

@endisset
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


@endpush
