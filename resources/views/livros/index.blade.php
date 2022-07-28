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
            <a href="{{ route('livro.edit', $livro->id ) }}" class="edit-icon me-1">
              <i class="icofont-ui-edit"></i>Editar
            </a>
            <form method="post" action="{{ route('livro.delete', $livro->id ) }}" id="excluir" style="display: none;">
              @method('delete')
              @csrf
              <button type="submit">
              </button>
            </form>
            <a href="#excluir" class="remove-icon" onclick="$('#excluir').submit();">
             <i class='icofont-ui-delete'></i>Excluir
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
      "pagingType" : 'numbers',
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