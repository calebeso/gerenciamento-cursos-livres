@extends('layouts.app')
@section('content')
<div class="my-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{  route('responsavel.index') }}">Responsaveis /</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar {{ $responsavel->nome }}</li>
        </ol>
    </nav>
</div>

<div class="my-4">
    <h3>Editar responsavel</h3>
</div>
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('responsavel.update', $responsavel->id) }}">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <label for="inputName" class="form-label mt-4 mb-2">Nome</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="nome" id="nome" value="{{ $responsavel->nome }}">
                    @error('nome')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="inputParentesco" class="form-label mt-4 mb-2">Parentesco</label>
                    <input type="text" class="form-control @error('parentesco') is-invalid @enderror" name="parentesco" id="parentesco" value="{{ $responsavel->parentesco }}">
                    @error('parentesco')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="inputTel" class="form-label mt-4 mb-2">Telefone</label>
                    <input type="text" class="form-control @error('telefone') is-invalid @enderror" id="telefone" name="telefone" value="{{ $responsavel->telefone }}">
                    @error('telefone')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
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
        $('#telefone').mask('(00) 0 0000-0000');
    });
</script>
@endsection