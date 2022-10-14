<x-guest-layout>
    <a href="/" class="flex justify-center items-center mb-4">
        <x-application-logo class="w-10 h-10 fill-current text-gray-500"/>
    </a>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <x-input-label for="email" :value="__('Email')"/>
        <x-text-input type="email"
                 name="email"
                 id="email"
                 value="{{ old('email') }}"
                 required
                 autofocus
        />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="w-full">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
