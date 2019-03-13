@extends('adm.dashboard')

@section('body')
<main>
<div class="container">
    <div class="row">
        <div class="col s12">
            <table class="highlight bordered">
            <thead>
                <td>Imagen</td>
                <td>Titulo</td>
                <td>Orden</td>
                <td class="text-right">Acciones</td>
            </thead>
            <tbody>
            @foreach($productos as $p)
                <tr>

                    <td><img class="slider-foto" src="{{ asset("img/productos/".$p->image) }}" height="100px"></td>
                    <td><span>{!! $p->title_es !!}</span><br>
                        <span>{!! $p->title_en !!}</span></td>
                    <td><span class="adm-estandar">{!! $p->order !!}</span></td>
                    <td class="text-right">
                        <a href="{{ route('producto.edit',$p->id) }}"><i class="material-icons">create</i></a>
                        {!!Form::open(['class'=>'en-linea', 'route'=>['producto.destroy', $p->id], 'method' => 'DELETE'])!!}
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
    {!!$productos->render()!!}
</div>
</main>
@endsection
