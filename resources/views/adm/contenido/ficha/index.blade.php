@extends('adm.dashboard')

@section('body')
<main>
<div class="container">
    <div class="row">
        <div class="col s12">
            <table class="highlight bordered">
            <thead>
                <td>Titulo</td>
                <td>Orden</td>
                <td class="text-right">Acciones</td>
            </thead>
            <tbody>
            @foreach($contenido as $c)
                <tr>
                    <td><span>{!! $c->title_es !!}</span><br><span>{!! $c->title_en !!}</span></td>
                    <td><span class="adm-estandar">{!! $c->order !!}</span></td>
                    <td class="text-right">
                        <a href="{{ route('contenido.edit', [$section, $c->id]) }}"><i class="material-icons">create</i></a>
                        @if($c->eliminable)
                        {!!Form::open(['class'=>'en-linea', 'route'=>['contenido.destroy', $c->id], 'method' => 'DELETE'])!!}
                            <button type="submit" class="submit-button">
                                <i class="material-icons red-text">cancel</i>
                            </button>
                        {!!Form::close()!!}
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
</main>
@endsection