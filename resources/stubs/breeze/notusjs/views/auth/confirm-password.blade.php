<x-guest-layout>
    <div class="w-full lg:w-6/12 px-4">
        <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">

            <div class="rounded-t mb-0 px-6 py-6">
                <div class="text-center mb-3">
                    <h6 class="text-blueGray-500 text-sm font-bold">
                        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                    </h6>
                </div>

                <hr class="mt-6 border-b-1 border-blueGray-300"/>
            </div>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>

            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <!-- Password -->
                    <div class="relative w-full mb-3">
                        <x-label for="password" :value="__('Password')" />
                        <x-input
                            type="password"
                            required
                            autocomplete="current-password"
                            name="password"
                            id="password"
                            placeholder="{{ __('Password') }}"
                        />
                    </div>

                    <x-button class="w-full">
                        {{ __('Confirm') }}
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
