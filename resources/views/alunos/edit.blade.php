@extends('layouts.app')
@section('content')
<div class="my-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('aluno.index') }}">Alunos /</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar {{ $aluno->nome }}
            </li>
        </ol>
    </nav>
</div>
<div class="my-4">
    <h3>Editar aluno</h3>
</div>
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('aluno.update', $aluno->id) }}">
            @method('PATCH')
            @csrf
            <div class="row">
                <!-- Informações do Aluno -->
                <div class="col-md-10">
                    <label for="inputName" class="form-label mt-4 mb-2">Nome</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ $aluno->nome }}" id="nome">
                    @error('nome')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label for="inputMatricula" class="form-label mt-4 mb-2">Matricula</label>
                    <input type="text" name="matricula" class="form-control" value="{{ $aluno->matricula }}" id="inputMatricula" readonly>
                </div>

                <div class="col-md-6">
                    <label for="inputRg" class="form-label mt-4 mb-2">RG</label>
                    <input type="text" class="form-control @error('rg') is-invalid @enderror" id="rg" name="rg" value="{{ $aluno->rg }}">
                    @error('rg')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="inputCpf" class="form-label mt-4 mb-2">CPF</label>
                    <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="cpf" name="cpf" value="{{ $aluno->cpf }}">
                    @error('cpf')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="data_nascimento" class="form-label mt-4 mb-2">Data de Nascimento</label>
                    <input type="text" class="form-control @error('data_nascimento') is-invalid @enderror" id="nascimento" value="{{ $aluno->data_nascimento }}" name="data_nascimento">
                    @error('data_nascimento')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="inputTel" class="form-label mt-4 mb-2">Telefone</label>
                    <input type="text" class="form-control" id="telefone" value="{{ $aluno->telefone }}" name="telefone">
                </div>
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
@section('javascript')
@include('includes.toastr')
<script>
    $(document).ready(function() {
        $('#cpf').mask('000.000.000-00');
        $('#nascimento').mask('00/00/0000');
        $('#telefone').mask('(00) 0 0000-0000');
    });
</script>
@endsection