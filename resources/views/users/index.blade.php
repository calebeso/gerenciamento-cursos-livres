@extends('layouts.app')

@section('content')
<div class="row align-items-center">
    <div class="col">
        <div class="my-4">
            <h3>Usuários</h3>
        </div>
    </div>
    <div class="col">
    <a href="{{ route('user.create') }}">
          <button class="btn btn-success float-end">Novo Usuário</button>
        </a>
    </div>
</div>
<div class="card">
    <div class="card-body">
    <table class="table" id="usuarios">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">E-mail</th>
          <th scope="col">Login</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <th scope="row">
        
          <span class="badge badge-phil bg-dark">
              {{ $user->id }}
          </span>
            
        </th>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->login }}</td>
          <td>
            <a href="{{ route('user.edit', $user->id ) }}" class="edit-icon me-1">
              <i class="icofont-ui-edit"></i>Editar
            </a>
            <form method="post" action="{{ route('user.delete', $user->id ) }}" id="excluir" style="display: none;">
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
    $('#usuarios').DataTable({
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