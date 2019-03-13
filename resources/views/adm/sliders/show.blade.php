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
            @foreach($sliders as $slider)
                <tr>

        <td><img class="slider-foto" src="{{ asset("img/sliders/".$slider->image) }}" height="100px"></td>
                    <td><span>{!! $slider->title_es !!}</span></td>
                    <td><span class="adm-estandar">{!! $slider->order !!}</span></td>
                    <td class="text-right">
                        <a href="{{ route('slider.edit',$slider->id) }}"><i class="material-icons">create</i></a>
                        {!!Form::open(['class'=>'en-linea', 'route'=>['slider.destroy', $slider->id], 'method' => 'DELETE'])!!}
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
    {!!$sliders->render()!!}
</div>
</main>
@endsection