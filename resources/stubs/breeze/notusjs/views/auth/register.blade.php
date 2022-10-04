<x-guest-layout>
    <div class="w-full px-4 lg:w-6/12">
        <div
            class="relative flex flex-col w-full min-w-0 mb-6 break-words border-0 rounded-lg shadow-lg bg-blueGray-200">

            <div class="px-6 py-6 mb-0 rounded-t">
                <div class="mb-3 text-center">
                    <h6 class="text-sm font-bold text-blueGray-500">
                        {{ __('Sign up') }}
                    </h6>
                </div>
                <hr class="mt-6 border-b-1 border-blueGray-300" />
            </div>
            <div class="flex-auto px-4 py-10 pt-0 lg:px-10">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="relative w-full mb-3">
                        <x-label for="name" :value="__('Name')" />
                        <x-input type="text" placeholder="{{ __('Name') }}" name="name" id="name"
                            value="{{ old('name') }}" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="relative w-full mb-3">
                        <x-label for="email" :value="__('Email')" />
                        <x-input type="email" name="email" id="email" value="{{ old('email') }}"
                            placeholder="{{ __('Email') }}" required />
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

                    <div class="mt-6 text-center">
                        <x-button class="w-full">
                            {{ __('Register') }}
                        </x-button>

                        <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-guest-layout>
