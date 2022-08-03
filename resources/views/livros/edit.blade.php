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
      <div class="form-group">
        <label class="mt-4 mb-2" for="nome">Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ $livro->nome }}" id="nome">
      </div>

      <div class="form-group">
        <label class="mt-4 mb-2" for="serie">Série</label>
        <input type="text" name="serie" class="form-control" value="{{ $livro->serie }}" id="serie">
      </div>

      <div class="form-group">
        <label class="mt-4 mb-2" for="idioma">Idioma</label>
        <input type="text" name="idioma" class="form-control" value="{{ $livro->idioma }}" id="idioma">
      </div>
  </div>
</div>

<div class="row my-4">
  <div class="d-flex justify-content-start">
    <button type="submit" class="btn btn-success me-1">
      {{ __('Salvar') }}
    </button>
    <button class="btn btn-danger">
      {{ __('Cancelar') }}
    </button>
  </div>
</div>
</form>
@endsection