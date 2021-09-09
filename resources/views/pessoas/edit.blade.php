@extends('layout')

@section('content')

<div class="content">
    <div class="panel">
                {{
					Form::open(['route' => ['pessoas.update', (isset($pessoa->id) ? $pessoa->id : null)],
							'method' => 'PUT',
							'class' => 'form-horizontal'])
						}} 

			<div class="row pt-4">
				<h3>Nome</h3>
                </label><br />
                <input type="text" name="nome" value="{{ $pessoa->nome}}"> <br />
				@if ($errors->has('nome'))
					<p class="text-danger">
						{{ $errors->first('nome')}}
					</p>
				@endif
                <label for="">
					<h3>Email</h3>
                </label><br />
                <input type="text" name="email" value="{{ $pessoa->email}}"> <br />
				@if ($errors->has('email'))
					<p class="text-danger">
						{{ $errors->first('email')}}
					</p>
				@endif                <label for="">
					<h3>Telefone</h3>
                </label><br />
                <input type="text" name="telefone" value="{{ $pessoa->telefone}}"> <br />
				@if ($errors->has('telefone'))
					<p class="text-danger">
						{{ $errors->first('telefone')}}
					</p>
				@endif
				{{-- <label for="">
					<h3>Cargo</h3>
                </label><br /> --}}
                {{-- <input type="text" name="cargo" placeholder="{{ $pessoa->cargo }}"> <br />
				@if ($errors->has('cargo'))
					<p class="text-danger">
						{{ $errors->first('cargo')}}
					</p>
				@endif --}}
				<div>
					<label for=""><h3>Cargo</h3></label><br />
					{!! Form::select('cargo', $cargos, null, ['class' => 'form-control']) !!}
				</div>

					{{-- <h3>Setor</h3> --}}
                {{-- </label><br />
                <input type="text" name="setor" placeholder="{{ $pessoa->setor}}"> <br /> --}}
				<label for=""><h3>Setor</h3></label>			<br>
				{{ Form::select('setor', ['TI' => 'TI', 'Marketing' => 'Marketing', 'Telemarketing' => 'Telemarketing', 'Gestão' => 'Gestão', 'NOC' => 'NOC', 'Desenvolvimento' => 'Desenvolvimento', 'RH' => 'RH'], 'TI')}}
			
				<div class="text-center margin-t-15">
					<input type='submit' class="btn btn-primary" value="Salvar" />
                </div>
				@if ($errors->has('setor'))
					<p class="text-danger">
						{{ $errors->first('setor')}}
					</p>
				@endif				
                {{ Form::close() }}
			</div>
    </div>
</div>

{{-- 
<div class="content">
<div class="panel">
	<form action="{{ route('pessoas.update', ['pessoa'=>$pessoa->id]) }}" method="PUT">
		@csrf
		<div class="row padding-t-5 ">
				<label for=""><h3>Nome</h3></label><br />
				<input type="text"  name="nome"> <br />
				<label for=""><h3>Sobrenome</h3></label><br />
				<input type="text"  name="sobrenome"> <br />
				<label for=""><h3>Idade</h3></label><br />
				<input type="text"  name="idade"> <br />
				<label for=""><h3>Escolaridade</h3></label><br />
				<input type="text" name="escolaridade"> <br />
				<label for=""><h3>Salario</h3></label><br />
				<input type="text" name="salario"> <br />
				<button><h2> Salvar </h2></button>
	   </div>

	</form>
	</div>
</div> --}}
@endsection
