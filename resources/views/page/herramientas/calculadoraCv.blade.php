@extends('layouts.app')

@section('content')
 <div class="container">
     @php

         $title = [
             'tipo1' => __('Type of calculation'),
             'tipo2' => __('Type of fluid'),
             'btn' => __('calculate'),
             'title' => __('Family'),
             'title1' => __('Input'),
             'title2' => __('Output'),
             'tipo' => __('Type'),
             'diametro' => __('Diameter'),
             'todo' => __('All'),
             'presion1' => __('Pressure (P1)'),
             'presion2' => __('Pressure (P2)'),
             'p1' => __('Pressure (p1)'),
             'p2' => __('Pressure (p2)'),
             'temp' => __('Temperature'),
             'sis' => __('System fluid'),
             'peso' => __('Specific weight'),
             'unidad' => __('Unit'),
             'unidades' => __('Flow units'),
             'liquido' => __('Liquid'),
             'selec' => __('Select Family'),
             'flujo' => __('Flux'),
             'modelo' => __('Model'),
             'mensaje' => __('P1 must be greater than P2.'),
             'caudal' => __('Flow'),

         ];
         $input = [

             'input2' => __('Enter Raw Material Item'),
             'boton1' => __('Search'),
             'boton2' => __('download'),
               'label1' => __('Search'),
                 'label2' => __('Search'),
                   'label3' => __('Search'),
                     'temp' => __('Search'),

         ];
     @endphp
     @include('page.partials.title', ['title' => __('Product locator and CV calculation') ])
     <p>{{ __('Complete the parameters below') }}</p>
     <hr>
     <calculo-cv :title="{{ json_encode($title) }}"></calculo-cv>
 </div>
@endsection