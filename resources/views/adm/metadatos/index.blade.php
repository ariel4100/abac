@extends('adm.dashboard')

@section('body')
<div class="container" id="container-fluid">
    <div class="row">
        <div class="col s12">


            <h5>Metadatos</h5>
            <div class="divider"></div>
            <table class="index-table responsive-table ">
                <thead>
                <tr>
                    <th>Sección</th>
                    <th>Keyword</th>
                    <th>Descripción</th>
                    <th>Opciones</th>

                </tr>
                </thead>
                <tbody>
                @if($metadatos->count()>0)
                    @foreach($metadatos as $m)
                        <tr>
                            <td>{{ $m->seccion }}</td>
                            <td>{{ $m->keyword }}</td>
                            <td>{!! $m->descripcion !!}</td>
                            <td><a href=" {{ action('adm\MetadatoController@edit', $m->id)}} " class="btn-floating btn-large waves-effect waves-light orange"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">No existen registros</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
