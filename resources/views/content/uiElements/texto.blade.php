@extends('layout')
@section('content')
<form action="/p" enctype="multipart/form-data" method="post">
        @csrf

        <div class="row">
            <div class="col-8 offset-2">
                <div>
                    <h1>Nova Postagem</h1>
                </div>
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">Descrição da postagem</label>
                        <input id="caption" type="text" 
                        class="form-control @error('caption') is-invalid @enderror" 
                        name="caption" value="{{ old('caption') }}" 
                        required autocomplete="caption" autofocus>

                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                <div class="row pt-4">
                    <button class="btn btn-primary">Publicar</button>
                </div>      
            </div>
        </div>  
    </form>  
@endsection