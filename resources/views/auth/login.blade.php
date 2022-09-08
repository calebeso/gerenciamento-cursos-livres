@extends('layouts.app')

@section('content')
<div class="container customContainer">
    <div class="row justify-content-center custom">
        <div class="col-md-8 custom">
            <div class="card customCard mb-4">
                <div class="card-header customCardHeader">{{ __('SISGAP') }}</div>

                <div class="card-body customCardBody">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3 custom">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6 custom">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 custom">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 custom">
                            <div class="col-md-6 offset-md-4 custom">
                                <div class="form-check custom">
                                    <input class="form-check-input custom" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Lembrar') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0 custom">
                            <div class="login row">
                                <button type="submit" class="btn btn-primary custom">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                        <div class="row mb-0 custom2">
                            <div class="pwd row">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link custom" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu a senha?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
