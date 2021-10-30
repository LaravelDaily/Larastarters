@extends('layouts.guest')

@section('content')
    <div class="col-lg-6">
        <div class="auth-cover-wrapper bg-primary-100">
            <div class="auth-cover">
                <div class="title text-center">
                    <h1 class="text-primary mb-10">{{ __('Register') }}</h1>
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
                <h6 class="mb-15">{{ __('Register') }}</h6>
                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="name">{{ __('Name') }}</label>
                                <input type="text" @error('name') class="form-control is-invalid" @enderror name="name" id="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="email">{{ __('Email') }}</label>
                                <input @error('email') class="form-control is-invalid" @enderror type="email" name="email" id="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="password">{{ __('Password') }}</label>
                                <input type="password" @error('password') class="form-control is-invalid" @enderror name="password" id="password" placeholder="{{ __('Password') }}" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                                <input type="password" @error('password') class="form-control is-invalid" @enderror name="password_confirmation" id="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-12">
                            <div class="button-group d-flex justify-content-center flex-wrap">
                                <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                                    {{ __('Register') }}
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