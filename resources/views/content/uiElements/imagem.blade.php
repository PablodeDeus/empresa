@extends('layout')
@section('content')

    <form action="/p" enctype="multipart/form-data" method="post">
        @csrf

        <div class="row">
            <div class="col-8 offset-2">
                <div>
                    <h1>Nova imagem</h1>
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Adicionar imagem</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    

                    @error('image')
                        <strong>{{ $errors->first('image') }}</strong>
                    @enderror
                </div>  

                <div class="row pt-4">
                    <button class="btn btn-primary">Publicar</button>
                </div>      
            </div>
        </div>  
    </form>  

@endsection