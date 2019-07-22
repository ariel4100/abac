@extends('adm.dashboard')

@section('body')
<main>
    <div class="container">
        @if($section == 'descargas')

            <div class="row">
                <div class="col s12">
                    {!!Form::open(['route'=>'contenido.store', 'method'=>'POST', 'files' => true])!!}
                    <div class="row">
                        <div class="file-field input-field col s8">
                            <div class="btn">
                                <span>Imagen</span>
                                {!! Form::file('image') !!}
                            </div>
                            <div class="file-path-wrapper">
                                {!! Form::text('', null, ['class'=>'file-path validate']) !!}
                            </div>
                        </div>
                        <div class="input-field col s4">
                            {!!Form::label('Orden')!!}
                            {!!Form::text('order',null,['class'=>'validate'])!!}
                        </div>
                    </div>
                    <input type="hidden" name="type" value="imagen">
                    <input type="hidden" name="section" value="descargas">
                    <div class="row">
                        <div class="input-field col s6">
                            {!!Form::label('Titulo Español')!!}
                            {!!Form::text('title_es',null,['class'=>'validate'])!!}
                        </div>
                        <div class="input-field col s6">
                            {!!Form::label('Titulo Ingles')!!}
                            {!!Form::text('title_en',null,['class'=>'validate'])!!}
                        </div>
                    </div>

                    <div class="col s12 no-padding">
                        {!!Form::submit('Guardar', ['class'=>'waves-effect waves-light btn right'])!!}
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>

        @endif


    <div class="row">
        <div class="col s12">
            <table class="highlight bordered">
            <thead>
                <td>Titulo</td>
                <td>Imagen</td>
                <td>Orden</td>
                <td class="text-right">Acciones</td>
            </thead>
            <tbody>
            @foreach($contenido as $c)
                <tr>
                    <td>{{ $c->title_es  }}</td>
                <td><img src="{{asset('/img/contenido/'.$c->image)}}" alt="{{$c->title_es}}" style="height:100px" class="responsive-img"></td>
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