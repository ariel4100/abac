@extends('layouts.app')

@section('content')
    @include('page.productos.partials.breadcrumb')
    <div class="container">
        <div class="row">
            <div class="col l3 m12 s12">
                @include('page.productos.partials.botonera')
            </div>
            <div class="col l9 m12 s12">
                @yield('product')
            </div>
        </div>
    </div>
@endsection
