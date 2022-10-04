<x-guest-layout>
    <a href="/" class="flex items-center justify-center">
        <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
    </a>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="mt-4">
        @csrf

        <!-- Email Address -->
        <div>
            <x-label for="email" :value="__('Email')" />
            <x-input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-3">
            <x-label for="password" :value="__('Password')" />
            <x-input type="password" name="password" id="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-between mt-4">
            <!-- Remember Me -->
            <div>
                <label class="inline-flex items-center">
                    <input type="checkbox" class="text-indigo-600 form-checkbox" name="remember">
                    <span class="mx-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div>
                @if (Route::has('password.request'))
                    <a class="block text-sm text-indigo-700 fontme hover:underline"
                        href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                @endif
            </div>
        </div>

        <div class="mt-6">
            <x-button class="w-full">
                {{ __('Log in') }}
            </x-button>
        </div>

    </form>
</x-guest-layout>
