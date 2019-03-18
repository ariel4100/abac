@extends('adm.dashboard')

@section('body')
    <main>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <table class="highlight bordered">
                        <thead>
                        <th>Nombre ES</th>
                        <th>Nombre EN</th>
                        <th>Orden</th>

                        <th>Opciones</th>

                        </thead>
                        <tbody>
                        @forelse($descargas as $d)

                            <tr>
                                <td>{{ $d->nombre_es }}</td>
                                <td>{{ $d->nombre_en }}</td>
                                <td>{{ $d->orden }}</td>
                                <td>

                                    <a href="{{ route('privada.descarga.edit', $d->id) }}" class="btn-floating btn-large waves-effect waves-light orange"><i class="fas fa-pencil-alt"></i></a>

                                    <a onclick="return confirm('¿Realmente desea eliminar este registro?')"  href="{{ route('privada.descarga.eliminar',$d->id) }}" class="btn-floating btn-large waves-effect waves-light deep-orange"><i class="fas fa-trash-alt"></i></a>

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


