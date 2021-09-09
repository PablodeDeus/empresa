@extends('layout')

@section('content')

<div class="content">
	<div class="panel">

		{{-- <form action="{{ route('pessoas.store')}}" method="POST"> --}}
			{{
				Form::open(['route' => ['cargos.store', (isset($cargo->id) ? $cargo->id : null)],
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
							
				<label for=""><h3>Setor</h3></label>			<br>
				{{ Form::select('setor', ['TI' => 'TI', 'Marketing' => 'Marketing', 'Telemarketing' => 'Telemarketing', 'Gestão' => 'Gestão', 'NOC' => 'NOC', 'Desenvolvimento' => 'Desenvolvimento', 'RH' => 'RH'], 'TI')}}
			</div>
			<div class="text-center margin-t-15">
				<button class="btn btn-primary"> Salvar </button>
			</div>
			
	
			{{ Form::close() }}

		{{-- </form> --}}
	</div>
</div>
@endsection
