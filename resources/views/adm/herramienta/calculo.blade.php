@extends('adm.dashboard')
@push('style')
    <style>
        .tabs .tab a{
            color:#000;
        } /*Black color to the text*/

        .tabs .tab a:hover {
            background-color:#eee;
            color:#000;
        } /*Text color on hover*/

        .tabs .tab a.active {

            color:#000;
        } /*Background and text color when a tab is active*/

        .tabs .indicator {
            background-color:#000;
        } /
    </style>
@endpush
@section('body')

    <ul class="tabs tabs-fixed-width " style="width: 70%">
        <li class="tab"><a class="active" href="#test2">Tipo de Conexiones</a></li>
        <li class="tab"><a href="#test1">Pesos Especificos</a></li>
    </ul>
    <!-----TEST1------>
    <div id="test1" class="col s12">

        <div class="container" id="container-fluid">
            <div class="row">
                <form class="col s12" action="{{ route('calculo.store') }}" method="post">
                    @csrf
                    <h5>Pesos Especificos</h5>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="Español" type="text" class="validate" name="peso">
                            <label for="Español">Nombre del Peso Español</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="Ingles" type="text" class="validate" name="peso_en">
                            <label for="Ingles">Nombre del Peso Ingles</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="last_name" type="text" class="validate" name="valor">
                            <label for="last_name">Valor</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="disabled" type="text" name="orden" class="validate">
                            <label for="disabled">Orden</label>
                        </div>
                    </div>
                    <div class="row">
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
                            <th>Nombre</th>
                            <th>Valor</th>
                            <th>Tipo</th>
                            <th>Opciones</th>

                        </tr>
                        </thead>
                        <tbody>
                        @if($calculo->count()>0)
                            @foreach($calculo as $m)
                                <tr>
                                    <td>{{ $m->peso }} <br> {{ $m->peso_en }}</td>
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
    </div>
    <!-----TEST2------>
    <div id="test2" class="col s12">
        <div class="container" id="container-fluid">
            <div class="row">
                <div class="col s12">
                    <ul class="tabs tabs-fixed-width">

                        <li class="tab col s3"><a href="#test3">Diametro</a></li>
                        <li class="tab col s3"><a href="#test4">Tipo</a></li>
                    </ul>
                </div>

                <div id="test3" class="col s12">
                    <div class="row">
                        <form class="col s12" action="{{ route('conexion.store') }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="Diametro" type="text" class="validate" name="diametro">
                                    <label for="Diametro">Diametro</label>
                                </div>

                                <!--<div class="input-field col s6">
                                    <select name="tipo" class="validate">
                                        <option value="" disabled selected>Elegi una opción</option>
                                        @foreach($tipo as $t)
                                            <option value="{{ $t }}">{{ ucwords($t) }}</option>
                                        @endforeach
                                    </select>
                                    <label>Seleccionar Tipo</label>
                                </div>--->
                                <div class="input-field col s6">
                                    <input id="Orden" type="text" name="orden" class="validate">
                                    <label for="Orden">Orden</label>
                                </div>
                            </div>
                            <div class="row">

                                <div class="input-field col s6">
                                    <p>
                                        <!--<label style="margin-right: 30px">
                                            <input name="conexion" type="radio" checked value="entrada" />
                                            <span>Entrada</span>
                                        </label>
                                        <label>
                                            <input name="tipo" type="radio" value="salida" />
                                            <span>Salida</span>
                                        </label>-->
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
                                    <th>Diametro</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($conexion->count()>0)
                                    @foreach($conexion as $c)
                                        <tr>
                                            <td>{{ $c->diametro }}</td>
                                            <td><a href="{{ route('conexion.edit',$c->id) }}" class="btn-floating btn-large waves-effect waves-light orange"><i class="fas fa-pencil-alt"></i></a>
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
                <div id="test4" class="col s12">
                    <div class="row">
                        <form class="col s12" action="{{ route('conexion.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <!--<div class="input-field col s6">
                                    <input id="Diametro" type="text" class="validate" name="diametro">
                                    <label for="Diametro">Diametro</label>
                                </div>-->

                                <div class="input-field col s6">
                                    <input id="tipo" type="text" name="tipo" class="validate">
                                    <label for="tipo">Tipo</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="Orden" type="text" name="orden" class="validate">
                                    <label for="Orden">Orden</label>
                                </div>
                            </div>
                            <div class="row">

                                <div class="input-field col s6">
                                    <p>
                                        <!--<label style="margin-right: 30px">
                                            <input name="conexion" type="radio" checked value="entrada" />
                                            <span>Entrada</span>
                                        </label>
                                         <label>
                                            <input name="tipo" type="radio" value="salida" />
                                            <span>Salida</span>
                                        </label>-->
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
                                    <th>Tipo</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($conexiontipo->count()>0)
                                    @foreach($conexiontipo as $c)
                                        <tr>
                                            <td>{{ ucwords($c->tipo) }}</td>
                                            <td><a href="{{ route('conexion.edit',$c->id) }}" class="btn-floating btn-large waves-effect waves-light orange"><i class="fas fa-pencil-alt"></i></a>
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
            </div>

        </div>
    </div>

@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $('.tabs').tabs();
        });
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
@endpush