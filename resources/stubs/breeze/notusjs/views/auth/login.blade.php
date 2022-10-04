<x-guest-layout>
    <div class="w-full px-4 lg:w-4/12">
        <div
            class="relative flex flex-col w-full min-w-0 mb-6 break-words border-0 rounded-lg shadow-lg bg-blueGray-200">
            <div class="px-6 py-6 mb-0 rounded-t">
                <div class="mb-3 text-center">
                    <h6 class="text-sm font-bold text-blueGray-500">
                        {{ __('Sign in') }}
                    </h6>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <hr class="mt-6 border-b-1 border-blueGray-300" />
            </div>
            <div class="flex-auto px-4 py-10 pt-0 lg:px-10">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="relative w-full mb-3">
                        <x-label for="grid-password" :value="__('Email')" />
                        <x-input type="email" value="{{ old('email') }}" required autofocus name="email"
                            placeholder="{{ __('Email') }}" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="relative w-full mb-3">
                        <x-label for="grid-password" :value="__('Password')" />
                        <x-input type="password" required autocomplete="current-password" name="password"
                            placeholder="{{ __('Password') }}" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div>
                        <label class="inline-flex items-center cursor-pointer"><input id="remember_me" type="checkbox"
                                name="remember"
                                class="w-5 h-5 ml-1 transition-all duration-150 ease-linear border-0 rounded form-checkbox text-blueGray-700" /><span
                                class="ml-2 text-sm font-semibold text-blueGray-600">{{ __('Remember me') }}</span></label>
                    </div>
                    <div class="mt-6 text-center">
                        <x-button class="w-full">
                            {{ __('Log in') }}
                        </x-button>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-gray-600 underline hover:text-gray-900"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
