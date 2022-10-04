<x-guest-layout>
    <div class="w-full px-4 lg:w-4/12">
        <div
            class="relative flex flex-col w-full min-w-0 mb-6 break-words border-0 rounded-lg shadow-lg bg-blueGray-200">

            <div class="flex-auto px-4 py-10 pt-0 lg:px-10">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div class="relative w-full mb-3">
                        <x-label for="email" :value="__('Email')" />
                        <x-input type="email" name="email" id="email"
                            value="{{ old('email', $request->email) }}" placeholder="{{ __('Email') }}" required
                            autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="relative w-full mb-3">
                        <x-label for="password" :value="__('Password')" />
                        <x-input type="password" name="password" id="password" placeholder="{{ __('Password') }}"
                            required />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="relative w-full mb-3">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-input type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="{{ __('Confirm Password') }}" required />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="w-full">
                            {{ __('Reset Password') }}
                        </x-button>
                    </div>
                </form>
            </div>
</x-guest-layout>
