<x-guest-layout>
    <div class="flex overflow-y-auto flex-col md:flex-row">
        <div class="h-32 md:h-auto md:w-1/2">
            <img aria-hidden="true" class="object-cover w-full h-full"
                 src="{{ asset('images/forgot-password-office.jpeg') }}" alt="Office"/>
        </div>
        <div class="flex justify-center items-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
                <h1 class="mb-4 font-semibold text-gray-700">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </h1>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')"/>


                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')"/>
                        <x-text-input type="email"
                                 class="block w-full"
                                 name="email"
                                 id="email"
                                 required
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <x-primary-button class="block mt-4 w-full">
                        {{ __('Email Password Reset Link') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
