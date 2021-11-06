<x-guest-layout>
    <x-auth-card>
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="bg-white shadow border-0 rounded p-4 p-lg-5 w-100 fmxw-500">
                <div class="mb-4 fs-6 lh-sm text-light">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 fw-bold fs-6 lh-sm text-success">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <div class="mt-4 d-flex align-items-center justify-content-between">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div class="d-grid">
                            <button type="submit"
                                class="btn btn-gray-800">{{ __('Resend Verification Email') }}</button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <div class="d-grid">
                            <button type="submit"
                                class="btn btn-gray-100 text-decoration-underline">{{ __('Log Out') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-auth-card>
</x-guest-layout>
