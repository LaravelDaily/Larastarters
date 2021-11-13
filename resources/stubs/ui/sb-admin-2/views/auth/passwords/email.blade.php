@extends('layouts.guest')

@section('content')
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">{{ __('Forgot Your Password?') }}</h1>
                                    <p class="mb-4">{{ __('We get it, stuff happens. Just enter your email address below
                                        and we will send you a link to reset your password!') }}</p>
                                </div>
                                <form class="user" action="{{ route('password.email') }}" method="post">
                                    @csrf

                                    <div class="form-group">
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-user @error('email') is-invalid @enderror"
                                               id="exampleInputEmail" aria-describedby="emailHelp"
                                               placeholder="{{ __('Enter Email Address...') }}">
                                    </div>
                                    @error('email')
                                    <div class="form-group custom-control">
                                        <label class="">{{ $message }}</label>
                                    </div>
                                    @enderror

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        {{ __('Reset My Password') }}
                                    </button>
                                </form>
                                <hr>
                                @if (Route::has('register'))
                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">{{ __('Create New Account!') }}</a>
                                    </div>
                                @endif
                                @if (Route::has('login'))
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">{{ __('Already have an account? Login!') }}</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
