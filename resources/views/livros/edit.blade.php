@extends('layouts.app')
@section('content')
<div class="my-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('livro.index') }}">Livros /</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar {{ $livro->nome }}
            </li>
        </ol>
    </nav>
</div>
<div class="my-4">
    <h3>Editar livro</h3>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{ route('livro.update', $livro->id ) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="form-group">
                    <label class="mt-4 mb-2" for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control  @error('nome') is-invalid @enderror" value="{{ $livro->nome }}" id="nome">
                    @error('nome')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label class="mt-4 mb-2" for="serie">Série</label>
                        <input type="text" name="serie" class="form-control  @error('serie') is-invalid @enderror" value="{{ $livro->serie }}" id="serie">
                        @error('serie')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label class="mt-4 mb-2" for="idioma">Idioma</label>
                        <input type="text" name="idioma" class="form-control  @error('idioma') is-invalid @enderror" value="{{ $livro->idioma }}" id="idioma">
                        @error('idioma')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>
    </div>
</div>

<div class="row my-4">
    <div class="d-flex justify-content-start">
        <button type="submit" class="btn btn-success me-1">
            {{ __('Salvar') }}
        </button>
        <a class="btn btn-danger" href="{{ route('livro.index') }}" role="button">Cancelar</a>
    </div>
</div>
</form>
@endsection
@section('javascript')
@include('includes.toastr')