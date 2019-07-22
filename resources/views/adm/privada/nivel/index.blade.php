@extends('adm.dashboard')

@section('body')
    <main class="container">
        <div class="row">
            <form class="col s12" action="{{ route('privadanivel.store') }}" method="post">
                @csrf
                <h5>Niveles de Clientes</h5>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="first_name" type="text" class="validate" name="nombre">
                        <label for="first_name">Nombre</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="last_name" type="text" class="validate" name="orden">
                        <label for="last_name">Orden</label>
                    </div>
                </div>
                <button type="submit" class="waves-effect waves-light btn">Cargar</button>
            </form>
        </div>

        <div class="row">
                <div class="col s12">
                    <table class="highlight bordered">
                        <thead>
                        <td>Nombre</td>
                        <td>Orden</td>
                        <td class="text-right">Acciones</td>
                        </thead>
                        <tbody>
                        @foreach($nivel as $n)
                            <tr>
                                <td>{{ $n->nombre }}</td>
                                <td>{{ $n->orden }}</td>
                                <td>
                                    <a href="{{ route('privadanivel.edit',$n->id) }}" class="btn-floating btn-small waves-effect waves-light orange"><i class="material-icons">edit</i></a>
                                    <!--<a href="{{ route('privadanivel.eliminar',$n->id) }}" class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">delete</i></a>--->
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

    </main>
@endsection


