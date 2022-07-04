@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">Editar Livro {{ $livro->nome }}</div>
    </div>
    <div class="card-body">
  <form action="{{ route('livro.update', $livro->id ) }}" method="POST">
    @method('PATCH')
    @csrf
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" name="nome" class="form-control" value="{{ $livro->nome }}" id="nome">
  </div>

  <div class="form-group">
    <label for="serie">Série</label>
    <input type="text" name="serie" class="form-control" value="{{ $livro->serie }}" id="serie">
  </div>

  <div class="form-group">
    <label for="idioma">Idioma</label>
    <input type="text" name="idioma" class="form-control" value="{{ $livro->idioma }}" id="idioma">
  </div>
  <button type="submit" class="btn btn-primary">Salvar</button>
</form>
    </div>
</div>
@endsection