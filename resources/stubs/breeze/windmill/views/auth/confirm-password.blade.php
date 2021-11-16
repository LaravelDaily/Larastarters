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

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')"/>
                        <x-input type="password"
                                 class="block w-full"
                                 name="password"
                                 id="password"
                                 required
                                 autocomplete="current-password"
                        />
                    </div>

                    <button class="mt-4 block w-full">
                        {{ __('Confirm') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
