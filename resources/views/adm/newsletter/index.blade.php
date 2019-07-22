@extends('adm.dashboard')

@section('body')
<div class="container" id="container-fluid">
    <div class="row">
        <div class="col s12">


            <h5>Newsletter</h5>
            <div class="divider"></div>
            <table class="index-table responsive-table ">
                <thead>
                <tr>
                    <th>Email</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @if($newsletter->count()>0)
                    @foreach($newsletter as $n)
                        <tr>
                            <td>{{ $n->email }}</td>
                            <td><a href=" {{  route('newsletter.eliminar', $n->id)  }} " class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">delete</i></a>
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
