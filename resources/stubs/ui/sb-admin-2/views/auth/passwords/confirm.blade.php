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
                                    <h1 class="h4 text-gray-900 mb-2">{{ __('Confirm Password') }}</h1>
                                    <p class="mb-4">{{ __('Please confirm your password before continuing.') }}</p>
                                </div>
                                <form class="user" action="{{ route('password.confirm') }}" method="post">
                                    @csrf

                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                               id="exampleInputPassword" aria-describedby="passwordHelp"
                                               placeholder="{{ __('Enter Password') }}">
                                    </div>
                                    @error('password')
                                    <div class="form-group custom-control">
                                        <label class="">{{ $message }}</label>
                                    </div>
                                    @enderror

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        {{ __('Confirm Password') }}
                                    </button>
                                </form>
                                <hr>
                                @if (Route::has('password.request'))
                                    <div class="text-center">
                                        <a class="small" href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a>
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
