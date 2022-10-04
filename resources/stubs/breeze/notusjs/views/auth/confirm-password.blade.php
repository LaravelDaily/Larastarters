<x-guest-layout>
    <div class="w-full px-4 lg:w-6/12">
        <div
            class="relative flex flex-col w-full min-w-0 mb-6 break-words border-0 rounded-lg shadow-lg bg-blueGray-200">

            <div class="px-6 py-6 mb-0 rounded-t">
                <div class="mb-3 text-center">
                    <h6 class="text-sm font-bold text-blueGray-500">
                        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                    </h6>
                </div>

                <hr class="mt-6 border-b-1 border-blueGray-300" />
            </div>

            <div class="flex-auto px-4 py-10 pt-0 lg:px-10">
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <!-- Password -->
                    <div class="relative w-full mb-3">
                        <x-label for="password" :value="__('Password')" />
                        <x-input type="password" required autocomplete="current-password" name="password" id="password"
                            placeholder="{{ __('Password') }}" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <x-button class="w-full">
                        {{ __('Confirm') }}
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
