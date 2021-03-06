@extends('adm.dashboard')

@section('body')
<main>

    <div class="container mt20 mb30">
            <div class="row mb10">
                <a href="{{route('usuario.principal')}}" class="right">
                        << Volver
                    </a>
                <form class="col s12" style="margin-top: 10px" method="POST" action="{{ route('usuario.update', $user->id) }}">
                @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="input-field col s12">
                            <input  id="first_name" type="text" class="validate" name="name" value="{{ $user->name }}">
                            <label for="first_name">Nombre</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input  id="first_name1" type="text" class="validate" name="username" value="{{ $user->username }}" required>
                            <label for="first_name1">Nombre de Usuario</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" name="email" value="{{ $user->email }}" required>
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m12">
                            <input id="password" type="password" class="validate" name="password" >
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m6">
                            <select name="admin_status" required >
                                <option value="" disabled selected>Seleccionar nivel</option>
                                @foreach($nivel as $key=>$n)
                                    <option value="{{ $key }}" {{ $key==$user->admin_status ? 'selected': ''  }}>{{ $n }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </form>
            </div>
        </main>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
@endpush