@extends('layouts.guest')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="bg-white shadow border-0 rounded p-4 p-lg-5 w-100 fmxw-500">
                    <div class="fs-6 lh-sm text-light">
                        {{ __('Thanks for signing up! Before getting started, ') }}
                    </div>
                    <div class="mb-2 fs-6 lh-sm text-light">
                        {{ __('could you verify your email address by clicking on the link we just emailed to you?') }}
                    </div>
                    <div class="mb-4 fs-6 lh-sm text-light">
                        {{ __('If you didn\'t receive the email, we will gladly send you another.') }}
                    </div>

                    @if (session('resent'))
                        <div class="mb-4 fw-bold fs-6 lh-sm text-success">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </div>
                    @endif

                    <div class="mt-4 d-flex align-items-center justify-content-center">
                        <form method="POST" action="{{ route('verification.resend') }}">
                            @csrf

                            <div class="d-grid">
                                <button type="submit"
                                    class="btn btn-gray-800">{{ __('Resend Verification Email') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
