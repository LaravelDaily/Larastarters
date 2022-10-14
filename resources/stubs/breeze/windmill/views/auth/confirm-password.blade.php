<x-guest-layout>
    <div class="flex flex-col overflow-y-auto md:flex-row">
        <div class="h-32 md:h-auto md:w-1/2">
            <img aria-hidden="true" class="object-cover w-full h-full"
                 src="{{ asset('images/forgot-password-office.jpeg') }}" alt="Office"/>
        </div>
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
                <h1 class="mb-4 font-semibold text-gray-700 dark:text-gray-200">
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                </h1>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')"/>
                        <x-text-input type="password"
                                 class="block w-full"
                                 name="password"
                                 id="password"
                                 required
                                 autocomplete="current-password"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <x-primary-button class="mt-4 block w-full">
                        {{ __('Confirm') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
