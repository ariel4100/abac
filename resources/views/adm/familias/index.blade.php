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
            @foreach($familias as $f)
                <tr>

                    <td><img class="slider-foto" src="{{ asset("img/familias/".$f->image) }}" height="100px"></td>
                    <td><span>{!! $f->title_es !!}</span><br>
                        <span>{!! $f->title_en !!}</span></td>
                    <td><span class="adm-estandar">{!! $f->order !!}</span></td>
                    <td class="text-right">
                        <a href="{{ route('familia.edit',$f->id) }}"><i class="material-icons">create</i></a>
                        {!!Form::open(['class'=>'en-linea', 'route'=>['familia.destroy', $f->id], 'method' => 'DELETE'])!!}
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
    {!!$familias->render()!!}
</div>
</main>
@endsection
