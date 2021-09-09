@extends('layout')

@section('content')
 
       
<div class="page-header">
    <h1 class="title">Users</h1>

    <!-- Start Page Header Right Div -->
    <div class="right">
        <a class="btn btn-success" onclick="openAddUser()">Adicionar</a>
    </div>
    <!-- End Page Header Right Div -->

</div>


<div class="container d-none" id="add-user-container">
    <div class="row">
        <div class="col-8 offset-2">
            <div>
                 <h1>Nova Postagem</h1>
            </div>
            <div class="row ">
                    <label for="image" class="col-md-4 col-form-label">Nome</label>
                    <input type="text" class="form-control" placeholder="E-mail" name="nome">
                    @if($errors->has('nome'))
                        <p class="text-danger">
                            {{ $errors->first('nome')}}
                        </p>
                    @endif
            </div>
            <div class="row ">
                    <label for="image" class="col-md-4 col-form-label">E-mail</label>
                    <input type="text" class="form-control" placeholder="E-mail" name="email">
                    @if($errors->has('email'))
                        <p class="text-danger">
                            {{ $errors->first('email')}}
                        </p>
                    @endif
            </div>
            <div class="row">
                <label for="image" class="col-md-4 col-form-label">Adicionar imagem</label>
                <input type="text" class="form-control" placeholder="Nome" name="name">
                     @if($errors->has('name'))
                        <p class="text-danger">
                            {{ $errors->first('name')}}
                        </p>
                    @endif
                </div>
            <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Senha</label>
                    <input type="password" class="form-control" placeholder="Senha" name="password">
                    @if($errors->has('password'))
                        <p class="text-danger">
                            {{ $errors->first('password')}}
                        </p>
                    @endif
            </div>
            <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Senha novamente</label>
                    <input type="password" class="form-control" placeholder="Senha" name="repassword">
                    @if('password' == 'repassword')
                        <p class="text-danger">
                            {{ $errors->first('repassword')}}
                        </p>
                    @endif
            </div>
            </div>
        </div>
    </div>
</div>


@endsection