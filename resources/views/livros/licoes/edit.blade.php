@extends('layouts.app')
@section('content')
<div class="my-4">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('licoes.index', $livro->id) }}">Lições /</a></li>
      <li class="breadcrumb-item active" aria-current="page">Editar {{ $lesson->nome }}
      </li>
    </ol>
  </nav>
</div>
<div class="my-4">
  <h3>Editar lição</h3>
</div>
<div class="card">
  <div class="card-body">
    <form action="{{ route('licoes.update',['id' => $livro->id, 'licao' => $lesson->id]) }}" method="POST">
      @method('PATCH')
      @csrf
      <div class="form-group">
        <label class="mt-4 mb-2" for="nome">Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ $lesson->nome }}" id="nome">
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