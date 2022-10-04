<x-guest-layout>
    <a href="/" class="flex items-center justify-center">
        <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
    </a>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-label for="email" :value="__('Email')" />
            <x-input type="email" name="email" id="email" value="{{ old('email', $request->email) }}" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-3">
            <x-label for="password" :value="__('Password')" />
            <x-input type="password" name="password" id="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-3">
            <x-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-input type="password" name="password_confirmation" id="password_confirmation" required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button class="w-full">
                {{ __('Reset Password') }}
            </x-button>
        </div>
    </form>
</x-guest-layout>
