@extends('layouts.app')

@section('content')
<div class="container customContainer">
    <div class="row justify-content-center custom">
        <div class="col-md-8 custom">
            <div class="card customCard">
                <div class="card-header customCardHeader">{{ __('SISGAP') }}</div>

                <div class="card-body customCardBody">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3 custom">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Login') }}</label>

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
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

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
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0 custom">
                            <div class="col-2 offset-md-4 login">
                                <button type="submit" class="btn btn-primary custom">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="col pwdrequest">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link custom" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
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
