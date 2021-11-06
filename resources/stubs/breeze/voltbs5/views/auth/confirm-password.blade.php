<x-guest-layout>
    <x-auth-card>
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="bg-white shadow border-0 rounded p-4 p-lg-5 w-100 fmxw-500">
                <div class="mb-4 fs-6 lh-sm">
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                </div>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <!-- Form Password -->
                    <div class="form-group mb-4">
                        <label for="password">{{ __('Your Password') }}</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <x-svg.password />
                            </span>
                            <input name="password" type="password" placeholder="{{ __('Password') }}"
                                class="form-control" id="password" autocomplete="current-password" required>
                        </div>
                        @error('password')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>
                    <!-- End of Form -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-gray-800">{{ __('Confirm') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </x-auth-card>
</x-guest-layout>
