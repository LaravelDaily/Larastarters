<x-guest-layout>
    <a href="/" class="flex items-center justify-center mb-4">
        <x-application-logo class="w-10 h-10 text-gray-500 fill-current" />
    </a>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <x-label for="password" :value="__('Password')" />
        <x-input type="password" name="password" id="password" required autocomplete="current-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />

        <div class="flex justify-end mt-4">
            <x-button class="w-full">
                {{ __('Confirm') }}
            </x-button>
        </div>
    </form>
</x-guest-layout>
