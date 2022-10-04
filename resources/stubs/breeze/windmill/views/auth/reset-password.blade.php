<x-guest-layout>
    <div class="flex flex-col overflow-y-auto md:flex-row">
        <div class="h-32 md:h-auto md:w-1/2">
            <img aria-hidden="true" class="object-cover w-full h-full"
                src="{{ asset('images/forgot-password-office.jpeg') }}" alt="Office" />
        </div>
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
                <h1 class="mb-4 text-xl font-semibold text-gray-700">
                    {{ __('Forgot password') }}
                </h1>

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="mt-4">
                        <x-label for="email" :value="__('Email')" />
                        <x-input type="email" class="block w-full" id="email" name="email"
                            value="{{ old('email', $request->email) }}" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-label :value="__('Password')" />
                        <x-input type="password" class="block w-full" name="password" required />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-label :value="__('Confirm Password')" />
                        <x-input type="password" class="block w-full" name="password_confirmation" required />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <x-button class="w-full mt-4">
                        {{ __('Reset Password') }}
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
