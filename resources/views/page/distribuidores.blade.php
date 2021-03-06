@extends('layouts.app')

@push('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <style>
        .select-wrapper input.select-dropdown {

            display: none;

        }
        .select2-container {
            box-sizing: border-box;
            display: inline-block;
            margin: 0;
            position: relative;
            vertical-align: middle
        }
        .select2 {
            /*width: calc(100% - 45px) !important;*/
            width: 100% !important;
            /*margin-left: 45px;*/
        }

        .select2-container .select2-selection--single {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            height: 28px;
            user-select: none;
            -webkit-user-select: none
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            display: block;
            padding-left: 8px;
            padding-right: 20px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap
        }

        .select2-container .select2-selection--single .select2-selection__clear {
            position: relative
        }

        .select2-container[dir="rtl"] .select2-selection--single .select2-selection__rendered {
            padding-right: 8px;
            padding-left: 20px
        }

        .select2-container .select2-selection--multiple {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            min-height: 32px;
            user-select: none;
            -webkit-user-select: none
        }

        .select2-container .select2-selection--multiple .select2-selection__rendered {
            display: inline-block;
            overflow: hidden;
            padding-left: 8px;
            text-overflow: ellipsis;
            white-space: nowrap
        }

        .select2-container .select2-search--inline {
            float: left
        }

        .select2-container .select2-search--inline .select2-search__field {
            box-sizing: border-box;
            border: none;
            font-size: 100%;
            margin-top: 5px;
            padding: 0
        }

        .select2-container .select2-search--inline .select2-search__field::-webkit-search-cancel-button {
            -webkit-appearance: none
        }

        .select2-dropdown {
            background-color: white;
            border: 1px solid #aaa;
            border-radius: 4px;
            box-sizing: border-box;
            display: block;
            position: absolute;
            left: -100000px;
            width: 100%;
            z-index: 1051
        }

        .select2-results {
            display: block
        }

        .select2-results__options {
            list-style: none;
            margin: 0;
            padding: 0
        }

        .select2-results__option {
            padding: 6px;
            user-select: none;
            -webkit-user-select: none
        }

        .select2-results__option[aria-selected] {
            cursor: pointer
        }

        .select2-container--open .select2-dropdown {
            left: 0
        }

        .select2-container--open .select2-dropdown--above {
            border-bottom: none;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0
        }

        .select2-container--open .select2-dropdown--below {
            border-top: none;
            border-top-left-radius: 0;
            border-top-right-radius: 0
        }

        .select2-search--dropdown {
            display: block;
            padding: 4px
        }

        .select2-search--dropdown .select2-search__field {
            padding: 4px;
            width: 100%;
            box-sizing: border-box
        }

        .select2-search--dropdown .select2-search__field::-webkit-search-cancel-button {
            -webkit-appearance: none
        }

        .select2-search--dropdown.select2-search--hide {
            display: none
        }

        .select2-close-mask {
            border: 0;
            margin: 0;
            padding: 0;
            display: block;
            position: fixed;
            left: 0;
            top: 0;
            min-height: 100%;
            min-width: 100%;
            height: auto;
            width: auto;
            opacity: 0;
            z-index: 99;
            background-color: #fff;
            filter: alpha(opacity=0)
        }

        .select2-hidden-accessible {
            border: 0 !important;
            clip: rect(0 0 0 0) !important;
            height: 1px !important;
            margin: -1px !important;
            overflow: hidden !important;
            padding: 0 !important;
            position: absolute !important;
            width: 1px !important
        }

        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #aaa;
            border-radius: 4px
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 28px
        }

        .select2-container--default .select2-selection--single .select2-selection__clear {
            cursor: pointer;
            float: right;
            font-weight: bold
        }

        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            color: #999
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 26px;
            position: absolute;
            top: 1px;
            right: 1px;
            width: 20px
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #888 transparent transparent transparent;
            border-style: solid;
            border-width: 5px 4px 0 4px;
            height: 0;
            left: 50%;
            margin-left: -4px;
            margin-top: -2px;
            position: absolute;
            top: 50%;
            width: 0
        }

        .select2-container--default[dir="rtl"] .select2-selection--single .select2-selection__clear {
            float: left
        }

        .select2-container--default[dir="rtl"] .select2-selection--single .select2-selection__arrow {
            left: 1px;
            right: auto
        }

        .select2-container--default.select2-container--disabled .select2-selection--single {
            background-color: #eee;
            cursor: default
        }

        .select2-container--default.select2-container--disabled .select2-selection--single .select2-selection__clear {
            display: none
        }

        .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b {
            border-color: transparent transparent #888 transparent;
            border-width: 0 4px 5px 4px
        }

        .select2-container--default .select2-selection--multiple {
            background-color: white;
            border: 1px solid #aaa;
            border-radius: 4px;
            cursor: text
        }

        .select2-container--default .select2-selection--multiple .select2-selection__rendered {
            box-sizing: border-box;
            list-style: none;
            margin: 0;
            padding: 0 5px;
            width: 100%
        }

        .select2-container--default .select2-selection--multiple .select2-selection__placeholder {
            color: #999;
            margin-top: 5px;
            float: left
        }

        .select2-container--default .select2-selection--multiple .select2-selection__clear {
            cursor: pointer;
            float: right;
            font-weight: bold;
            margin-top: 5px;
            margin-right: 10px
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #e4e4e4;
            border: 1px solid #aaa;
            border-radius: 4px;
            cursor: default;
            float: left;
            margin-right: 5px;
            margin-top: 5px;
            padding: 0 5px
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #999;
            cursor: pointer;
            display: inline-block;
            font-weight: bold;
            margin-right: 2px
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
            color: #333
        }

        .select2-container--default[dir="rtl"] .select2-selection--multiple .select2-selection__choice, .select2-container--default[dir="rtl"] .select2-selection--multiple .select2-selection__placeholder, .select2-container--default[dir="rtl"] .select2-selection--multiple .select2-search--inline {
            float: right
        }

        .select2-container--default[dir="rtl"] .select2-selection--multiple .select2-selection__choice {
            margin-left: 5px;
            margin-right: auto
        }

        .select2-container--default[dir="rtl"] .select2-selection--multiple .select2-selection__choice__remove {
            margin-left: 2px;
            margin-right: auto
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border: solid #000 1px;
            outline: 0
        }

        .select2-container--default.select2-container--disabled .select2-selection--multiple {
            background-color: #eee;
            cursor: default
        }

        .select2-container--default.select2-container--disabled .select2-selection__choice__remove {
            display: none
        }

        .select2-container--default.select2-container--open.select2-container--above .select2-selection--single, .select2-container--default.select2-container--open.select2-container--above .select2-selection--multiple {
            border-top-left-radius: 0;
            border-top-right-radius: 0
        }

        .select2-container--default.select2-container--open.select2-container--below .select2-selection--single, .select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple {
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0
        }

        .select2-container--default .select2-search--dropdown .select2-search__field {
            border: 1px solid #aaa
        }

        .select2-container--default .select2-search--inline .select2-search__field {
            background: transparent;
            border: none;
            outline: 0;
            box-shadow: none;
            -webkit-appearance: textfield
        }

        .select2-container--default .select2-results > .select2-results__options {
            max-height: 200px;
            overflow-y: auto
        }

        .select2-container--default .select2-results__option[role=group] {
            padding: 0
        }

        .select2-container--default .select2-results__option[aria-disabled=true] {
            color: #999
        }

        .select2-container--default .select2-results__option[aria-selected=true] {
            background-color: #ddd
        }

        .select2-container--default .select2-results__option .select2-results__option {
            padding-left: 1em
        }

        .select2-container--default .select2-results__option .select2-results__option .select2-results__group {
            padding-left: 0
        }

        .select2-container--default .select2-results__option .select2-results__option .select2-results__option {
            margin-left: -1em;
            padding-left: 2em
        }

        .select2-container--default .select2-results__option .select2-results__option .select2-results__option .select2-results__option {
            margin-left: -2em;
            padding-left: 3em
        }

        .select2-container--default .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option {
            margin-left: -3em;
            padding-left: 4em
        }

        .select2-container--default .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option {
            margin-left: -4em;
            padding-left: 5em
        }

        .select2-container--default .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option {
            margin-left: -5em;
            padding-left: 6em
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #5897fb;
            color: white
        }

        .select2-container--default .select2-results__group {
            cursor: default;
            display: block;
            padding: 6px
        }

        .select2-container--classic .select2-selection--single {
            background-color: #f7f7f7;
            border: 1px solid #aaa;
            border-radius: 4px;
            outline: 0;
            background-image: -webkit-linear-gradient(top, #fff 50%, #eee 100%);
            background-image: -o-linear-gradient(top, #fff 50%, #eee 100%);
            background-image: linear-gradient(to bottom, #fff 50%, #eee 100%);
            background-repeat: repeat-x;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFFFFFFF', endColorstr='#FFEEEEEE', GradientType=0)
        }

        .select2-container--classic .select2-selection--single:focus {
            border: 1px solid #5897fb
        }

        .select2-container--classic .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 28px
        }

        .select2-container--classic .select2-selection--single .select2-selection__clear {
            cursor: pointer;
            float: right;
            font-weight: bold;
            margin-right: 10px
        }

        .select2-container--classic .select2-selection--single .select2-selection__placeholder {
            color: #999
        }

        .select2-container--classic .select2-selection--single .select2-selection__arrow {
            background-color: #ddd;
            border: none;
            border-left: 1px solid #aaa;
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
            height: 26px;
            position: absolute;
            top: 1px;
            right: 1px;
            width: 20px;
            background-image: -webkit-linear-gradient(top, #eee 50%, #ccc 100%);
            background-image: -o-linear-gradient(top, #eee 50%, #ccc 100%);
            background-image: linear-gradient(to bottom, #eee 50%, #ccc 100%);
            background-repeat: repeat-x;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFEEEEEE', endColorstr='#FFCCCCCC', GradientType=0)
        }

        .select2-container--classic .select2-selection--single .select2-selection__arrow b {
            border-color: #888 transparent transparent transparent;
            border-style: solid;
            border-width: 5px 4px 0 4px;
            height: 0;
            left: 50%;
            margin-left: -4px;
            margin-top: -2px;
            position: absolute;
            top: 50%;
            width: 0
        }

        .select2-container--classic[dir="rtl"] .select2-selection--single .select2-selection__clear {
            float: left
        }

        .select2-container--classic[dir="rtl"] .select2-selection--single .select2-selection__arrow {
            border: none;
            border-right: 1px solid #aaa;
            border-radius: 4px 0 0 4px;
            left: 1px;
            right: auto
        }

        .select2-container--classic.select2-container--open .select2-selection--single {
            border: 1px solid #5897fb
        }

        .select2-container--classic.select2-container--open .select2-selection--single .select2-selection__arrow {
            background: transparent;
            border: none
        }

        .select2-container--classic.select2-container--open .select2-selection--single .select2-selection__arrow b {
            border-color: transparent transparent #888 transparent;
            border-width: 0 4px 5px 4px
        }

        .select2-container--classic.select2-container--open.select2-container--above .select2-selection--single {
            border-top: none;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            background-image: -webkit-linear-gradient(top, #fff 0%, #eee 50%);
            background-image: -o-linear-gradient(top, #fff 0%, #eee 50%);
            background-image: linear-gradient(to bottom, #fff 0%, #eee 50%);
            background-repeat: repeat-x;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFFFFFFF', endColorstr='#FFEEEEEE', GradientType=0)
        }

        .select2-container--classic.select2-container--open.select2-container--below .select2-selection--single {
            border-bottom: none;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
            background-image: -webkit-linear-gradient(top, #eee 50%, #fff 100%);
            background-image: -o-linear-gradient(top, #eee 50%, #fff 100%);
            background-image: linear-gradient(to bottom, #eee 50%, #fff 100%);
            background-repeat: repeat-x;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFEEEEEE', endColorstr='#FFFFFFFF', GradientType=0)
        }

        .select2-container--classic .select2-selection--multiple {
            background-color: white;
            border: 1px solid #aaa;
            border-radius: 4px;
            cursor: text;
            outline: 0
        }

        .select2-container--classic .select2-selection--multiple:focus {
            border: 1px solid #5897fb
        }

        .select2-container--classic .select2-selection--multiple .select2-selection__rendered {
            list-style: none;
            margin: 0;
            padding: 0 5px
        }

        .select2-container--classic .select2-selection--multiple .select2-selection__clear {
            display: none
        }

        .select2-container--classic .select2-selection--multiple .select2-selection__choice {
            background-color: #e4e4e4;
            border: 1px solid #aaa;
            border-radius: 4px;
            cursor: default;
            float: left;
            margin-right: 5px;
            margin-top: 5px;
            padding: 0 5px
        }

        .select2-container--classic .select2-selection--multiple .select2-selection__choice__remove {
            color: #888;
            cursor: pointer;
            display: inline-block;
            font-weight: bold;
            margin-right: 2px
        }

        .select2-container--classic .select2-selection--multiple .select2-selection__choice__remove:hover {
            color: #555
        }

        .select2-container--classic[dir="rtl"] .select2-selection--multiple .select2-selection__choice {
            float: right
        }

        .select2-container--classic[dir="rtl"] .select2-selection--multiple .select2-selection__choice {
            margin-left: 5px;
            margin-right: auto
        }

        .select2-container--classic[dir="rtl"] .select2-selection--multiple .select2-selection__choice__remove {
            margin-left: 2px;
            margin-right: auto
        }

        .select2-container--classic.select2-container--open .select2-selection--multiple {
            border: 1px solid #5897fb
        }

        .select2-container--classic.select2-container--open.select2-container--above .select2-selection--multiple {
            border-top: none;
            border-top-left-radius: 0;
            border-top-right-radius: 0
        }

        .select2-container--classic.select2-container--open.select2-container--below .select2-selection--multiple {
            border-bottom: none;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0
        }

        .select2-container--classic .select2-search--dropdown .select2-search__field {
            border: 1px solid #aaa;
            outline: 0
        }

        .select2-container--classic .select2-search--inline .select2-search__field {
            outline: 0;
            box-shadow: none
        }

        .select2-container--classic .select2-dropdown {
            background-color: #fff;
            border: 1px solid transparent
        }

        .select2-container--classic .select2-dropdown--above {
            border-bottom: none
        }

        .select2-container--classic .select2-dropdown--below {
            border-top: none
        }

        .select2-container--classic .select2-results > .select2-results__options {
            max-height: 200px;
            overflow-y: auto
        }

        .select2-container--classic .select2-results__option[role=group] {
            padding: 0
        }

        .select2-container--classic .select2-results__option[aria-disabled=true] {
            color: grey
        }

        .select2-container--classic .select2-results__option--highlighted[aria-selected] {
            background-color: #3875d7;
            color: #fff
        }

        .select2-container--classic .select2-results__group {
            cursor: default;
            display: block;
            padding: 6px
        }

        .select2-container--classic.select2-container--open .select2-dropdown {
            border-color: #5897fb
        }




        .select2-container--default .select2-selection--multiple, .select2-container--default .select2-selection--single, .select2-container--default.select2-container--focus .select2-selection--multiple {
            height: 46px;
            border: none;
            border-bottom: 1px solid #9e9e9e;
            border-radius: 0;
            outline: 0
        }

        .select2-container--default .select2-selection--multiple, .select2-container--default.select2-container--focus .select2-selection--multiple {
            height: auto
        }

        .select2-container--default .select2-search--inline .select2-search__field {
            height: 30px
        }

        .select2-container--default .select2-selection--multiple input {
            margin: 0
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            border: none;
            color: #fff;
            margin-top: 8px;
            padding: 3px 10px;
            background-color: #42A5F5
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove, .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
            color: #fff;
            margin-right: 5px
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 45px;
            padding-left: 0
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: rgb(0, 0, 0) transparent transparent;
            border-width: 9px 4px 0 4px;
            margin-left: 2px;
        }

        .select2-container--open .select2-dropdown--above, .select2-container--open .select2-dropdown--below {
            border: none;
            box-shadow: 0 1px 2px rgba(0, 0, 0, .26)
        }

        .select2-results__option {
            padding: 1rem
        }

        .select2-container--default .select2-search--dropdown .select2-search__field {
            border-top: none;
            border-right: none;
            border-left: none
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected], div.tagsinput span.tag {
            background-color: #42A5F5
        }

        .select2  + label {
            position: absolute;
            top: -26px;
            font-size: 0.8rem;
        }
    </style>
    <style>
        .select2-container--default .select2-selection--single .select2-selection__rendered{
            background-color: #f8f8f8 !important;
        }
        input.select-dropdown.dropdown-trigger{
            display: none !important;
        }
        .buscar {
            width: 300px;
        }
        .centro{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        @media only screen and (max-width: 900px) {
            .buscar {
                width: auto;
            }
            .row .col {
                float: unset !important;
            }
            .centro{
                display: unset;
                justify-content: unset;
                align-items: unset;
            }
        }
    </style>
@endpush
@section('content')
<div class="container">
    <div class="row mt50 mb30">
        <div class="col l4">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s6" class="active"><a href="#test1">ARGENTINA</a></li>
                    <li class="tab col s6"><a href="#test2">{{ __('WORLD') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row distribuidores">
    <div class="container">
        <div id="test1" class="col s12 mt20">
            <div class="row" >
                <div class="col m3"></div>
                    {{--@dd($pro->unique('provincia'))--}}
                <form action="{{ route('distribuidores') }}" method="GET" class="col m6 centro"  >
                    <div class="input-field buscar">
                        <select class="select2" name="provincia"  >
                            <option value="1" disabled="disabled" selected> {{__('Search Province')}}...</option>
                            @foreach($pro->unique('provincia') as $p)
                                @if($p->provincia)
                                <option value="{{ $p->provincia }}">{{ $p->provincia }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="waves-effect btn-small right" style="background-color: #e1131b; margin: 5px">{{__('Search')}}</button>
                </form>
                <div class="col m3"></div>
                <div class="input-field col m12">
                    @foreach($provincia as $p)
                        <div class="col l4 mb30">
                            @if($p->image)
                        <div class="car d" style="padding: 10px; background-color:white; height: auto;">
                               <div class="" style="height: 200px">
                                   <h6 class="rederino"><i class="fas fa-map-marker-alt" style="font-size: 25px"></i> {{ $p->{'title_'.App::getLocale()} }}</h6>

                                   <hr style="background-color: #212121">
                                   <p style="color:black">
                                       {!! $p->{'text_'.App::getLocale()} !!}
                                   </p>
                               </div>
                                <img src="{{ asset('img/contenido/'.$p->image) }}" class="responsive-img" alt="">
                            </div>
                            @else
                                <div class="car d" style="padding: 10px; background-color:white; height: 200px;">
                                    <h6 class="rederino"><i class="fas fa-map-marker-alt" style="font-size: 25px"></i> {{ $p->{'title_'.App::getLocale()} }}</h6>

                                    <hr style="background-color: #212121">
                                    <p style="color:black">
                                        {!! $p->{'text_'.App::getLocale()} !!}
                                    </p>
                                    <img src="{{ asset('img/contenido/'.$p->image) }}" class="responsive-img" alt="">
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div id="test2" class="col s12 mt50">
            <div class="row">
                @foreach($mundo as $m)
                    <div class="col l4 mb30">
                        @if($m->image)
                              <div class="car d" style="padding: 20px; background-color:white; height: auto">

                                <div class="" style="height: 200px">
                                    <h6 class="rederino"><i class="fas fa-map-marker-alt" style="font-size: 25px"></i> {{ $m->{'title_'.App::getLocale()} }}</h6>

                                    <hr style="background-color: #212121">
                                    <p style="color:black">
                                        {!! $m->{'text_'.App::getLocale()} !!}
                                    </p>
                                </div>
                                <img src="{{ asset('img/contenido/'.$m->image) }}" class="responsive-img" alt="">
                            </div>

                        @else
                            <div class="car d" style="padding: 20px; background-color:white; height: 200px ">
                                <h6 class="rederino"><i class="fas fa-map-marker-alt" style="font-size: 25px"></i> {{ $m->{'title_'.App::getLocale()} }}</h6>

                                <hr style="background-color: #212121">
                                <p style="color:black">
                                    {!! $m->{'text_'.App::getLocale()} !!}
                                </p>
                                <img src="{{ asset('img/contenido/'.$m->image) }}" class="responsive-img" alt="">
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<!---<div class="container"  >
            <div class="row">
               <div class="col l3 center">
                    <img src=" " class="responsive-img" alt="">
                </div>
                <div class="col l9">
                    <div class="row">
                    <div class="col l4">
                            <div class="car d" style="padding: 20px; background-color:white;  ">
                                <h6 class="rederino"><i class="fas fa-map-marker-alt" style="font-size: 25px"></i> ABAC CASA CENTRAL</h6>

                                <hr style="background-color: #212121">
                                <p style="color:black">
                                    Tronador 374
                                    (B1706BAB) Haedo
                                    Tel: +54 (011) 4659-4146
                                    Fax: +54 (011) 4460-0052
                                    abac@abac.com.ar
                                    www.abac.com.ar
                                </p>
                            </div>
                        </div>
            </div>
    </div>-->
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.1/js/i18n/es.js"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.select2').select2({
            language: "es"
        });
        /*window.provincia = ['Ciudad Autónoma de Buenos Aires (CABA)','Buenos Aires','Catamarca','Córdoba','Corrientes','Entre Ríos','Jujuy','Mendoza','La Rioja','Salta','San Juan','San Luis','Santa Fe','Santiago del Estero','Tucumán','Chaco','Chubut','Formosa','Misiones','Neuquén','La Pampa','Río Negro','Santa Cruz','Tierra del Fuego'];
            html = "<option disabled selected>Buscar... </option>";
            window.provincia.forEach(function (e) {
                html += `<option>${e}</option>`;
            });
            //$("#provincia").html(html);
            $('select').formSelect();*/

        $("#provincia").on("change", function () {
            if ($(this).val())
            {
                alert($(this).val());
            }
        })

    });


    M.Tabs.init(document.querySelector('.tabs'));
</script>
@endpush