@extends('layouts.frontend-app')

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-lg-12">
            <div class="faq-title-conatiner px-5 py-5">
                <h1>
                    Login
                </h1>
            </div>

        </div>
    </div>
</div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 py-2">
                <h2 class="text-center">
                    <div class="" style="background-color: ">{{ __('Login') }}</div>
                </h2>
            </div>
            <div class="col-md-6">
                <div class="" style="bac">

                    <div class>
                        @include('layouts.errors') 
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="user_name"
                                    class="col-md-12 col-form-label text-md-start">{{ __('User Name') }}</label>

                                <div class="col-md-12">
                                    <input id="user_name" type="text"
                                        class="form-control @error('user_name') is-invalid @enderror" name="user_name"
                                        value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>

                                    @error('user_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-12 col-form-label text-md-start">{{ __('Password') }}</label>

                                <div class="col-md-12">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn custom-button">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
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
