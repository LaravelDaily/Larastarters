<x-guest-layout>
    <div class="w-full lg:w-4/12 px-4">
        <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>

            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div class="relative w-full mb-3">
                        <x-label for="email" :value="__('Email')" />
                        <x-input
                            type="email"
                            name="email"
                            id="email"
                            value="{{ old('email', $request->email)}}"
                            placeholder="{{ __('Email') }}"
                            required
                            autofocus
                        />
                    </div>

                    <div class="relative w-full mb-3">
                        <x-label for="password" :value="__('Password')" />
                        <x-input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="{{ __('Password') }}"
                            required
                        />
                    </div>

                    <div class="relative w-full mb-3">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            placeholder="{{ __('Confirm Password') }}"
                            required
                        />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="w-full">
                            {{ __('Reset Password') }}
                        </x-button>
                    </div>
                </form>
            </div>
</x-guest-layout>
