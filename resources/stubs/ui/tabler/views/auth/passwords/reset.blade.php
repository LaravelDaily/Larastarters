@extends('layouts.guest')

@section('content')
    <form class="card card-md" action="{{ route('password.update') }}" method="post" autocomplete="off">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="card-body">
            <h2 class="card-title text-center mb-4">{{ __('Reset Password') }}</h2>

            <div class="mb-3">
                <label class="form-label">{{ __('Email address') }}</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email Address') }}">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('New Password') }}</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('New Password') }}">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('Repeat New Password') }}</label>
                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="{{ __('Repeat New Password') }}">
                @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">
                    {{ __('Reset My Password') }}
                </button>
            </div>
        </div>
    </form>

    @if (Route::has('login'))
    <div class="text-center text-muted mt-3">
        {{ __('Already have account?') }} <a href="{{ route('login') }}" tabindex="-1">{{ __('Sign in') }}</a>
    </div>
    @endif
@endsection
