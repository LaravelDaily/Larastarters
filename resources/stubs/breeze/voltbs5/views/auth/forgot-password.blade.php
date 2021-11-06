<x-guest-layout>
    <x-auth-card>
        <p class="text-center">
            <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                <x-svg.arrow-left />
                {{ __('Back to log in') }}
            </a>
        </p>
        <div class="col-12 d-flex align-items-center justify-content-center">

            <div class="signin-inner my-3 my-lg-0 bg-white shadow border-0 rounded p-4 p-lg-5 w-100 fmxw-500">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <h1 class="h3">{{ __('Forgot your password?') }}</h1>
                <p class="mb-4">
                    {{ __("Don't fret! Just type in your email and we will send you a code to reset your password!") }}
                </p>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <!-- Form -->
                    <div class="mb-4">
                        <label for="email">{{ __('Your Email') }}</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <x-svg.password />
                            </span>
                            <input name='email' type="email" class="form-control" id="email"
                                placeholder="{{ __('Email') }}" required autofocus>
                        </div>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <!-- End of Form -->

                    <div class="d-grid">
                        <button type="submit" class="btn btn-gray-800">{{ __('Recover password') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </x-auth-card>
</x-guest-layout>
