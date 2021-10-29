@extends('layouts.guest')

@section('content')
    <div class="col-lg-8">
        <div class="card-group d-block d-md-flex row">
            <div class="card col-md-7 p-4 mb-0">
                <div class="card-body">
                    <h1>{{ __('Login') }}</h1>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3"><span class="input-group-text">
                      <svg class="icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                      </svg></span>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email"
                                   placeholder="{{ __('Email') }}" required autofocus>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="input-group mb-4"><span class="input-group-text">
                      <svg class="icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}"></use>
                      </svg></span>
                            <input class="form-control @error('password') is-invalid @enderror" type="password"
                                   name="password"
                                   placeholder="{{ __('Password') }}" required>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary px-4" type="submit">{{ __('Login') }}</button>
                            </div>
                            @if (Route::has('password.request'))
                                <div class="col-6 text-end">
                                    <a href="{{ route('password.request') }}" class="btn btn-link px-0"
                                       type="button">{{ __('Forgot Your Password?') }}</a>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            <div class="card col-md-5 text-white bg-primary py-5">
                <div class="card-body text-center">
                    <div>
                        <h2>{{ __('Sign up') }}</h2>
                        <a href="{{ route('register') }}"
                           class="btn btn-lg btn-outline-light mt-3">{{ __('Register') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection