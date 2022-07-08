@extends('layouts.guest')

@section('content')
    <div class="col-md-6">
        <div class="card mb-4 mx-4">
            <div class="card-body p-4">
                <h1>{{ __('Reset Password') }}</h1>
                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    @if(session('status'))
                        <div role="alert" class="alert alert-success py-2 ">
                            <ul class="py-0 m-0">
                                <li>{{ session('status') }}</li>
                            </ul>
                        </div>
                    @endif
                    <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                    </svg></span>
                        <input class="form-control @error('email') is-invalid @enderror" type="email"
                               id="email" name="email" placeholder="{{ __('Email') }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button class="btn btn-block btn-success"
                            type="submit">{{ __('Send Password Reset Link') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
