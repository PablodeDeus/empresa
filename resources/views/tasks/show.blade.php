@extends('layout')

@section('content')
<div class="content">

    <div class="container-padding">

        <div class="col-md-6 col-lg-12">
            <div class="panel panel-default">
    
            <div class="panel-title">
                Detalhes da taks {{$task->id}}
            </div>
            <div class="panel-heading"><h3>{{$task->name}}</h3></div>
    
            <div class="panel-body">
                <h3>Descrição: {{$task->description}}</h3>
                <h5>Criador: {{$task->creator->nome}}</h5>     
                <h5>Responsável: {{$task->assigned->nome}}</h5>     
            </div>
    
        </div>
    </div>
</div>


@endsection