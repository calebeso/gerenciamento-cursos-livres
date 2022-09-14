@extends('layouts.app')

@section('content')
<div class="my-4">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Usuários  /</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
  </ol>
</nav>
</div>
<div class="my-4">
    <h3>Cadastrar usuário</h3>
</div>
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('user.save') }}">
            @csrf
            <div class="row">
                <div class="form-group">
                    <label class="mt-4 mb-2" for="name">{{ __('Nome Completo *') }}</label>
                    <input id="name" type="text" class="form-control @error('nome') is-invalid @enderror" name="name" value="{{ old('nome') }}" autocomplete="name" autofocus>
                    @error('nome')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label class="mt-4 mb-2" for="cpf">{{ __('CPF *') }}</label>
                    <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') }}" autocomplete="cpf">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col">
                    <label class="mt-4 mb-2" for="rg">{{ __('RG *') }}</label>
                    <input id="rg" type="text" class="form-control @error('rg') is-invalid @enderror" name="rg" value="{{ old('rg') }}" autocomplete="email">
                    @error('rg')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label class="mt-4 mb-2" for="telefone">{{ __('Telefone *') }}</label>
                    <input id="telefone" type="text" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ old('telefone') }}">
                    @error('telefone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label class="mt-4 mb-2" for="endereco">{{ __('Endereço *') }}</label>
                    <input id="endereco" type="endereco" class="form-control @error('endereco') is-invalid @enderror" name="endereco" value="{{ old('endereco') }}" autocomplete="endereco">
                    @error('endereco')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-body">
        <label for="">Sistema</label>

        <div class="row">
            <div class="form-group">
                <label class="mt-4 mb-2" for="email">{{ __('Email *') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <!-- Em desuso -->
        <!-- <div class="row">
            <div class="form-group">
                <label class="mt-4 mb-2" for="login">{{ __('Login *') }}</label>
                <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus>

                @error('login')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div> -->

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label class="mt-4 mb-2" for="password">{{ __('Senha *') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label class="mt-4 mb-2" for="password-confirm">{{ __('Confirmar Senha *') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-body">
    <label for="">Permissões</label>
        <div class="row">
            <div class="form-group">
            <div class="form-row mt-4">
                    @forelse($roles as $role)
                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input" type="checkbox" name="role[]" value="{{ $role->id }}" id="role">
                        <label class="form-check-label me-4" for="role1">
                            {{ $role->name }}
                        </label>
                    </div>
                    @empty
                    @endforelse
                </div>
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
        $("#cpf").mask('000.000.000-00');
        $("#telefone").mask('(00) 0 0000-0000');
    });
</script>
@endsection