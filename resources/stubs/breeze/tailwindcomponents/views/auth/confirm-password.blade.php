<x-guest-layout>
    <a href="/" class="flex justify-center items-center mb-4">
        <x-application-logo class="w-10 h-10 fill-current text-gray-500"/>
    </a>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

    <form method="POST" action="{{ route('password.confirm') }}">
    @csrf

        <!-- Password -->
        <x-label for="password" :value="__('Password')"/>
        <x-input type="password"
                 name="password"
                 id="password"
                 required
                 autocomplete="current-password"
        />

        <div class="flex justify-end mt-4">
            <x-button class="w-full">
                {{ __('Confirm') }}
            </x-button>
        </div>
    </form>
</x-guest-layout>
