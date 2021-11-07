@extends('layouts.guest')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <p class="text-center">
                <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                            clip-rule="evenodd">
                        </path>
                    </svg>
                    {{ __('Back to log in') }}
                </a>
            </p>
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="bg-white shadow border-0 rounded p-4 p-lg-5 w-100 fmxw-500">
                    <h1 class="h3 mb-4">{{ __('Reset password') }}</h1>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <!-- Form -->
                        <div class="mb-4">
                            <label for="email">{{ __('Your Email') }}</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                        </path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z">
                                        </path>
                                    </svg>

                                </span>
                                <input name="email" type="email" class="form-control" placeholder="{{ __('Email') }}"
                                    id="email" value="{{ $email ?? old('email') }}" autocomplete="email" required
                                    autofocus>
                            </div>
                            @error('email') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>
                        <!-- End of Form -->
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="password">{{ __('Your Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon2">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                            clip-rule="evenodd">
                                        </path>
                                    </svg>

                                </span>
                                <input name="password" type="password" placeholder="{{ __('Password') }}"
                                    class="form-control" id="password" required>
                            </div>
                            @error('password') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>
                        <!-- End of Form -->
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon3">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                            clip-rule="evenodd">
                                        </path>
                                    </svg>

                                </span>
                                <input name="password_confirmation" type="password"
                                    placeholder="{{ __('Confirm Password') }}" class="form-control"
                                    id="password_confirmation" required>
                            </div>
                        </div>
                        <!-- End of Form -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-gray-800">{{ __('Reset password') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
