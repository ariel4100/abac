@extends('layouts.app')

@section('content')
{!! $maps->ruta !!}
<div class="container">
    <div class="row mt40 mb50">
        @include('page.partials.title', ['title' => __('Contact')])
        <form action="{{route('contacto')}}" method="POST">
            @csrf
            @include('templates.success')
            <div class="row mt30">
                <div class="input-field col l6 s12">
                    <input id="nombre" type="text" name="nombre" class="validate">
                    <label for="nombre">{{ __('Name') }}</label>
                </div>
                <div class="input-field col l6 s12">
                    <input id="telefono" type="number" name="telefono" class="validate">
                    <label for="telefono">{{ __('Phone') }}</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col l6 s12">
                    <input id="empresa" type="text" name="empresa" class="validate">
                    <label for="empresa">{{ __('Company') }}</label>
                </div>
                <div class="input-field col l6 s12">
                    <input id="email" type="email" name="email" class="validate">
                    <label for="email">E-Mail</label>
                </div>
            </div>
            <div class="row">
                
                <div class="input-field col l6 s12">
                    <textarea id="mensaje" style="height:6rem" name="mensaje" class="materialize-textarea" rows="5"></textarea>
                    <label for="mensaje">{{__('Message')}}</label>
                </div>
                <div class="col l6 s12">
                    <div class="row">
                        <div class="col l8 s12">
                            <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_KEY') }}"></div>
                        </div>
                        <div class="col l4 s12">
                            <p class="mt0">
                                <label>
                                    <input type="checkbox" id="contacto_checkbox"/>
                                    <span>{{ __('I accept the terms and conditions of privacy') }}</span>
                                </label>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 center">
                    <button class="btn waves-effect waves-light" type="submit" style="background-color:#eb252d;">
                        {{ __('Submit') }}
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="row mb70">
        <div class="col l6 s12">
            <div class="contacto-card">
                    <a href="{{route('contacto.personalizado')}}" class="contacto-flex-info">
                        <p class="mt0 mb0 rederino fs22">{{ __('Custom Contact') }}</p>
                        <i class="material-icons medium right" style="color:black">supervisor_account</i>
                    </a>
                <div class="bordersillo" style="height:1px"></div>
            </div>
        </div>
        <div class="col l6 s12">
            <div class="contacto-card">
                    <a href="{{route('contacto.work')}}" class="contacto-flex-info">
                        <p class="mt0 mb0 rederino fs22">{{ __('Work with us') }}</p>
                        <i class="material-icons medium right" style="color:black">work</i>
                    </a>
                <div class="bordersillo" style="height:1px"></div>
            </div>
        </div>
    </div>
</div>
@endsection