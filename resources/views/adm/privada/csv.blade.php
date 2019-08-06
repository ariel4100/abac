@extends('adm.dashboard')

@section('body')
    <main>
        <div class="container">
            @if ($errors->any())
                <div class="card-panel red">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color: white">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                @if(session('alert'))
                    <div class="row">
                        <div class="col s12 card-panel green lighten-4 green-text text-darken-4"  style="padding: 1%;">
                            {{ session('alert') }}
                        </div>
                    </div>
                @endif
            <div class="row">
                <form action="{{ route('privada.csv.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>CSV</span>
                            <input type="file" multiple name="csv" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Subir archivo CSV" name="csv1" required>
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


