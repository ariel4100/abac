@extends('layouts.app')

@section('content')
<div class="container">
        <p class="">
            <a href="{{ route('contacto') }}" class="hoverino">
                < Regresar a Contacto
            </a>
        </p>
    
        @include('page.partials.title', ['title' => 'Trabaje con Nosotros'])
    
        <p class="mt30 mb20">
            Complete el siguiente formulario y nos contactaremos a la brevedad
        </p>
    
        <form action="{{ route('contacto') }}" method="POST" class="row mb70">
            @csrf
            @include('templates.success')
            <div class="row">
                <div class="input-field col l6 s12">
                    <input id="nombre" type="text" name="nombre" class="validate" required>
                    <label for="nombre">Nombre</label>
                </div>
                <div class="input-field col l6 s12">
                    <input id="apellido" type="text" name="apellido" class="validate" required>
                    <label for="apellido">Apellido</label>
                </div>
            </div>
            
            <div class="row">
                <div class="input-field col l6 s12">
                    <input id="empresa" type="text" name="empresa" class="validate datepicker" required>
                    <label for="empresa">Fecha de nacimiento</label>
                </div>
                <div class="input-field col l6 s12">
                    <input id="sexo" type="text" name="text" class="validate" required>
                    <label for="sexo">Sexo</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col l6 s12">
                    <input id="estado_civil" type="text" name="estado_civil" class="validate">
                    <label for="estado_civil">Estado Civil</label>
                </div>
                <div class="input-field col l6 s12">
                    <input id="nacionalidad" type="text" name="nacionalidad" class="validate">
                    <label for="nacionalidad">Nacionalidad</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col l6 s12">
                    <input id="direccion" type="text" name="direccion" class="validate" required>
                    <label for="direccion">Direccion</label>
                </div>
                <div class="input-field col l6 s12">
                    <input id="localidad" type="text" name="localidad" class="validate">
                    <label for="localidad">Localidad</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col l6 s12">
                    <input id="provincia" type="text" name="provincia" class="validate">
                    <label for="provincia">Provincia</label>
                </div>
                <div class="input-field col l6 s12">
                    <input id="telefono" type="text" name="telefono" class="validate">
                    <label for="telefono">Telefono</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col l6 s12">
                    <input id="email" type="email" name="email" class="validate" required>
                    <label for="email">E-Mail</label>
                </div>
                <div class="input-field col l6 s12">
                    <input id="DNI" type="number" name="DNI" class="validate" required>
                    <label for="DNI">DNI</label>
                </div>
                     <div class="file-field input-field col l6">
                    <div class="btn">
                        <span>File</span>
                        <input type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Adjuntar Archivo">
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <div class="col l12 s12">
                            <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_KEY') }}"></div>
                        </div>
                        <div class="col l12 s12">
                            <p class="mt1">
                                <label>
                                    <input type="checkbox" id="contacto_checkbox"/>
                                    <span>Acepto los términos y condiciones de privacidad</span>
                                </label>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row center">
                <button class="btn waves-effect waves-light" type="submit" style="background-color:#eb252d;">
                        Enviar
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