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
            <h3>Responsável do Aluno {{ $aluno->nome }}</h3>
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
        <table class="table" id="responsavel">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nome</th>
                    <th scope="col">Parentesco</th>
                    <th scope="col">Telefone</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($aluno->responsavel as $responsavel)
                @empty
                @endforelse
                <tr>
                    <th>1</th>
                    <th>Rezes</th>
                    <th>Irmão</th>
                    <th>999999999</th>
                    <th>Edit/Delete</th>
                </tr>
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
                "search": "Procurar "
            },
        });
    });
</script>
@include('includes.toastr')
@endsection