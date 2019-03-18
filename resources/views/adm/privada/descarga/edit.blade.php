@extends('adm.dashboard')

@section('body')
<main>
    <div class="container mt20 mb30">
            <div class="row mb10">
                <a href="{{ route('privada.descarga') }}" class="right">
                        << Volver
                    </a>
                <form method="POST"  enctype="multipart/form-data" action="{{ route('privada.descarga.update',$descarga->id) }}" class="col s12 m8 offset-m2 xl10 offset-xl1">

                    {{ csrf_field() }}
                    @method('PUT')

                    <div class="row">

                        <h5>Editar</h5>

                        <div class="divider"></div>

                        <div class="file-field input-field s12">

                            <div class="btn">

                                <span>Archivo</span>

                                <input type="file" name="file">



                            </div>

                            <div class="file-path-wrapper">

                                <input class="file-path validate" type="text"  >

                                <span class="helper-text" data-error="wrong" data-success="right">Formato aceptado: PDF</span>

                            </div>

                        </div>

                        <div class="file-field input-field s12">

                            <div class="btn">

                                <span>IMAGEN</span>

                                <input type="file" name="file_image">



                            </div>

                            <div class="file-path-wrapper">

                                <input class="file-path validate" type="text"  >

                            </div>

                        </div>
                        <div class="input-field col m8 s12">

                            <i class="material-icons prefix">keyboard_arrow_right</i>

                            <select id="icon_prefix" class="select_all" name="distribuidor">
                                @foreach($distribuidor as $c)
                                    <option value = "{{ $c }}" {{ $c == $descarga->distribuidor ? 'selected': '' }}>{{ $c }}</option>
                                @endforeach
                            </select>
                            <label for="icon_prefix">Seleccionar Cliente</label>
                        </div>

                        <div class="input-field col s6">

                            <i class="material-icons prefix">keyboard_arrow_right</i>

                            <input id="icon_prefix" type="text" class="validate" name="nombre_en"  value="{{ $descarga->nombre_es }}">

                            <label for="icon_prefix">Nombre ES</label>

                        </div>





                        <div class="input-field col s6">

                            <i class="material-icons prefix">keyboard_arrow_right</i>

                            <input id="icon_prefix" type="text" class="validate" name="nombre_es" value="{{ $descarga->nombre_en }}">

                            <label for="icon_prefix">Nombre En</label>

                        </div>


                        <div class="input-field col m6">

                            <i class="material-icons prefix">keyboard_arrow_right</i>

                            <input id="icon_prefix" type="text" class="validate" name="orden"  value="{{ $descarga->orden }}">

                            <label for="icon_prefix">Orden</label>

                        </div>



                        <div class="col s12 ">
                            <div class="right">

                                <a href="{{ route('privada.descarga') }}" class="waves-effect waves-light btn btn-color">Cancelar</a>

                                <button class="btn waves-effect waves-light btn-color" type="submit" name="action">Submit

                                    <i class="material-icons right">send</i>

                                </button>

                            </div>
                        </div>
                    </div>

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