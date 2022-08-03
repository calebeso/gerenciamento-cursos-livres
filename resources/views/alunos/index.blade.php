@extends('layouts.app')
@section('content')
<div class="row align-items-center">
    <div class="col">
        <div class="my-4">
            <h3>Alunos</h3>
        </div>
    </div>
    <div class="col">
        <a href="{{ route('aluno.create') }}">
            <button class="btn btn-success float-end">Novo Aluno</button>
        </a>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-striped table-hover" id="alunos">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alunos as $aluno)
                <tr>
                    <td scope="row">
                        <span class="badge badge-phil bg-dark">
                            # {{ $aluno->id }}
                        </span>
                    </td>
                    <td>
                        {{ $aluno->nome }} <br>
                        <small>
                            <span class="badge badge-phil bg-dark">Matrícula: {{ $aluno->matricula }}</span>
                        </small>
                    </td>
                    <td>{{ $aluno->telefone }}</td>
                    <td>
                        <div class="form-check form-switch form-check-inline">
                            <input class="form-check-input" type="checkbox" name="status" value="{{ $aluno->id }}" id="status" {{ $aluno->status == 1 ? 'checked' : '' }}>
                            <label class="form-check-label me-4" for="status">
                            </label>
                        </div>
                    </td>
                    <td>
                        <a href="{{ route('aluno.edit', $aluno->id ) }}" class="edit-icon me-1">
                            <i class="icofont-ui-edit"></i>Editar
                        </a>
                        <form class="d-inline-block" method="POST" action="{{ route('aluno.delete', $aluno->id ) }}">
                            @csrf
                            @method('DELETE')
                            <button id="excluir">
                                <a class="remove-icon"><i class='icofont-ui-delete'></i>Excluir</a>
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
@section('javascript')
@include('includes.toastr')
<script>
    $(document).ready(function() {
        $('#alunos').DataTable({
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

    $('input[name=status]').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).val();
        $.ajax({
            type: 'POST',
            url: "{{ route('aluno.update-status') }}",
            dataType: 'JSON',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
                "status": status
            },
            success: function(response) {
                if (response.status == 'success') {
                    toastr.success('Aluno atualizado', 'Sucesso!');
                } else {
                    toastr.info('Erro ao atualizar', 'Oooops!');
                }
            },
        })
    });
</script>
</script>
@endsection