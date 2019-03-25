@extends('layouts.app')

@section('content')
 <div class="container">
     @include('page.partials.title', ['title' => __('Calculo del CV') ])
     <p>Complete los parametros a continuacion</p>
     <hr>
     <calculo-cv></calculo-cv>
 </div>
@endsection