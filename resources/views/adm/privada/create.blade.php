@extends('adm.dashboard')

@section('body')
	<main>
		<div class="container mt20 mb30">
			<div class="row mb10">
				<a href="{{route('privada.principal')}}" class="right">
					<< Volver
				</a>
				<form class="col s12" style="margin-top: 10px" method="POST" action="{{ route('privada.store') }}">
					@csrf
					@method('POST')
					<div class="row">
						<div class="input-field col s12">
							<input  id="first_name" type="text" class="validate" name="name"  >
							<label for="first_name">Nombre</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input  id="first_name1" type="text" class="validate" name="username"  >
							<label for="first_name1">Nombre de Usuario</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="email" type="email" class="validate" name="email"  >
							<label for="email">Email</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col m12">
							<input id="password" type="password" class="validate" name="password"  >
							<label for="password">Password</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col m6">
							<select name="nivel" >
								<option value="" disabled selected>Seleccionar nivel</option>
								@foreach($nivel as $n)
									<option value="{{ $n }}"  >{{ $n }}</option>
								@endforeach
							</select>
							<label for="icon_prefix">Seleccionar Nivel</label>
						</div>
						<div class="input-field col m6">

							<i class="material-icons prefix">keyboard_arrow_right</i>

							<select id="icon_prefix" class="select_all" name="distribuidor">
								<option value="" disabled selected>Seleccionar si es nivel s3</option>
								@foreach($distribuidor as $c)
									<option value = "{{ $c }}"  >{{ $c }}</option>
								@endforeach
							</select>
							<label for="icon_prefix">Seleccionar Distribuidor</label>
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