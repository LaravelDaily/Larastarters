<x-guest-layout>
    <div class="w-full lg:w-6/12 px-4">
        <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">

            <div class="rounded-t mb-0 px-6 py-6">
                <div class="text-center mb-3">
                    <h6 class="text-blueGray-500 text-sm font-bold">
                        Sign up
                    </h6>
                </div>
                <hr class="mt-6 border-b-1 border-blueGray-300"/>
            </div>
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="relative w-full mb-3">
                        <x-label htmlFor="grid-password" :value="__('Name')"/>
                        <x-input
                            type="text"
                            placeholder="{{ __('Name') }}"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                        />
                    </div>

                    <div class="relative w-full mb-3">
                        <x-label htmlFor="grid-password" :value="__('Email')" />
                        <x-input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="{{ __('Email') }}"
                            required
                        />
                    </div>

                    <div class="relative w-full mb-3">
                        <x-label htmlFor="grid-password" :value="__('Password')" />
                        <x-input
                            type="password"
                            name="password"
                            placeholder="{{ __('Password') }}"
                            required
                        />
                    </div>

                    <div class="relative w-full mb-3">
                        <x-label htmlFor="grid-password" :value="__('Confirm Password')" />
                        <x-input
                            type="password"
                            name="password_confirmation"
                            placeholder="{{ __('Confirm Password') }}"
                            required
                        />
                    </div>

                    <div class="text-center mt-6">
                        <x-button>
                            {{ __('Register') }}
                        </x-button>

                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-guest-layout>
