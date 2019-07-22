@extends('adm.dashboard')

@push('style')
    <style>
        .bordered tr th {
            background-color: rgba(0,0,0,0.12);
            border-left: 1px solid rgba(0,0,0,0.12);
        }
        .bordered tr td {
            border-right: 1px solid rgba(0,0,0,0.12);
        }
    </style>
@endpush

@section('body')
<main>
<div class="container" style="width: 95%">
    <p>
        <a href="{{route('producto.show', $producto->familia->id)}}"><< Volver</a>
    </p>
    <div class="row">
        <div class="col s12">

            <h5>Tabla del Producto: <b  >{{ $producto->title_es }}</b></h5>
            <table class="responsive-table">
                <thead>
                <tr>
                    <th class="center">1</th>
                    <th class="center">2</th>
                    <th class="center">3</th>
                    <th class="center">4</th>
                    <th class="center">5</th>
                    <!--<th class="center">6</th>
                    <th class="center">7</th>
                    <th class="center">8</th>
                    <th class="center">9</th>
                    <th class="center">10</th>
                    <th class="center">11</th>
                    <th class="center">12</th>
                    <th class="center">13</th>-->
                </tr>
                </thead>

                <tbody>
                    <form action="{{ route('producto.tabla.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <input type="text" name="id" value="{{ $id }}" style="display: none">
                        <tr>
                            <td class="center" >
                                <div class="" style="display: flex">
                                    <input placeholder="" type="text" name="diametro1">
                                    <input type="text" name="tipo">
                                </div>
                            </td>
                            <td class="center" style="display: flex">
                                <input placeholder="" type="text" name="diametro2">
                                <input type="text" name="tipo2">
                            </td>
                            <td class="center"><input placeholder="" type="text" name="c"></td>
                            <td class="center"><input placeholder="" type="text" name="d"></td>
                            <!--<td class="center"><input type="text" name="e"></td>-->
                            <td class="center"><input placeholder="" type="text" name="f"></td>
                            <!--<td class="center"><input type="text" name="g"></td>
                            <td class="center"><input type="text" name="h"></td>
                            <td class="center"><input type="text" name="i"></td>
                            <td class="center"><input type="text" name="j"></td>
                            <td class="center"><input type="text" name="k"></td>
                            <td class="center"><input type="text" name="l"></td>
                            <td class="center"><input type="text" name="m"></td>-->
                            <td class="center"><button type="submit" class="btn waves-effect">Crear</button></td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
        <div class="col s12">
            <table class="bordered responsive-table">
                <thead>
                <tr>
                    <th colspan="2" class="center">CONEXIONES</th>
                    <th rowspan="3" class="center">MODELO</th>
                    <th   class="center">P máx.</th>
                    <th rowspan="3" class="center">CV</th>
                    <!--<th colspan="7" class="center">DIMENSIONES (mm)</th>-->
                    <th rowspan="3" class="center"> </th>
                </tr>
                <tr>
                    <th rowspan="2" class="center">Entrada</th>
                    <th rowspan="2" class="center">Salida</th>
                    <th rowspan="2" class="center">Bar</th>
                    <!--<th rowspan="2" class="center">Psi</th>
                    <th rowspan="2" class="center">A</th>
                    <th rowspan="2" class="center">B</th>
                    <th rowspan="2" class="center">C</th>
                    <th colspan="2" class="center">Recta</th>
                    <th colspan="2" class="center">Angulo</th>-->
                </tr>
                <!--<tr>
                    <th class="center">D</th>
                    <th class="center">E</th>
                    <th class="center">D</th>
                    <th class="center">E</th>
                </tr>-->
                </thead>
            <tbody>
            <tr>
                <td class="center">1</td>
                <td class="center">2</td>
                <td class="center">3</td>
                <td class="center">4</td>
                <td class="center">5</td>
                <!--<td class="center">6</td>
                <td class="center">7</td>
                <td class="center">8</td>
                <td class="center">9</td>
                <td class="center">10</td>
                <td class="center">11</td>
                <td class="center">12</td>
                <td class="center">13</td>-->
                <td>Acciones</td>
            </tr>

            @foreach($tabla as $t)
                <form action="{{ route('producto.tabla.update',$t->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <tr>
                        <td >
                            <div class="" style="display: flex">
                                <input type="text" name="diametro1" value="{{ $t->diametro1 }}">
                                <input type="text" name="tipo" value="{{ $t->tipo }}">
                            </div>
                        </td>
                        <td style="display: flex">
                            <input type="text" name="diametro2" value="{{ $t->diametro2 }}">
                            <input type="text" name="tipo2" value="{{ $t->tipo2 }}">
                        </td>
                        <td><input type="text" name="c" value="{{ $t->c }}"></td>
                        <td><input type="text" name="d" value="{{ $t->d }}"></td>
                        <!--<td><input type="text" name="e" value="{{ $t->e }}"></td>-->
                        <td><input type="text" name="f" value="{{ $t->f }}"></td>
                    <!--<td><input type="text" name="g" value="{{ $t->g }}"></td>
                        <td><input type="text" name="h" value="{{ $t->h }}"></td>
                        <td><input type="text" name="i" value="{{ $t->i }}"></td>
                        <td><input type="text" name="j" value="{{ $t->j }}"></td>
                        <td><input type="text" name="k" value="{{ $t->k}}"></td>
                        <td><input type="text" name="l" value="{{ $t->l }}"></td>
                        <td><input type="text" name="m" value="{{ $t->m }}"></td>-->
                        <td>
                            <button type="submit" class="btn-small orange"><i class="material-icons" style="color: white;">edit</i></button>
                            <a href="{{ route('producto.tabla.eliminar',$t->id) }}" class="btn-small red"><i class="material-icons" style="color: white;">delete</i></a>
                        </td>
                    </tr>
                </form>
            @endforeach

            </tbody>
        </table>
        </div>
    </div>

</div>
</main>
@endsection
