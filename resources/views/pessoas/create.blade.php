@extends('layout')

@section('content')

<div class="content">
	<div class="panel">

			{{
				Form::open(['route' => ['pessoas.store', (isset($pessoa->id) ? $pessoa->id : null)],
						'method' => 'POST',
						'class' => 'form-horizontal']), $categorias = array(['TI', 'Marketing', 'Telemarketing', 'Gestão', 'NOC', 'Desenvolvimento', 'RH'])
			}} 

			<div class="row pt-4">
				<label for=""><h3>Nome</h3></label>
				<input type="text" name="nome"> <br />
				@if ($errors->has('nome'))
					<p class="text-danger">
						{{ $errors->first('nome')}}
					</p>
				@endif
				
				<label for=""><h3>Email</h3></label><br />
				<input type="text" name="email"> <br />
				@if ($errors->has('email'))
					<p class="text-danger">
						{{ $errors->first('email')}}
					</p>
				@endif
				
				<label for=""><h3>Telefone</h3></label><br />
				<input type="text"  name="telefone"> <br />
				@if ($errors->has('telefone'))
					<p class="text-danger">
						{{ $errors->first('telefone')}}
					</p>
				@endif

				<label for=""><h3>Cargo</h3></label><br />
					{!! Form::select('cargo', $cargos, null, ['class' => 'form-control']) !!}
				</div>
			
				<label for=""><h3>Setor</h3></label>			<br>
				{{ Form::select('setor', ['TI' => 'TI', 'Marketing' => 'Marketing', 'Telemarketing' => 'Telemarketing', 'Gestão' => 'Gestão', 'NOC' => 'NOC', 'Desenvolvimento' => 'Desenvolvimento', 'RH' => 'RH'], 'TI')}}
				</div>
				<div class="text-center margin-t-15">
					<button class="btn btn-primary"> Salvar </button>
				</div>
				@if ($errors->has('cargo'))
					<p class="text-danger">
						{{ $errors->first('setor')}}
					</p>
			@endif

			{{ Form::close() }}
	</div>
</div>
@endsection
