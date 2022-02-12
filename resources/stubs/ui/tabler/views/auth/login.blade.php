@extends('layouts.guest')

@section('content')
    <form class="card card-md" action="{{ route('login') }}" method="post" autocomplete="off">
        @csrf

        <div class="card-body">
            <h2 class="card-title text-center mb-4">{{ __('Login to your account') }}</h2>

            <div class="mb-3">
                <label class="form-label">{{ __('Email address') }}</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Enter email') }}" required autofocus tabindex="1">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">
                    {{ __('Password') }}
                    @if (Route::has('password.request'))
                    <span class="form-label-description">
                        <a href="{{ route('password.request') }}" tabindex="5">{{ __('Forgot Password?') }}</a>
                    </span>
                    @endif
                </label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" required tabindex="2">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="form-check">
                    <input type="checkbox" class="form-check-input" tabindex="3" name="remember" />
                    <span class="form-check-label">{{ __('Remember me on this device') }}</span>
                </label>
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100" tabindex="4">{{ __('Sign in') }}</button>
            </div>
        </div>
    </form>

    @if (Route::has('register'))
    <div class="text-center text-muted mt-3">
        {{ __("Don't have account yet?") }} <a href="{{ route('register') }}" tabindex="-1">{{ __('Sign up') }}</a>
    </div>
    @endif

@endsection
