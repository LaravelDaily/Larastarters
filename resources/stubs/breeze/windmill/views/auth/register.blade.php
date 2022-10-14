<x-guest-layout>
    <div class="flex flex-col overflow-y-auto md:flex-row">
        <div class="h-32 md:h-auto md:w-1/2">
            <img aria-hidden="true" class="object-cover w-full h-full"
                 src="{{ asset('images/create-account-office.jpeg') }}" alt="Office"/>
        </div>

        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
                <h1 class="mb-4 text-xl font-semibold text-gray-700">
                    Create account
                </h1>

                <form method="POST" action="{{ route('register') }}">
                @csrf

                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Name')"/>
                        <x-text-input type="text"
                                 id="name"
                                 name="name"
                                 class="block w-full"
                                 value="{{ old('name') }}"
                                 required
                                 autofocus/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')"/>
                        <x-text-input name="email"
                                 type="email"
                                 class="block w-full"
                                 value="{{ old('email') }}"/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')"/>
                        <x-text-input type="password"
                                 name="password"
                                 class="block w-full"
                                 required/>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label id="password_confirmation" :value="__('Confirm Password')"/>
                        <x-text-input type="password"
                                 name="password_confirmation"
                                 class="block w-full"
                                 required/>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-primary-button class="block w-full">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>

                <hr class="my-8"/>

                <p class="mt-4">
                    <a class="text-sm font-medium text-primary-600 hover:underline"
                       href="{{ route('login') }}">{{ __('Already registered?') }}</a>
                </p>
            </div>
        </div>
</x-guest-layout>
