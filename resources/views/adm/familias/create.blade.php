@extends('adm.dashboard')

@section('body')
<main>
	<div class="container">
		<div class="row mb30">
			<div class="col s12">
			{!!Form::open(['route'=>'familia.store', 'method'=>'POST', 'files' => true])!!}
			<div class="row">

				<div class="row">
					<div class="file-field input-field col s8">
						<div class="btn">
								<span>Imagen</span>
								{!! Form::file('image') !!}
						</div>
						<div class="file-path-wrapper">
								{!! Form::text('',null, ['class'=>'file-path validate', 'required']) !!}
						</div>
					</div>

					<div class="input-field col s4">
						{!!Form::label('Orden')!!}
						{!!Form::text('order', null, ['class'=>'validate', 'required'])!!}
					</div>
				</div>

				<div class="row">
					<div class="input-field col s6">
						{!!Form::label('Titulo Español')!!}
						{!!Form::text('title_es',null,['class'=>'validate'])!!}
					</div>
					<div class="input-field col s6">
						{!!Form::label('Titulo Ingles')!!}
						{!!Form::text('title_en',null,['class'=>'validate'])!!}
					</div>
					<div class="input-field col s12">
						<p>Descripción Español</p>
						<textarea id="descripcion_es" name="descripcion_es" class="materialize-textarea"></textarea>
					</div>
					<div class="input-field col s12">
						<p>Descripción Ingles </p>
						<textarea id="descripcion_en"  name="descripcion_en" class="materialize-textarea"></textarea>
					</div>
					<p   class="col s12">
						<label>
							<input type="checkbox" name="buscado"  />
							<span>Es Buscado?</span>
						</label>
					</p>

				</div>

				<div class="col s12 no-padding">
					{!!Form::submit('Crear', ['class'=>'waves-effect waves-light btn right white-text'])!!}
				</div>

			</div>
			{!!Form::close()!!}
			</div>
		</div>
	</div>
</main>
@endsection
@push('scripts')
	<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
	<script>

        CKEDITOR.replace('descripcion_es');
        CKEDITOR.replace('descripcion_en');
        CKEDITOR.config.width = '100%';
	</script>
@endpush
