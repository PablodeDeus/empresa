@extends('layout')

@section('content')
    <div class="content">
        <div class="panel">
            <div class="">
                <a href="{{route('pessoas.index')}}" class=""><h1>Home</h1></a>
                <a href="{{route('task.index')}}" class=""><h1>Task</h1></a>    

            </div>
        </div>
    </div>
@endsection
