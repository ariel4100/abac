<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión</title>
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css')}}">
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('/css/materialize.min.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/logo/'.$favicon->image) }}" type="image/png">
    <link rel="icon" href="{{ asset('img/logo/'.$favicon->image) }}" type="image/png">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">



</head>

<body style="background-color:#376FB5;">

    <main>
        <div style="margin: 100px auto; background-color: white; padding:20px; border-radius: 20px; width: 40%;">
            <div class="row">
                <div class="logo-login center" style="margin-bottom: 50px;">
                    <img class="responsive-img" src="{{ asset('img/contenido/'.$header->image) }}">
                </div>
                <div class="row">
                    @include('templates.error')
                </div>
                {!!Form::open(['route'=>'adm.login', 'method'=>'POST', 'class' => 'col s12'])!!}
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">face</i>
                            {!!Form::text('username',null,['class'=>'validate'])!!}
                            {!!Form::label('Usuario')!!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">https</i>
                            {!!Form::password('password',['class'=>'validate'])!!}
                            {!!Form::label('Contraseña')!!}
                        </div>
                    </div>

                    <a class="waves-effect waves-light btn right z-depth-2" style="padding: 0;"><input type="submit" value="Ingresar" style="width: 100%; height: 100%; padding: 0 2rem; background-color: #376FB5;"><a/>
                {!!Form::close()!!}
            </div>
        </div>
    </main>


    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('/js/materialize.min.js') }}"></script>

</body>

</html>
