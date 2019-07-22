@extends('adm.dashboard')

@section('body')
<main>
<div class="container">
    <div class="row">
        <div class="col s12">
            <table class="highlight bordered">
            <thead>
                <td>Imagen</td>
                    <td>Nombre</td>
                <td>Orden</td>
                <td class="text-right">Acciones</td>
            </thead>
            <tbody>
            @forelse($calidad as $c)
                <tr>
                    <td><img src="{{ asset('img/calidad/'. $c->file_image) }}" class="responsive-img" alt=""></td>
                    <td>{{ $c->nombre_es }}</td>
                    <td>{{ $c->orden }}</td>
                    <td>
                        <a href="{{ route('contenido.calidad.edit',$c->id) }}" class="btn-floating btn-large waves-effect waves-light orange"><i class="fas fa-pencil-alt"></i></a>
                        <a onclick="return confirm('¿Realmente desea eliminar este registro?')"  href="{{ route('contenido.calidad.eliminar',$c->id) }}" class="btn-floating btn-large waves-effect waves-light deep-orange"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No existen registros</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        </div>
    </div>
</div>
</main>
@endsection