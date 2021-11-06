<x-guest-layout>
    <x-auth-card>
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                <div class="text-center text-md-center mb-4 mt-md-0">
                    <h1 class="mt-n3 mb-0 h3">{{ __('Create Account') }}</h1>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Form -->
                    <div class="form-group mt-4 mb-4">
                        <label for="name">{{ __('Your Name') }}</label>

                        <input name="name" id="name" type="name" class="form-control" placeholder="{{ __('Name') }}"
                            value="{{ old('name') }}" autofocus required>

                        @error('name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <!-- End of Form -->

                    <!-- Form -->
                    <div class="form-group mt-4 mb-4">
                        <label for="email">{{ __('Your Email') }}</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <x-svg.email />
                            </span>
                            <input name="email" id="email" type="email" class="form-control"
                                placeholder="{{ __('Email') }}" value="{{ old('name') }}" autofocus required>
                        </div>
                        @error('email') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <!-- End of Form -->
                    <div class="form-group">
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="password">{{ __('Your Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon2">
                                    <x-svg.password />
                                </span>
                                <input name="password" type="password" placeholder="{{ __('Password') }}"
                                    class="form-control" id="password" required autocomplete="new-password">
                            </div>
                            @error('password') <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                        <!-- End of Form -->
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon3">
                                    <x-svg.password />
                                </span>
                                <input name="password_confirmation" type="password"
                                    placeholder="{{ __('Confirm Password') }}" class="form-control"
                                    id="password_confirmation" required>
                            </div>
                        </div>
                        <!-- End of Form -->
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-gray-800">{{ __('Register') }}</button>
                    </div>
                </form>

                <div class="d-flex justify-content-center align-items-center mt-4">
                    <span class="fw-normal">
                        {{ __('Already have an account?') }}
                        <a href="{{ route('login') }}" class="fw-bold">{{ __('Login here') }}</a>
                    </span>
                </div>
            </div>
        </div>
    </x-auth-card>
</x-guest-layout>
