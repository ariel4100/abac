@extends('adm.dashboard')

@section('body')
	<main>
		<div class="container mt20 mb30">
			<div class="row mb10">
				<a href="{{route('producto.galeria',$galeria->producto_id)}}" class="right">
					<< Volver
				</a>
				<form class="col s12" style="margin-top: 10px" method="POST" action="{{ route('producto.galeria.update',$galeria->id) }}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="file-field input-field">
							<div class="btn">
								<span>Imagen</span>
								<input type="file" name="file_image">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input  id="first_name1" type="text" class="validate" name="orden" value="{{ $galeria->orden }}">
							<label for="first_name1">Orden</label>
						</div>
					</div>
					<div class="input-field col s12" style="display: none">
						<input  id="first_name1" type="text" class="validate" value="{{ $galeria->producto_id }}" name="producto_id">
					</div>
					<button class="btn waves-effect waves-light" type="submit" name="action">Submit
						<i class="material-icons right">send</i>
					</button>
				</form>
			</div>
	</main>
@endsection
@push('scripts')
@endpush