@extends('layouts.guest')

@section('content')
    <div class="col-lg-6">
        <div class="auth-cover-wrapper bg-primary-100">
            <div class="auth-cover">
                <div class="title text-center">
                    <h1 class="text-primary mb-10">{{ __('Reset Password') }}</h1>
                </div>
                <div class="cover-image">
                    <img src="{{ asset('images/auth/signin-image.svg') }}" alt="">
                </div>
                <div class="shape-image">
                    <img src="{{ asset('images/auth/shape.svg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
    <div class="col-lg-6">
        <div class="signin-wrapper">
            <div class="form-wrapper">
                <h6 class="mb-15">{{ __('Reset Password') }}</h6>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('password.email') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="email">{{ __('Email') }}</label>
                                <input @error('email') class="form-control is-invalid" @enderror type="email" name="email" id="email" placeholder="{{ __('Email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    <!-- end col -->
                        <div class="col-12">
                            <div class="button-group d-flex justify-content-center flex-wrap">
                                <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </form>
            </div>
        </div>
    </div>
    <!-- end col -->
@endsection