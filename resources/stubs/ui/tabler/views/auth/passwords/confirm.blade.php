@extends('layouts.guest')

@section('content')
    <form class="card card-md" action="{{ route('password.confirm') }}" method="post" autocomplete="off">
        @csrf

        <div class="card-body">
            <h2 class="card-title text-center mb-4">{{ __('Confirm Password') }}</h2>

            <p class="text-muted mb-4">{{ __('Please confirm your password before continuing.') }}</p>

            <div class="mb-3">
                <label class="form-label">
                    {{ __('Password') }}
                    @if (Route::has('password.request'))
                    <span class="form-label-description">
                        <a href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a>
                    </span>
                    @endif
                </label>
                <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="{{ __('Enter Password') }}">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">{{ __('Confirm Password') }}</button>
            </div>
        </div>
    </form>
@endsection
