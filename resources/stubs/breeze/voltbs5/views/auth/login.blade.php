<x-guest-layout>
    <x-auth-card>
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="bg-white shadow-soft border rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                <div class="text-center text-md-center mb-4 mt-md-0">
                    <h1 class="mb-3 h3">{{ __('Welcome back') }}</h1>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form class="mt-4" action="{{ route('login') }}" method="POST">
                    @csrf
                    <!-- Form -->
                    <div class="form-group mb-4">
                        <label for="email">{{ __('Your Email') }}</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <x-svg.email />
                            </span>
                            <input name="email" type="email" class="form-control" placeholder="{{ __('Email') }}"
                                id="email" value="{{ old('email') }}" required autofocus>
                        </div>
                        @error('email')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
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
                                    class="form-control" id="password" required>
                            </div>
                            @error('password')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                        <!-- End of Form -->
                        <div class="d-flex justify-content-between align-items-top mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="remember">
                                <label class="form-check-label mb-0" for="remember">
                                    {{ __('Remember me') }}
                                </label>
                            </div>
                            <div>
                                <a href="{{ route('password.request') }}" class="small text-right">
                                    {{ __('Lost password?') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-gray-800">{{ __('Sign in') }}</button>
                    </div>
                </form>
                <div class="d-flex justify-content-center align-items-center mt-4">
                    <span class="fw-normal">
                        {{ __('Not registered?') }}
                        <a href="{{ route('register') }}" class="fw-bold">{{ __('Create account') }}</a>
                    </span>
                </div>
            </div>
        </div>
    </x-auth-card>
</x-guest-layout>
