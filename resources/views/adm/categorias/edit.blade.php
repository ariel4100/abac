@extends('adm.dashboard')

@section('body')
<main>
	<div class="container">
		<div class="row mb30 mt30">
                <a href="{{route('categoria.index')}}"><< Volver</a>
			<div class="col s12">
			{!!Form::model($categoria,['route'=>['categoria.update', $categoria->id], 'method'=>'PUT', 'files' => true])!!}
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
					{!!Form::submit('Editar', ['class'=>'waves-effect waves-light btn right white-text'])!!}
				</div>

			</div>
			{!!Form::close()!!}
			</div>
		</div>
	</div>
</main>
@endsection
