@extends('layouts.guest')

@section('content')
    <!-- Outer Row -->
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-password-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">{{ __('Reset Password') }}</h1>
                        </div>
                        <form class="user" action="{{ route('password.update') }}" method="post">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-user @error('email') is-invalid @enderror" id="exampleInputEmail"
                                       placeholder="{{ __('Email Address') }}">
                            </div>
                            @error('email')
                            <div class="form-group custom-control">
                                <label class="">{{ $message }}</label>
                            </div>
                            @enderror

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                           id="exampleInputPassword" placeholder="{{ __('New Password') }}">
                                </div>
                                @error('password')
                                <div class="form-group custom-control">
                                    <label class="">{{ $message }}</label>
                                </div>
                                @enderror

                                <div class="col-sm-6">
                                    <input type="password" name="password_confirmation" class="form-control form-control-user @error('password_confirmation') is-invalid @enderror"
                                           id="exampleRepeatPassword" placeholder="{{ __('Repeat New Password') }}">
                                </div>
                                @error('password_confirmation')
                                <div class="form-group custom-control">
                                    <label class="">{{ $message }}</label>
                                </div>
                                @enderror

                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                {{ __('Reset My Password') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
