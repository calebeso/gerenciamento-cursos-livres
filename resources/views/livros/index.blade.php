@extends('layouts.app')
@section('content')
<div class="row align-items-center">
  <div class="col">
    <div class="my-4">
      <h3>Livros</h3>
    </div>
  </div>
  <div class="col">
    <a href="{{ route('livro.create') }}">
      <button class="btn btn-success float-end">Novo Livro</button>
    </a>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <table class="table" id="livros">
      <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col">Nome</th>
          <th scope="col">Série</th>
          <th scope="col">Idioma</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($livros as $livro)
        <tr>
          <td>
            <span class="badge rounded-pill bg-dark">#{{ $livro->id }}</span>
          </td>
          <td>{{ $livro->nome }}</td>
          <td>{{ $livro->serie }}</td>
          <td>{{ $livro->idioma }}</td>
          <td>
            <a href="{{ route('livro.edit', $livro->id ) }}" class="edit-icon me-1">
              <i class="icofont-ui-edit"></i>Editar
            </a>
            <form class="d-inline-block" method="POST" action="{{ route('livro.delete', $livro->id ) }}">
              @csrf
              @method('DELETE')
              <button id="excluir">
                <a class="remove-icon"><i class='icofont-ui-delete'></i>Excluir</a>
              </button>
            </form>
            <a href="{{ route('licoes.index', $livro->id )}}" class="licoes-icon me-1">
              <i class="icofont-black-board"></i>Lições
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
  $(document).ready(function() {
    $('#livros').DataTable({
      "info": false,
      "bPaginate": true,
      "pagingType": 'numbers',
      "bLengthChange": false,
      "language": {
        "emptyTable": "Nenhum registro encontrado",
        "search": "Procurar"
      },
    });
  });
</script>
@include('includes.toastr')
@endsection