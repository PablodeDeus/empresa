@extends('layout')

@section('content')

<div class="content">
	<div class="panel">
		{{
			Form::open([
				'route'=>'task.store',
				'method'=>'POST'
				
			])
			
		}}

			<div class="row ">
				<label for=""><h3>Nome</h3></label><br />
				<input type="text" name="name"> <br />
				@if ($errors->has('name'))
					<p class="text-danger">
						{{ $errors->first('nome')}}
					</p>
				@endif

				<label for=""><h3>Descrição</h3></label><br />
				<input type="text" name="description"> <br />
				@if ($errors->has('description'))
					<p class="text-danger">
						{{ $errors->first('description')}}
					</p>
				@endif
				
				<label for=""><h3>Criador</h3></label><br />
				{!! Form::select('id_creater', $pessoas, null, ['class' => 'form-control']) !!}

				<label for=""><h3>Responsável</h3></label><br />
				{!! Form::select('id_assigned', $pessoas, null, ['class' => 'form-control']) !!}
				
			</div>
			<div class="text-center margin-t-15">
				<button class="btn btn-primary"> Salvar </button>
			</div>
		{{Form::close()}}
	</div>
</div>
@endsection
