@extends('layouts.app')

@section('content')
<div class="container mt50">
    @include('page.partials.title', ['title' => 'Cálculo de Doblado de Tubos'])

    <p class="mt40 mb30">
        <h6>Instrucciones:</h6>
<p style="color:#666666;" class="mt0 mb0">- Todas las medidas serán cargadas y dadas en mm.</p>
<p style="color:#666666;" class="mt0 mb0">- Para poder tener un resultado efectivo en una fila, tiene que llenar la LONGITUD y ANGULO SIGUIENTE para que el calculo se pueda realizar con exito.</p>
<p style="color:#666666;" class="mt0 mb0">- Las longitudes cargadas serán desde el borde de referencia hasta el siguiente vértice (intersección de ambas líneas neutrales) y de vértice a vértice en los tramos siguientes.</p>
<p style="color:#666666;" class="mt0 mb0">- Siempre se cargará la longitud y el ángulo al final de la misma. Por lo cual, el tramo final se cargará sin ángulo.</p>
<p style="color:#666666;" class="mt0 mb0">- Se recomienda marcar las longitudes del tubo con una “T”, con la pata de la misma apuntando hacia el extremo de referencia. Realizar tambien una marca en el extremo de referencia.</p>
<p style="color:#666666;" class="mt0 mb0">- Según de que lado de la herramienta se ingrese el tubo, se deberá usar la referencia correspondiente.</p>
<p style="color:#666666;" class="mt0 mb0">- Herramientas RIGID</p>
<p style="color:#666666;" class="mt0 mb0">- Los ángulos de doblado de 40º son despreciables en el desarrollo.</p>
    </p>
    <p class="red-text mb30"> * Obligatorio</p>
<form action="" class="mb70">
    <div class="row">
        <div class="input-field col s6">
            <select name="tubo">
                <option value="1/4" selected>1/4</option>
                <option value="3/8" >3/8</option>
                <option value="1/2">1/2</option>
                <option value="6mm">6mm</option>
                <option value="8mm">8mm, 10mm</option>
                <option value="12mm">12mm</option>
            </select>
            <label>Seleccionar diámetro (ø) de tubo <span class="red-text">*</span></label>
        </div>
        <div class="input-field col s6">
            <select name="espesor">
                <option value="0,89mm">0,89mm</option>
                <option value="1,24mm">1,24mm</option>
                <option value="1,65mm">1,65mm</option>
                <option value="2,11mm">2,11mm</option>
            </select>
            <label>Ingrese el espesor (opcional)</label>
        </div>
    </div>

    <div class="row">

      <table class="responsive-table highlight">
            <thead>
                <tr>
                    <th>DESDE</th>
                    <th>HACIA</th>
                    <th>LONGITUD (mm)</th>
                    <th>ÁNGULO SIGUIENTE</th>
                    <th></th>
                    <th>TRAMO</th>
                    <th>MARCA EN DESARROLLO</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Extremo de referencia</td>
                    <td>1</td>
                    <td>
                        <input type="text" placeholder="Inserte longitud..." name="longitud_1" value="{{ request('longitud_1') }}">
                    </td>
                    <td>
                        <select name="angulo_1">
                            <option value="40" {{ request('angulo_1') == 40 ? 'selected' : '' }}>40</option>
                            <option value="45" {{ request('angulo_1') == 45 ? 'selected' : '' }}>45</option>
                            <option value="50" {{ request('angulo_1') == 50 ? 'selected' : '' }}>50</option>
                            <option value="55" {{ request('angulo_1') == 55 ? 'selected' : '' }}>55</option>
                            <option value="60" {{ request('angulo_1') == 60 ? 'selected' : '' }}>60</option>
                            <option value="65" {{ request('angulo_1') == 65 ? 'selected' : '' }}>65</option>
                            <option value="70" {{ request('angulo_1') == 70 ? 'selected' : '' }}>70</option>
                            <option value="75" {{ request('angulo_1') == 75 ? 'selected' : '' }}>75</option>
                            <option value="80" {{ request('angulo_1') == 80 ? 'selected' : '' }}>80</option>
                            <option value="85" {{ request('angulo_1') == 85 ? 'selected' : '' }}>85</option>
                            <option value="90" {{ request('angulo_1') == 90 ? 'selected' : '' }}>90</option>
                        </select>
                    </td>
                    <td style="padding:0 50px; padding-right:20px;">
                        <img src="{{ asset('img/arrow.png') }}" alt="">
                    </td>
                    <td>@isset($data[0]) {{ $data[0]['tramo'] }} @endisset</td>
                    <td>@isset($data[0]) {{ $data[0]['desarrollo'] }} @endisset</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>
                        <input type="text" placeholder="Inserte longitud..." name="longitud_2" value="{{ request('longitud_2') }}">
                    </td>
                    <td>
                        <select name="angulo_2">
                            <option disabled selected></option>
                            <option value="40" {{ request('angulo_2') == 40 ? 'selected' : '' }}>40</option>
                            <option value="45" {{ request('angulo_2') == 45 ? 'selected' : '' }}>45</option>
                            <option value="50" {{ request('angulo_2') == 50 ? 'selected' : '' }}>50</option>
                            <option value="55" {{ request('angulo_2') == 55 ? 'selected' : '' }}>55</option>
                            <option value="60" {{ request('angulo_2') == 60 ? 'selected' : '' }}>60</option>
                            <option value="65" {{ request('angulo_2') == 65 ? 'selected' : '' }}>65</option>
                            <option value="70" {{ request('angulo_2') == 70 ? 'selected' : '' }}>70</option>
                            <option value="75" {{ request('angulo_2') == 75 ? 'selected' : '' }}>75</option>
                            <option value="80" {{ request('angulo_2') == 80 ? 'selected' : '' }}>80</option>
                            <option value="85" {{ request('angulo_2') == 85 ? 'selected' : '' }}>85</option>
                            <option value="90" {{ request('angulo_2') == 90 ? 'selected' : '' }}>90</option>
                        </select>
                    </td>
                    <td style="padding:0 50px; padding-right:20px;">
                        <img src="{{ asset('img/arrow.png') }}" alt="">
                    </td>
                    <td>@isset($data[1]) {{ $data[1]['tramo'] }} @endisset</td>
                    <td>@isset($data[1]) {{ $data[1]['desarrollo'] }} @endisset</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>3</td>
                    <td>
                    <input type="text" placeholder="Inserte longitud..." name="longitud_3" value="{{ request('longitud_3') }}">
                    </td>
                    <td>
                        <select name="angulo_3">
                            <option value="" disabled selected></option>
                            <option value="40" {{ request('angulo_3') == 40 ? 'selected' : '' }}>40</option>
                            <option value="45" {{ request('angulo_3') == 45 ? 'selected' : '' }}>45</option>
                            <option value="50" {{ request('angulo_3') == 50 ? 'selected' : '' }}>50</option>
                            <option value="55" {{ request('angulo_3') == 55 ? 'selected' : '' }}>55</option>
                            <option value="60" {{ request('angulo_3') == 60 ? 'selected' : '' }}>60</option>
                            <option value="65" {{ request('angulo_3') == 65 ? 'selected' : '' }}>65</option>
                            <option value="70" {{ request('angulo_3') == 70 ? 'selected' : '' }}>70</option>
                            <option value="75" {{ request('angulo_3') == 75 ? 'selected' : '' }}>75</option>
                            <option value="80" {{ request('angulo_3') == 80 ? 'selected' : '' }}>80</option>
                            <option value="85" {{ request('angulo_3') == 85 ? 'selected' : '' }}>85</option>
                            <option value="90" {{ request('angulo_3') == 90 ? 'selected' : '' }}>90</option>
                        </select>
                    </td>
                    <td style="padding:0 50px; padding-right:20px;">
                        <img src="{{ asset('img/arrow.png') }}" alt="">
                    </td>
                    <td>@isset($data[2]) {{ $data[2]['tramo'] }} @endisset</td>
                    <td>@isset($data[2]) {{ $data[2]['desarrollo'] }} @endisset</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>4</td>
                    <td>
                    <input type="text" placeholder="Inserte longitud..." name="longitud_4" value="{{ request('longitud_4') }}">
                    </td>
                    <td>
                        <select name="angulo_4">
                            <option value=""  disabled selected></option>
                            <option value="40" {{ request('angulo_4') == 40 ? 'selected' : '' }}>40</option>
                            <option value="45" {{ request('angulo_4') == 45 ? 'selected' : '' }}>45</option>
                            <option value="50" {{ request('angulo_4') == 50 ? 'selected' : '' }}>50</option>
                            <option value="55" {{ request('angulo_4') == 55 ? 'selected' : '' }}>55</option>
                            <option value="60" {{ request('angulo_4') == 60 ? 'selected' : '' }}>60</option>
                            <option value="65" {{ request('angulo_4') == 65 ? 'selected' : '' }}>65</option>
                            <option value="70" {{ request('angulo_4') == 70 ? 'selected' : '' }}>70</option>
                            <option value="75" {{ request('angulo_4') == 75 ? 'selected' : '' }}>75</option>
                            <option value="80" {{ request('angulo_4') == 80 ? 'selected' : '' }}>80</option>
                            <option value="85" {{ request('angulo_4') == 85 ? 'selected' : '' }}>85</option>
                            <option value="90" {{ request('angulo_4') == 90 ? 'selected' : '' }}>90</option>
                        </select>
                    </td>
                    <td style="padding:0 50px; padding-right:20px;">
                        <img src="{{ asset('img/arrow.png') }}" alt="">
                    </td>
                    <td>@isset($data[3]) {{ $data[3]['tramo'] }} @endisset</td>
                    <td>@isset($data[3]) {{ $data[3]['desarrollo'] }} @endisset</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>5</td>
                    <td>
                    <input type="text" placeholder="Inserte longitud..." name="longitud_5" value="{{ request('longitud_5') }}">
                    </td>
                    <td>
                        <select name="angulo_5">
                            <option value=""  disabled selected></option>
                            <option value="40" {{ request('angulo_5') == 40 ? 'selected' : '' }}>40</option>
                            <option value="45" {{ request('angulo_5') == 45 ? 'selected' : '' }}>45</option>
                            <option value="50" {{ request('angulo_5') == 50 ? 'selected' : '' }}>50</option>
                            <option value="55" {{ request('angulo_5') == 55 ? 'selected' : '' }}>55</option>
                            <option value="60" {{ request('angulo_5') == 60 ? 'selected' : '' }}>60</option>
                            <option value="65" {{ request('angulo_5') == 65 ? 'selected' : '' }}>65</option>
                            <option value="70" {{ request('angulo_5') == 70 ? 'selected' : '' }}>70</option>
                            <option value="75" {{ request('angulo_5') == 75 ? 'selected' : '' }}>75</option>
                            <option value="80" {{ request('angulo_5') == 80 ? 'selected' : '' }}>80</option>
                            <option value="85" {{ request('angulo_5') == 85 ? 'selected' : '' }}>85</option>
                            <option value="90" {{ request('angulo_5') == 90 ? 'selected' : '' }}>90</option>
                        </select>
                    </td>
                    <td style="padding:0 50px; padding-right:20px;">
                        <img src="{{ asset('img/arrow.png') }}" alt="">
                    </td>
                    <td>@isset($data[4]) {{ $data[4]['tramo'] }} @endisset</td>
                    <td>@isset($data[4]) {{ $data[4]['desarrollo'] }} @endisset</td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            @isset($data[5])
            <div class="left" style="margin-top:20px; ">

                <a href="{{ route('doblador_tubos') }}" class="alverino" >
                    Resetear la busqueda
                </a>
            </div>
            <div style="display:flex; justify-content:flex-end; align-items:center;">

                <p style="color:#666666;" class="fw6">DESARROLLO</p>
                <p style="color:#E0131A; padding: 3px 25px; border: 1px solid #666; margin-left:20px;"> {{ $data[5] }} </p>
                @endisset
            </div>
        </div>
        <div class="center">
            <button class="btn waves-effect waves-light center" type="submit" style="background:#E1131B;">Calcular
            </button>
        </div>
    </form>
    </div>
</div>
@endsection
