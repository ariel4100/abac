<!DOCTYPE html>

<html>
	<style>
		body {
			font-family: Helvetica, sans-serif;
			color:#494949;
		}

		ul {
			list-style: none;
		}

		div{
			background-color: #F8F8F8;
			width: 85%;
			border-radius:20px;
			padding: 1rem 2rem;
		}
	</style>
<body>
	<div>
		<h2>ABAC</h2>
		<h3>Trabaje con nosotros</h3>
		<p>Enviado desde la web </p>
		<br>
		<h3>Datos del formulario</h3>
		<ul>
            <li><strong>Nombre y Apellido:</strong>{{ $nombre }} {{ $apellido }}</li>
			<li><strong>Nacionalidad:</strong>{{ $nacionalidad }}</li>
            <li><strong>Fecha de nacimiento:</strong>{{ $nacimiento }}</li>
			<li><strong>Sexo:</strong>{{ $sexo }}</li>
			<li><strong>Estado civil:</strong>{{ $estado }}</li>
			<li><strong>Provincia:</strong>{{ $provincia }}</li>
			<li><strong>Localidad:</strong>{{ $localidad }}</li>
			<li><strong>Dirección:</strong>{{ $direccion }}</li>
            <li><strong>Email:</strong> {{ $email }}</li>
            <li><strong>Teléfono:</strong> {{ $telefono }}</li>
			<br>
			<br>
			<h4>Sectores interesados de {{ $nombre }} :</h4>
			<p>
                @foreach($sector as $s)
				{{ $s }},
				@endforeach
            </p>
		</ul>
	</div>
</body>
</html>