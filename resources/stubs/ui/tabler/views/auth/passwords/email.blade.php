@extends('layouts.guest')

@section('content')

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <form class="card card-md" action="{{ route('password.email') }}" method="post" autocomplete="off">
        @csrf

        <div class="card-body">
            <h2 class="card-title text-center mb-4">{{ __('Forgot password') }}</h2>

            <p class="text-muted mb-4">{{ __('Enter your email address and your password will be reset and emailed to you.') }}</p>

            <div class="mb-3">
                <label class="form-label">{{ __('Email address') }}</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-user @error('email') is-invalid @enderror" placeholder="{{ __('Enter Email Address...') }}">
                @error('email')
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
