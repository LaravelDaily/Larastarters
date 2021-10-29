@extends('layouts.guest')

@section('content')
    <div class="col-md-6">
        <div class="card mb-4 mx-4">
            <div class="card-body p-4">
                <h1>{{ __('Please confirm your password before continuing.') }}</h1>

                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                <p class="text-medium-emphasis">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                <p class="text-medium-emphasis">{{ __('If you did not receive the email') }},</p>

                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf

                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-primary px-4"
                                    type="submit">{{ __('click here to request another') }}</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection