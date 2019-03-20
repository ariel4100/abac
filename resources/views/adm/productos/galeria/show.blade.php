@extends('adm.dashboard')

@section('body')
    <main>
        <div class="container">
            <h5><b>Galeria del Producto: </b> {{ $producto->title_es }}</h5>
            <a href="{{ route('producto.galeria.create',$producto->id) }}" class="waves-effect waves-light btn">Crear Nuevo</a>
            <a href="{{ route('producto.show',$producto->familia_id) }}" class="right"><< Volver</a>
            <div class="row">
                <div class="col s12">
                    <table class="highlight bordered">
                        <thead>
                        <td>Imagen</td>
                        <td>Orden</td>
                        <td class="text-right">Acciones</td>
                        </thead>
                        <tbody>
                        @forelse($galeria as $g)
                            <tr>
                                <td style="width: 150px;"><img src="{{ asset('img/galeria/'.$g->file_image) }}" class="responsive-img"></td>
                                <td >{{ $g->orden }}</td>
                                <td>
                                    <a href="{{ route('producto.galeria.edit',$g->id) }}" class="btn-floating btn waves-effect waves-light orange"><i style="font-size: 15px" class="fas fa-pencil-alt"></i></a>
                                    <a onclick="return confirm('¿Realmente desea eliminar este registro?')"  href="{{ route('producto.galeria.eliminar',$g->id) }}" class="btn-floating btn waves-effect waves-light deep-orange"><i style="font-size: 15px" class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No existen registros</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
@endsection
