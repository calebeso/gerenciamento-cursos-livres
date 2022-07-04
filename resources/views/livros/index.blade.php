@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-header">
    <div class="card-title">Livros</div>
    <a href="{{ route('livro.create') }}">
      <button class="btn btn-success">Adicionar Livro</button>
    </a>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Série</th>
          <th scope="col">Idioma</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach($livros as $livro)
        <tr>
          <th scope="row">{{ $livro->id }}</th>
          <td>{{ $livro->nome }}</td>
          <td>{{ $livro->serie }}</td>
          <td>{{ $livro->idioma }}</td>
          <td>
            <a href="{{ route('livro.edit', $livro->id ) }}">
              <i class="icofont-ui-edit"></i>
            </a>
            <form method="post" action="{{ route('livro.delete', $livro->id ) }}">
              @method('delete')
              @csrf
              <button type="submit">
                <i class="icofont-ui-delete"></i>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection