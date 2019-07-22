@extends('adm.dashboard')

@section('body')
    <main>
        <div class="container mb30">
            <div class="row">
                <div class="col s12">
                    <form method="POST"  enctype="multipart/form-data" action="{{ route('contenido.calidad.update',$calidad->id) }}" class="col s12 m8 offset-m2 xl10 offset-xl1">

                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="row">

                            <h5>Editar</h5>

                            <div class="divider"></div>
                            <div class="file-field input-field s12">

                                <div class="btn">

                                    <span>Archivo</span>

                                    <input type="file" name="pdf" >

                                </div>

                                <div class="file-path-wrapper">

                                    <input class="file-path validate" type="text" >

                                    <span class="helper-text" data-error="wrong" data-success="right">Formato aceptado: PDF</span>

                                </div>

                            </div>

                            <div class="file-field input-field s12">

                                <div class="btn">

                                    <span>IMAGEN</span>

                                    <input type="file" name="file_image">


                                </div>

                                <div class="file-path-wrapper">

                                    <input class="file-path validate" type="text">

                                </div>

                            </div>
                            <div class="input-field col s6">

                                <i class="material-icons prefix">keyboard_arrow_right</i>

                                <input id="icon_prefix" type="text" class="validate" name="nombre_es" value="{{ $calidad->nombre_es }}">

                                <label for="icon_prefix">Nombre ES</label>

                            </div>





                            <div class="input-field col s6">

                                <i class="material-icons prefix">keyboard_arrow_right</i>

                                <input id="icon_prefix" type="text" class="validate" name="nombre_en" value="{{ $calidad->nombre_en }}">

                                <label for="icon_prefix">Nombre EN</label>

                            </div>


                            <div class="input-field col s6">

                                <i class="material-icons prefix">keyboard_arrow_right</i>

                                <input id="icon_prefix" type="text" class="validate" name="orden"  value="{{ $calidad->orden }}">

                                <label for="icon_prefix">Orden</label>

                            </div>

                        </div>

                        <div class="right">

                            <a href=" {{route('contenido.calidad.index')}}" class="waves-effect waves-light btn btn-color">Cancelar</a>

                            <button class="btn waves-effect waves-light btn-color" type="submit" name="action">Submit

                                <i class="material-icons right">send</i>

                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection