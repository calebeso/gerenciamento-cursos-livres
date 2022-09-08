@extends('layouts.app')
@section('content')
<div class="my-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('aluno.index') }}">Aluno /</a></li>
            <li class="breadcrumb-item active" aria-current="page">Responsável</li>
        </ol>
    </nav>
</div>
<div class="row align-items-center">
    <div class="col">
        <div class="my-4">
            <h3>Responsável do Aluno - {{ $aluno->nome }}</h3>
        </div>
    </div>
    <div class="col">
        <a href="#">
            <button class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#createResponsavel">Novo Responsável</button>
        </a>
    </div>
</div>
@include('alunos.responsaveis.create', ['aluno_id' => $aluno->id])
<div class="card">
    <div class="card-body">
        <table class="table table-striped table-hover" id="responsavel">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">parentesco</th>
                    <th scope="col">telefone</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($aluno->responsaveis as $responsavel)
                <tr>
                    <td scope="row">
                        <span class="badge badge-phil bg-dark"># {{ $responsavel->id }}</span>
                    </td>
                    <td>{{ $responsavel->nome }}</td>
                    <td>{{ $responsavel->parentesco }}</td>
                    <td>{{ $responsavel->telefone }}</td>
                    <td>
                        <a href="{{ route('responsavel.edit', ['id' => $aluno->id, 'responsavel' => $responsavel->id] ) }}" class="edit-icon me-1">
                            <i class="icofont-ui-edit"></i>Editar
                        </a>
                        <form action="{{ route('responsavel.delete', ['id' => $aluno->id, 'responsavel' => $responsavel->id] ) }}" class="d-inline-block" method="POST">
                            @csrf
                            @method('DELETE')
                            <button id="excluir">
                                <a class="remove-icon"><i class='icofont-ui-delete'></i>Excluir</a>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
    $(document).ready(function() {
        $('#responsavel').DataTable({
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