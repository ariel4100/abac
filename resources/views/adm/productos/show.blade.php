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
                        <a href="{{ route('producto.edit',$p->id) }}" class="waves-effect waves-light btn-small orange right"><i class="material-icons white-text">edit</i></a>
                        {!!Form::open(['class'=>'en-linea', 'route'=>['producto.destroy', $p->id], 'method' => 'DELETE'])!!}
                            <button type="submit" class="submit-button btn-small red">
                                <i class="material-icons  white-text">cancel</i>
                            </button>
                        {!!Form::close()!!}
                        <a  href="{{ route('producto.tabla',$p->id) }}" class="  btn-small">Tabla</a>
                        <a href="{{ route('producto.edit',$p->id) }}" class="waves-effect waves-light btn-small">Galeria</a>
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
