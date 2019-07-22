@extends('adm.dashboard')

@section('body')
    <main>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <table class="highlight bordered">
                        <thead>
                            <td>Imagen</td>
                            <td>Tipo</td>
                            <td class="text-right">Acciones</td>
                        </thead>
                        <tbody>
                        @foreach($logos as $l)
                        <tr>
                            <td><img class="slider-foto" src="{{ asset("img/logo/".$l->image) }}" height="100px"></td>
                            <td><span>{!! $l->section !!}</span></td>
                            <td class="text-right">
                                <a href="{{ route('logo.edit',$l->id) }}"><i class="material-icons">create</i></a>
                            </td>                        
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {!!$logos->render()!!}
        </div>
    </main>
@endsection