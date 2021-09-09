@extends('layout')
@section('content')
<div class="content">

    <div class="container-padding">
    
        <div class="panel-body">
      
            <div class="col-md-6 col-lg-12">
                <div class="panel panel-default">
      
                <div class="panel-title">
                    Cargo {{$cargo->id_cargo}}
                </div>
                <div class="panel-heading"><h3>{{$cargo->nome}}</h3></div>
      
                <div class="panel-body">
                    <h4>Setor: {{$cargo->setor}}</h4>    
                </div>
            </div>
        </div>
    </div>
</div>

      
@endsection
