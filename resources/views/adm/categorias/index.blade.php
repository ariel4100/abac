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
            @foreach($categorias as $c)
                <tr>
                    <td><span>{!! $c->title_es !!}</span><br>
                        <span>{!! $c->title_en !!}</span></td>
                    <td><span class="adm-estandar">{!! $c->order !!}</span></td>
                    <td class="text-right">
                        <a href="{{ route('categoria.edit',$c->id) }}"><i class="material-icons">create</i></a>
                        {!!Form::open(['class'=>'en-linea', 'route'=>['categoria.destroy', $c->id], 'method' => 'DELETE'])!!}
                            <button type="submit" class="submit-button">
                                <i class="material-icons red-text">cancel</i>
                            </button>
                        {!!Form::close()!!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
    {!!$categorias->render()!!}
</div>
</main>
@endsection
