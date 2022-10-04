<x-guest-layout>
    <div class="flex flex-col overflow-y-auto md:flex-row">
        <div class="h-32 md:h-auto md:w-1/2">
            <img aria-hidden="true" class="object-cover w-full h-full"
                src="{{ asset('images/forgot-password-office.jpeg') }}" alt="Office" />
        </div>
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
                <h1 class="mb-4 font-semibold text-gray-700">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </h1>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mt-4">
                        <x-label for="email" :value="__('Email')" />
                        <x-input type="email" class="block w-full" name="email" id="email" required />

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <x-button class="block w-full mt-4">
                        {{ __('Email Password Reset Link') }}
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
