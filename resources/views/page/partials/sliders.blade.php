@isset($sliders)
<div class="slider">
    <ul class="slides">
        @foreach($sliders as $slider)
        <li>
            <img src="{{ asset('img/sliders/'.$slider->image) }}" class="responsive-img">

            @if (!($slider->{'title_'.App::getLocale()} === null))
                <div class="caption left" style="width:600px; margin-top:110px; margin-left:-100px; background-color: #eb252d;
                display:flex; justify-content:center; align-items:center;   background-blend-mode: lighten;">
                <i class="material-icons medium">keyboard_arrow_right</i>
                    <h3 class="slider-title oblique fw6 uppercase" style="padding:30px; font-stretch:condensed">
                        {!! $slider->{'title_'.App::getLocale()} !!}</h3>
                </div>
            @endif
        </li>
        @endforeach
    </ul>
</div>
@endisset
