@extends('layouts.guest')

@section('content')
    <div class="col-md-6">
        <div class="card mb-4 mx-4">
            <div class="card-body p-4">
                <h1>{{ __('Please confirm your password before continuing.') }}</h1>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}"></use>
                    </svg></span>
                        <input class="form-control @error('password') is-invalid @enderror" type="password"
                               id="password" name="password" placeholder="{{ __('Password') }}">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-primary px-4" type="submit">{{ __('Confirm Password') }}</button>
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
    </div>
@endsection