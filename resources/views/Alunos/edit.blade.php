@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row justify-content-between">
            <div class="col-4">
                <h2 class="card-title row-md-10">Editar Aluno</h2>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('aluno.update', $aluno->id) }}">
            @method('PATCH')
            @csrf
            <div class="row">
                <!-- Informações do Aluno -->
                <div class="col-md-10">
                    <label for="inputName" class="form-label">Nome</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ $aluno->nome }}" id="inputName">
                    @error('nome')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label for="inputMatricula" class="form-label">Matricula</label>
                    <input type="text" name="matricula" class="form-control" value="{{ $aluno->matricula }}" id="inputMatricula" readonly>
                </div>

                <div class="col-md-4">
                    <label for="inputRg" class="form-label">RG</label>
                    <input type="number" class="form-control @error('rg') is-invalid @enderror" id="inputRg" name="rg" value="{{ $aluno->rg }}">
                    @error('rg')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="inputCpf" class="form-label">CPF</label>
                    <input type="number" class="form-control @error('cpf') is-invalid @enderror" id="inputCpf" name="cpf" value="{{ $aluno->cpf }}">
                    @error('cpf')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="inputMatricula" class="form-label">Status</label>
                    <div>
                        <!-- Modelar status do campo do back -->
                        <select name='status' class="form-control">
                            <option selected>Status Matricula</option>
                            <option value="1">Ativo</option>
                            <option value="0">Inativo</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control @error('data_nascimento') is-invalid @enderror" id="data_nascimento" value="{{ $aluno->data_nascimento }}" name="data_nascimento">
                    @error('data_nascimento')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="inputTel" class="form-label">Telefone</label>
                    <input type="tel" class="form-control" id="inputTel" value="{{ $aluno->telefone }}" name="telefone">
                </div>
            </div>
            <br>
            <div class="col-12 d-flex justify-content-end">
                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-success">Confirmar</button>
                    <a class="btn btn-danger" href="{{ route('alunos.index') }}" role="button">Cancelar</a>
                </div>
            </div>
        </form>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome Responsável</th>
                    <th scope="col">Grau de Parentesco</th>
                    <th scope="col">Telefone Responsavel</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><i class="icofont-ui-delete"> <i class="icofont-ui-edit"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection