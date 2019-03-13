@extends('adm.dashboard')

@section('body')
<main>
	<div class="container">
        <h5 class="mb0">Crear categorias</h5>
		<div class="row mb30">
			<div class="col s12">
			{!!Form::open(['route'=>'categoria.store', 'method'=>'POST', 'files' => true])!!}
			<div class="row">

				<div class="row mt30">
					<div class="input-field col s5">
						{!!Form::label('Titulo Español')!!}
						{!!Form::text('title_es',null,['class'=>'validate'])!!}
					</div>
					<div class="input-field col s5">
						{!!Form::label('Titulo Ingles')!!}
						{!!Form::text('title_en',null,['class'=>'validate'])!!}
                    </div>
                    <div class="input-field col s2">
                            {!!Form::label('Orden')!!}
                            {!!Form::text('order', null, ['class'=>'validate', 'required'])!!}
                        </div>
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
