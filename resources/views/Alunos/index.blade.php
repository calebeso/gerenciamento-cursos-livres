@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row justify-content-between">
            <div class="col-4">
                <h2 class="card-title row-md-10">Alunos</h2>
            </div>
            <div class="col-4 d-flex justify-content-end">
                <a href="{{ route('aluno.create') }}" class="btn btn-primary">Novo Aluno</a>
            </div>
        </div>
    </div>
    <div class="table-content">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Matricula</th>
                    <th scope="col">Status</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alunos as $key => $aluno)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $aluno->nome }}</td>
                    <td>{{ $aluno->data_nascimento }}</td>
                    <td>{{ $aluno->matricula }}</td>
                    <td>{{ $aluno->status == 1 ? 'Ativo' : 'Inativo' }}</td>
                    <td>{{ $aluno->telefone }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a class="btn btn-primary" href="{{ route('aluno.edit', $aluno->id) }}"><i class="icofont-ui-edit"></i></a>
                            <button type="submit" label class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#parentModal"><i class="icofont-group"></i></button>
                            <form method="post" action="{{ route('aluno.delete', $aluno->id) }}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="icofont-ui-delete"></i> </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @include('alunos.modal.parentsmodal')
    </div>
</div>
@endsection