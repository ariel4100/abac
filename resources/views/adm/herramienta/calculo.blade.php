@extends('adm.dashboard')

@section('body')
<div class="container" id="container-fluid">
    <div class="row">
        <form class="col s12" action="{{ route('calculo.store') }}" method="post">
            @csrf
            <h5>Pesos Especificos</h5>
            <div class="row">
                <div class="input-field col s6">
                    <input id="first_name" type="text" class="validate" name="peso">
                    <label for="first_name">Nombre del Peso</label>
                </div>
                <div class="input-field col s6">
                    <input id="last_name" type="text" class="validate" name="valor">
                    <label for="last_name">Valor</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="disabled" type="text" name="orden" class="validate">
                    <label for="disabled">Orden</label>
                </div>
                <div class="input-field col s6">
                    <p>
                        <label style="margin-right: 30px">
                            <input name="tipo" type="radio" checked value="gas" />
                            <span>Gas</span>
                        </label>
                        <label>
                            <input name="tipo" type="radio" value="liquido" />
                            <span>Liquido</span>
                        </label>
                    </p>
                </div>
            </div>
            <button type="submit" class="waves-effect waves-light btn">Cargar</button>
        </form>
    </div>
    <br>
    <div class="row">
        <div class="col s12">
            <div class="divider"></div>
            <table class="index-table responsive-table ">
                <thead>
                <tr>
                    <th>Peso</th>
                    <th>Valor</th>
                    <th>Tipo</th>
                    <th>Opciones</th>

                </tr>
                </thead>
                <tbody>
                @if($calculo->count()>0)
                    @foreach($calculo as $m)
                        <tr>
                            <td>{{ $m->peso }}</td>
                            <td>{{ $m->valor }}</td>
                            <td>{{ $m->tipo }}</td>
                            <td><a href="{{ route('calculo.edit',$m->id) }}" class="btn-floating btn-large waves-effect waves-light orange"><i class="fas fa-pencil-alt"></i></a>
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
