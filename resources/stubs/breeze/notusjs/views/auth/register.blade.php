<x-guest-layout>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-slate-200 border-0">

            <div class="rounded-t mb-0 px-6 py-6">
                <div class="text-center mb-3">
                    <h6 class="text-slate-500 text-sm font-bold">
                        {{__('Sign up')}}
                    </h6>
                </div>
                <hr class="mt-6 border-b-1 border-slate-300"/>
            </div>
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="relative w-full mb-3">
                        <x-input-label for="name" :value="__('Name')"/>
                        <x-text-input
                            type="text"
                            placeholder="{{ __('Name') }}"
                            name="name"
                            id="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                        />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="relative w-full mb-3">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input
                            type="email"
                            name="email"
                            id="email"
                            value="{{ old('email') }}"
                            placeholder="{{ __('Email') }}"
                            required
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="relative w-full mb-3">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="{{ __('Password') }}"
                            required
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="relative w-full mb-3">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            placeholder="{{ __('Confirm Password') }}"
                            required
                        />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="text-center mt-6">
                        <x-primary-button class="w-full">
                            {{ __('Register') }}
                        </x-primary-button>

                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-guest-layout>
