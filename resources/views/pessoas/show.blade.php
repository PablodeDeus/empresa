@extends('layout')
@section('content')
<div class="content">

    <div class="container-padding">
    
        <div class="panel-body">
      
            <div class="col-md-6 col-lg-12">
                <div class="panel panel-default">
      
                <div class="panel-title">
                    Detalhes da pessoa {{$pessoa->id}}
                </div>
                <div class="panel-heading"><h3>{{$pessoa->nome}}</h3></div>
      
                <div class="panel-body">
                    <h4>Email: {{$pessoa->email}}</h4>    
                    <h4>Telefone: {{$pessoa->telefone}}</h4>    
                    <h4>Cargo: {{$pessoa->cargo}}</h4>    
                    <h4>Setor: {{$pessoa->setor}}</h4>    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panel-heading"><h2> Tarefas criadas </h2></div>

<div class="container-padding">
      
    <div class="panel-body">

        @foreach($pessoa->tarefasCriadas as $tarefacriada)
        {{-- {{dd($tarefacriada->name)}} --}}
        <div class="col-md-6 col-lg-12">
            <div class="panel panel-default">
    
            <div class="panel-title">
                Detalhes da task {{$tarefacriada->id}}
            </div>
            <div class="panel-heading"><h3>{{ $tarefacriada->name }}</h3></div>
   
            <div class="panel-body"> 
                <h3>Descrição: {{ $tarefacriada->description }}</h3>    
                <h5>Criador: {{ $tarefacriada->creator->nome }}</h5> 
                <h5>Responsável: {{ $tarefacriada->assigned->nome }}</h5>    
   
            </div>
        </div>
    </div>
    @endforeach
</div>
        


<div class="panel-heading"><h2> Tarefas recebidas </h2></div>

<div class="container-padding">
      
    <div class="panel-body">

        @foreach($pessoa->tarefasRecebidas as $tarefasrecebidas)
        {{-- {{dd($tarefacriada->name)}} --}}
        <div class="col-md-6 col-lg-12">
            <div class="panel panel-default">
    
            <div class="panel-title">
                Detalhes da task {{$tarefasrecebidas->id}}
            </div>
            <div class="panel-heading"><h3>{{ $tarefasrecebidas->name }}</h3></div>
   
            <div class="panel-body"> 
                <h3>Descrição: {{ $tarefasrecebidas->description }}</h3>    
                <h5>Criador: {{ $tarefasrecebidas->creator->nome }}</h5> 
                <h5>Responsável: {{ $tarefasrecebidas->assigned->nome }}</h5>    
   
            </div>
        </div>
    </div>
    @endforeach
</div>
      
@endsection
