<x-guest-layout>
    <a href="/" class="flex items-center justify-center mb-4">
        <x-application-logo class="w-10 h-10 text-gray-500 fill-current" />
    </a>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <x-label for="email" :value="__('Email')" />
        <x-input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />

        <div class="flex items-center justify-end mt-4">
            <x-button class="w-full">
                {{ __('Email Password Reset Link') }}
            </x-button>
        </div>
    </form>
</x-guest-layout>
