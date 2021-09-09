@extends('layout')

@section('content')

<div class="content">
    <div class="panel">
        {{
			Form::open(['route' => ['task.update', (isset($data->id) ? $data->id : null)],
							'method' => 'PUT',
							'class' => 'form-horizontal'])
		}}
  		{{-- @csrf --}}
          <div class="row ">
            <label for=""><h3>Nome</h3></label><br />
            <input type="text" name="name" placeholder={{ $data->name}}> <br />
            @if ($errors->has('name'))
                <p class="text-danger">
                    {{ $errors->first('nome')}}
                </p>
            @endif

            <label for=""><h3>Descrição</h3></label><br />
            <input type="text" name="description" placeholder={{ $data->description}}> <br />
            @if ($errors->has('description'))
                <p class="text-danger">
                    {{ $errors->first('description')}}
                </p>
            @endif
            
            {{-- <label for=""><h3>Criador</h3></label><br />
            <input type="text" name="id_creater"> <br />
            @if ($errors->has('id_creater'))
                <p class="text-danger">
                    {{ $errors->first('id_creater')}}
                </p>
            @endif
            <label for=""><h3>Responsável</h3></label><br />
            <input type="text" name="id_assigned"> <br />
            @if ($errors->has('id_assigned'))
                <p class="text-danger">
                    {{ $errors->first('id_assigned')}}
                </p>
            @endif --}}
            <label for=""><h3>Criador</h3></label><br />
            {!! Form::select('id_creater', $pessoas, null, ['class' => 'form-control']) !!}

            <label for=""><h3>Responsável</h3></label><br />
            {!! Form::select('id_assigned', $pessoas, null, ['class' => 'form-control']) !!}
            
        </div>
        <div class="text-center margin-t-15">
            <button class="btn btn-primary"> Salvar </button>
        </div>
            {{ Form::close() }}

        </div>
    </div>
</div>


{{-- 
<div class="content">
	<div class="panel">
		<div class="panel-body">

<form action="{{ route('task.update', $data->id) }}" method="PUT">
@csrf
<div class="row padding-t-5 ">
    <label for="">
        <h3>Nome</h3>
    </label><br />
    <input type="text" required name="name" placeholder="{{ $data->name}}"> <br />
    <label for="">
        <h3>Descricao</h3>
    </label><br />
    <input type="text" required name="description" placeholder="{{ $data->description}}"> <br />
    <label for="">
        <h3>Criador</h3>
    </label><br />
    <input type="text" required name="id_creater" placeholder="{{ $data->id_creater}}"> <br />
    <label for="">
        <h3>Responsavel</h3>
    </label><br />
    <input type="text" name="id_assigned" placeholder="{{ $data->id_assigned }}"> <br />
    <div class="text-center margin-t-15">
        <input type='submit' class="btn btn-primary" value="Salvar" />
    </div>
</div>
</form> --}}

{{-- 
{{
    Form::open($data,['route' => ['task.update', (isset($data->id) ? $data->id : null)],
            'method' => 'PUT',
            'class' => 'form-horizontal'])
}}

{{{Form::label('nome', 'Nome da task')}}}

{{
    Form::text($data,  old('name'),[
            'placeholder' => 'Digite o nome',
            'class' => 'form-control',
            'id' => 'name',
            'required',
            'maxlength' => '150'
        ]
    )
}}


{{{Form::label('nome', 'Descricao da task')}}}

{{
    Form::text($data,  old('nome'),[
            'placeholder' => 'Digite a descricao',
            'class' => 'form-control',
            'id' => 'description',
            'required',
            'maxlength' => '150'
        ]
    )
}}


{{{Form::label('nome', 'Criador')}}}

{{
    Form::text($data,  old('nome'),[
            'placeholder' => 'Digite a criador',
            'class' => 'form-control',
            'id' => 'id_creater',
            'required',
            'maxlength' => '150'
        ]
    )
}}

{{{Form::label('nome', 'Responsavel')}}}

{{
    Form::text($data,  old('nome'),[
            'placeholder' => 'Digite a responsavel',
            'class' => 'form-control',
            'id' => 'id_assigned',
            'required',
            'maxlength' => '150'
        ]
    )
}}

{{
	Form::submit('Salvar',
    [
        'class' => 'btn btn-default'
    ]
)
}}

{{ Form::close() }} --}}



{{-- <div class="row padding-t-5 ">
					<label for=""><h3>Nome</h3></label><br />
					<input type="text" required name="name" placeholder="{{ $task->name}}"> <br />
<label for="">
    <h3>Descricao</h3>
</label><br />
<input type="text" required name="description" placeholder="{{ $task->description}}"> <br />
<label for="">
    <h3>Criador</h3>
</label><br />
<input type="text" required name="id_creater" placeholder="{{ $task->id_creater}}"> <br />
<label for="">
    <h3>Responsavel</h3>
</label><br />
<input type="text" name="id_assigned" placeholder="{{ $task->id_assigned }}"> <br />
<div class="text-center margin-t-15">
    <input type='submit' class="btn btn-primary" value="Salvar" />
</div>
</div> --}}


{{-- 
</div>
</div>
</div> --}}
@endsection