@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">Cadastrar Livro</div>
    </div>
    <div class="card-body">
  <form action="{{ route('livro.store') }}" method="POST">
    @csrf
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" name="nome" class="form-control" id="nome">
  </div>

  <div class="form-group">
    <label for="serie">Série</label>
    <input type="text" name="serie" class="form-control" id="serie">
  </div>

  <div class="form-group">
    <label for="idioma">Idioma</label>
    <input type="text" name="idioma" class="form-control" id="idioma">
  </div>
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
    </div>
</div>
@endsection