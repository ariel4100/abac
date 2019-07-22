@extends('adm.dashboard')

@section('body')
    <main>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <table class="highlight bordered">
                        <thead>
                        <td>nombre</td>
                        <td>Nombre de usuario</td>
                        <td>Email</td>
                        <td class="text-right">Acciones</td>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('usuario.edit',$user->id) }}" class="btn-floating btn-small waves-effect waves-light orange"><i class="material-icons">edit</i></a>
                                    <a href="{{ route('usuario.eliminar', $user->id) }}" class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">delete</i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
@endsection


