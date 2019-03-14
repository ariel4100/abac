@extends('adm.dashboard')

@section('body')
    <main>
        <div class="container">
            <div class="row">
                <form action="{{ route('privada.csv.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>CSV</span>
                            <input type="file" multiple name="csv">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Subir archivo CSV" name="csv1">
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action">CARGAR
                        <i class="material-icons right">send</i>
                    </button>
                </form>
            </div>
        </div>
    </main>
@endsection


