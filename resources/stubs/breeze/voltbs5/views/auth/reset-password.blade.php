<x-guest-layout>
    <x-auth-card>
        <p class="text-center">
            <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                <x-svg.arrow-left />
                {{ __('Back to log in') }}
            </a>
        </p>
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="bg-white shadow border-0 rounded p-4 p-lg-5 w-100 fmxw-500">
                <h1 class="h3 mb-4">{{ __('Reset password') }}</h1>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Form -->
                    <div class="mb-4">
                        <label for="email">{{ __('Your Email') }}</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <x-svg.email />
                            </span>
                            <input name="email" type="email" class="form-control" placeholder="{{ __('Email') }}"
                                id="email" value="{{ old('email', $request->email) }}" required autofocus>
                        </div>
                        @error('email') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <!-- End of Form -->
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
                        @error('password') <div class="invalid-feedback"> {{ $message }} </div> @enderror
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
                    <div class="d-grid">
                        <button type="submit" class="btn btn-gray-800">{{ __('Reset password') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </x-auth-card>
</x-guest-layout>
