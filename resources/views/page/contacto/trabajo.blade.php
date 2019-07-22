@extends('layouts.app')
@push('style')
    <style>
        @media screen and (max-width: 1000px) {
            .g-recaptcha{
                width: auto  !important;
            }

        }
    </style>
@endpush
@section('content')
<div class="container">
        <p class="">
            <a href="{{ route('contacto') }}" class="hoverino">
                < {{__('Return to Contact')}}
            </a>
        </p>
    
        @include('page.partials.title', ['title' => __('Work with us')])
    
        <p class="mt30 mb20">
            {{ __('Complete the following form and we will contact you shortly') }}
        </p>
    
        <form action="{{ route('contactowork') }}" method="POST" class="row mb70">
            @csrf
            @include('templates.success')
            <div class="row">
                <div class="input-field col l6 s12">
                    <input id="nombre" type="text" name="nombre" class="validate" required>
                    <label for="nombre">{{__('Name')}}</label>
                </div>
                <div class="input-field col l6 s12">
                    <input id="apellido" type="text" name="apellido" class="validate" required>
                    <label for="apellido">{{__('Surname')}}</label>
                </div>
            </div>
            
            <div class="row">
                <div class="input-field col l6 s12">
                    <input id="empresa" type="text" name="nacimiento" class="validate datepicker" required>
                    <label for="empresa">{{__('Birthdate')}}</label>
                </div>
                <div class="input-field col l6 s12">
                    <input id="sexo" type="text" name="sexo" class="validate" required>
                    <label for="sexo">{{__('Sex')}}</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col l6 s12">
                    <input id="estado_civil" type="text" name="estado_civil" class="validate">
                    <label for="estado_civil">{{__('Civil status')}}</label>
                </div>
                <div class="input-field col l6 s12">
                    <input id="nacionalidad" type="text" name="nacionalidad" class="validate">
                    <label for="nacionalidad">{{__('Nationality')}}</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col l6 s12">
                    <input id="direccion" type="text" name="direccion" class="validate" required>
                    <label for="direccion">{{__('Address')}}</label>
                </div>
                <div class="input-field col l6 s12">
                    <input id="localidad" type="text" name="localidad" class="validate">
                    <label for="localidad">{{__('Location')}}</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col l6 s12">
                    <input id="provincia" type="text" name="provincia" class="validate">
                    <label for="provincia">{{__('Province')}}</label>
                </div>
                <div class="input-field col l6 s12">
                    <input id="telefono" type="text" name="telefono" class="validate">
                    <label for="telefono">{{__('Phone')}}</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col l6 s12">
                    <input id="email" type="email" name="email" class="validate" required>
                    <label for="email">E-Mail</label>
                </div>
                <div class="input-field col l6 s12">
                    <input id="DNI" type="number" name="dni" class="validate" required>
                    <label for="DNI">DNI</label>
                </div>
                <div class="input-field col m6 s12">
                    <select multiple name="sector[]" required>
                        <option value="" disabled selected >{{__('Sector of Interest')}}</option>
                        @foreach($sector as $s)
                            <option value="{{ $s }}" >{{ $s }}</option>
                        @endforeach
                    </select>
                    <label>{{__('Select Sector')}}</label>
                </div>
                <div class="file-field input-field col m6 s12">
                    <div class="btn" style="background-color:#eb252d;">
                        <span>{{__('Archive')}}</span>
                        <input type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" >
                    </div>
                </div>
                <div class="row ">
                    <div class="col m6 s12 ">
                        <div class="g-recaptcha right" data-sitekey="{{ env('RECAPTCHA_KEY') }}"></div>
                    </div>
                    <div class="col m6 s12">
                        <p class="mt1">
                            <label>
                                <input type="checkbox" id="contacto_checkbox"/>
                                <span>{{__('I accept the terms and conditions of privacy')}}</span>
                            </label>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row center mt20">
                <button class="btn waves-effect waves-light" type="submit" style="background-color:#eb252d;">
                        {{__('Submit')}}
                        <i class="material-icons right">send</i>
                </button>
            </div>
        </form>

    </div>
@endsection

@push('scripts')
<script>


    M.Datepicker.init(document.querySelector('.datepicker'), {
            firstDay: true,
            format: 'dd / mm / yyyy',
            i18n: {
                months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"],
                weekdays: ["Domingo","Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
                weekdaysShort: ["Dom","Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                weekdaysAbbrev: ["D","L", "M", "M", "J", "V", "S"],
                cancel:'Cancelar',
                clear:'Limpiar',
                done:'Listo'
            },
            maxDate: new Date(),
            yearRange: [1900, 2019]
    })
</script>
@endpush