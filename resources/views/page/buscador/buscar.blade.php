@extends('layouts.app')

@section('content')
<div class="container">
    <form class="col s12" action="{{ route('buscar.store') }}" method="post">
        @csrf
        @method('POST')
        <div class="row mt50 mb50">
            <div class="input-field col m4" >
            </div>
            <div class="input-field col m4" >
                <i class="material-icons prefix">search</i>
                <input id="icon_prefix" type="text" class="validate" name="nombre">
                <label for="icon_prefix">Buscar </label>
            </div>
            <div class="input-field col m4" >
            </div>
            <button class="btn waves-effect waves-light"  style="background-color: #e1131b"  type="submit" name="action">Buscar</button>
        </div>
    </form>
</div>

@endsection