@extends('layouts.app')

@section('content')
<div class="container">
    @include('page.partials.title', ['title' => __('Tube Bend Calculation')])
@if(Auth::user()->nivel == '1')
    <p class="mt40 mb30">
        <h6>{{__('Instructions')}}:</h6>
<p style="color:#666666;" class="mt0 mb0">- {{__('All measurements will be loaded and given in mm.')}}</p>
<p style="color:#666666;" class="mt0 mb0">- {{__('In order to have an effective result in a row, you have to fill in the LENGTH and NEXT ANGLE so that the calculation can be carried out successfully.')}}</p>
<p style="color:#666666;" class="mt0 mb0">- {{__('The loaded lengths will be from the reference edge to the next vertex (intersection of both neutral lines) and from vertex to vertex in the following sections.')}}</p>
<p style="color:#666666;" class="mt0 mb0">- {{__('The length and the angle will always be loaded at the end of it. Therefore, the final section will be loaded without angle.')}}</p>
<p style="color:#666666;" class="mt0 mb0">- {{__('It is recommended to mark the lengths of the tube with a T, with the leg of the tube pointing towards the reference end. Also make a mark at the reference end.')}}</p>
<p style="color:#666666;" class="mt0 mb0">- {{__('Depending on which side of the tool the tube is inserted, the corresponding reference must be used.')}}</p>
<p style="color:#666666;" class="mt0 mb0">- {{__('RIGID tools')}}</p>
<p style="color:#666666;" class="mt0 mb0">- {{__('The bend angles of 40º are negligible in the development.')}}</p>
    </p>
    <p class="red-text mb30"> * {{__('Obligatory')}}</p>
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
            <label>{{__('Select diameter (ø) of tube')}} <span class="red-text">*</span></label>
        </div>
        <div class="input-field col s6">
            <select name="espesor">
                <option value="0,89mm">0,89mm</option>
                <option value="1,24mm">1,24mm</option>
                <option value="1,65mm">1,65mm</option>
                <option value="2,11mm">2,11mm</option>
            </select>
            <label>{{__('Enter the thickness (optional)')}}</label>
        </div>
    </div>

    <div class="row">

      <div class="" style="overflow-x: scroll">
          <table class="  highlight">
              <thead>
              <tr>
                  <th>{{__('SINCE')}}</th>
                  <th>{{__('TOWARD')}}</th>
                  <th>{{__('LENGTH (mm)')}}</th>
                  <th>{{__('NEXT ANGLE')}}</th>
                  <th></th>
                  <th>{{__('STRETCH')}}</th>
                  <th>{{__('MARK IN DEVELOPMENT')}}</th>
              </tr>
              </thead>

              <tbody>
              <tr>
                  <td>{{__('Reference end')}}</td>
                  <td>1</td>
                  <td>
                      <input type="number" placeholder="{{__('Insert length ...')}}" name="longitud_1" value="{{ request('longitud_1') }}">
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
                      <input type="number" placeholder="{{__('Insert length ...')}}" name="longitud_2" value="{{ request('longitud_2') }}">
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
                      <input type="number" placeholder="{{__('Insert length ...')}}" name="longitud_3" value="{{ request('longitud_3') }}">
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
                      <input type="number" placeholder="{{__('Insert length ...')}}" name="longitud_4" value="{{ request('longitud_4') }}">
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
                      <input type="number" placeholder="{{__('Insert length ...')}}" name="longitud_5" value="{{ request('longitud_5') }}">
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
      </div>
        <div class="row">
            @isset($data[5])
            <div class="row  " style="margin-top:20px; ">
                <a href="{{ route('doblador_tubos') }}" class="btn waves-effect waves-light"  style="background:#E1131B;">
                    {{__('Reset the search')}}
                </a>
            </div>
            <div style="display:flex; justify-content:flex-end; align-items:center;">

                <p style="color:#666666;" class="fw6">{{__('DEVELOPMENT')}}</p>
                <p style="color:#E0131A; padding: 3px 25px; border: 1px solid #666; margin-left:20px;"> {{ $data[5] }} </p>
                @endisset
            </div>
        </div>
        <div class="center">
            <button class="btn waves-effect waves-light center" type="submit" style="background:#E1131B;">{{__('Calculate')}}
            </button>
        </div>
    </form>
    </div>

@else
    <h6 class="mt30">Necesita permiso para acceder a ésta sección. <a href="{{ url('/contacto') }}" style="color: #000;">{{__('Contact')}}</a></h6>
@endif
</div>
@endsection
