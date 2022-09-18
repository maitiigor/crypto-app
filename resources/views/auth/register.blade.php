@extends('layouts.frontend-app')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-middle py-1 my-2">
            <div class="col-md-12 py-2">
                <h2 class="text-center">
                    <div class="" style="background-color: ">{{ __('Register') }}</div>
                </h2>
            </div>
            <div class="col-md-6">
                <div class="" style="bac">


                    <div class="">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            @if (request()->query('ref'))
                                <input type="hidden" name="ref_user" value="{{ request()->query('ref') }}">
                            @endif
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-12 col-form-label te text-md-start">{{ __('Name') }}</label>

                                <div class="col-md-12">

                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="user_name"
                                    class="col-md-12 col-form-label te text-md-start">{{ __('User Name') }}</label>

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
                                <label for="email"
                                    class="col-md-12 col-form-label text-md-start">{{ __('Email Address') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
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
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-12 col-form-label text-md-start">{{ __('Confirm Password') }}</label>

                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12 text-md-start">
                                    <button type="submit" class="btn custom-button"
                                        style="background-color: #be7b2e; color: #ffff">
                                        <i class="fa fa-user-plus"></i> {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
